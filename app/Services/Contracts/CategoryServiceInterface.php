<?php

namespace App\Services\Contracts;

interface CategoryServiceInterface
{
	public function index();

	public function show(int $id);
}
