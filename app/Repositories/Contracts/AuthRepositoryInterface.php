<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface AuthRepositoryInterface
{
	public function findByEmail(string $phone): ?Model;
	
	public function store(array $attributes): Model;
}
