<?php

namespace App\Services\v1;

use App\Http\Resources\UserResource;
use App\Repositories\Contracts\AuthRepositoryInterface;
use App\Services\Contracts\AuthServiceInterface;
use App\Services\BaseService;
use Hash;

class AuthService extends BaseService implements AuthServiceInterface
{
    private AuthRepositoryInterface $repository;

    public function __construct(AuthRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function login(array $data)
    {
        $user = $this->repository->findByEmail($data['email']);

        if (!isset($user)) {
			return $this->error(401, 'Неверная почта или пароль.');
        }

        if (!Hash::check($data['password'], $user->password)) {
            return $this->error(401, 'Неверная почта или пароль.');
        }

        $token = $user->createToken($user->password)->plainTextToken;

        return $this->result([
            'token' => $token,
            'user' => (new UserResource($user)),
        ]);
    }

    public function register(array $data)
    {
        $user = $this->repository->findByEmail($data['email']);

        if (isset($user)) {
			return $this->error(401, 'Данный email уже занят.');
        }

        $user = $this->repository->store($data);

        $token = $user->createToken($user->password)->plainTextToken;

        return $this->result([
            'token' => $token,
            'user' => (new UserResource($user)),
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        // можно и так user()->currentAccessToken()->delete();

        return $this->ok();
    }
}