<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface CategoryRepositoryInterface
{
	public function all(): ?Collection;

	public function find(int $id): ?Model;
}
