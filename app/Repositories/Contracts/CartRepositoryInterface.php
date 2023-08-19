<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface CartRepositoryInterface
{
	public function all(): ?Collection;

	public function find(int $id): ?Model;

	public function store(array $data): ?Model;

	public function getByUserId(int $id): ?Collection;

	public function getProductFromCart(array $data): ?Model;

	public function updateByProductId(int $id, array $attributes): Model;

	public function destroyByProductId(int $id);
}
