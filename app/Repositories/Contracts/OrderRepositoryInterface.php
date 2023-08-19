<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface OrderRepositoryInterface
{
	public function index(array $data): ?Collection;

	public function find(int $id): ?Model;
}
