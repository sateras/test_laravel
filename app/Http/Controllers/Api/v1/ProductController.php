<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Product\AddAttributeProductRequest;
use App\Http\Requests\Product\IndexProductRequest;
use App\Http\Requests\Product\StoreProductRequest;
use App\Services\Contracts\ProductServiceInterface;

class ProductController extends ApiController
{
    public function __construct(private ProductServiceInterface $service)
    {
        //
    }

    public function index(IndexProductRequest $request)
    {
        $data = $request->validated();

        return $this->result($this->service->index($data));
    }

    public function show(int $id)
    {
        return $this->result($this->service->show($id)); // по id
    }

    public function showBySlug(string $slug)
    {
        return $this->result($this->service->showBySlug($slug));
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();

        return $this->result($this->service->store($data));
    }

    public function addAttribute(int $id, AddAttributeProductRequest $request)
    {
        $data = $request->validated();

        return $this->result($this->service->addAttribute($id, $data));
    }
}
