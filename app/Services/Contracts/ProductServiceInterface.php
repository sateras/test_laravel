<?php

namespace App\Services\Contracts;

interface ProductServiceInterface
{
	public function index(array $params);

	public function show(int $id);

	public function showBySlug(string $slug);

	public function store(array $slug);

	public function addAttribute(int $id, array $attributes);
}
