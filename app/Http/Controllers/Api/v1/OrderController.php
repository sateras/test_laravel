<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\ApiController;
use App\Services\Contracts\OrderServiceInterface;

class OrderController extends ApiController
{
    public function __construct(private OrderServiceInterface $service)
    {
        //
    }

    public function index()
    {
        return $this->result($this->service->index());
    }

    public function createOrder()
    {
        return $this->result($this->service->createOrder());
    }
}
