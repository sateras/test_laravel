<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Cart\StoreCartRequest;
use App\Http\Requests\Cart\UpdateCartRequest;
use App\Services\Contracts\CartServiceInterface;

class CartController extends ApiController
{
    public function __construct(private CartServiceInterface $service)
    {
        //
    }

    public function index()
    {
        return $this->result($this->service->index());
    }

    public function update(int $id, UpdateCartRequest $request)
    {
        $data = $request->validated();

        return $this->result($this->service->update($id, $data)); // по id
    }

    public function destroy(int $id)
    {
        return $this->result($this->service->destroy($id));
    }

    public function store(StoreCartRequest $request)
    {
        $data = $request->validated();

        return $this->result($this->service->store($data));
    }
}
