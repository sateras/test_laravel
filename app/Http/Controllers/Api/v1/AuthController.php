<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Contracts\AuthServiceInterface;

class AuthController extends ApiController
{
    private AuthServiceInterface $service;

    public function __construct(AuthServiceInterface $service)
    {
        $this->service = $service;
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        return $this->result($this->service->login($data));
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        return $this->result($this->service->register($data));
    }

    public function logout()
    {
        return $this->result($this->service->logout());
    }
}
