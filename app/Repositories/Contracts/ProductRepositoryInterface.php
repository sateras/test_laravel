<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ProductRepositoryInterface
{
	public function all(array $params): ?Collection;

	public function find(int $id): ?Model;
	
	public function findBySlug(string $slug): ?Model;

	public function store(array $data): ?Model;

	public function addAttribute(int $id, array $attributes): ?Model;
}
