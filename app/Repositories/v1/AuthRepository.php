<?php

namespace App\Repositories\v1;

use App\Models\User;
use App\Repositories\Contracts\AuthRepositoryInterface;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class AuthRepository extends BaseRepository implements AuthRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function findByEmail(string $email): ?Model
    {
        return $this->model->where('email', $email)->first();
    }
}
