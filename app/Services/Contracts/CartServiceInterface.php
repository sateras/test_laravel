<?php

namespace App\Services\Contracts;

interface CartServiceInterface
{
	public function index();

	public function store(array $data);

	public function destroy(int $id);

	public function update(int $id, array $attributes);
}
