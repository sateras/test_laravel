<?php

namespace App\Services\v1;

use App\Http\Resources\OrderResource;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Services\BaseService;
use App\Services\Contracts\OrderServiceInterface;

class OrderService extends BaseService implements OrderServiceInterface
{
    public function __construct(private OrderRepositoryInterface $repository)
    {
        parent::__construct();
    }

    public function index()
    {
        $data['user_id'] = $this->user->id;
        $orders = $this->repository->index($data);

        return $this->result([
            'orders' => OrderResource::collection($orders),
        ]);
    }

	public function createOrder()
    {
        $user = $this->user;
        $cartItems = $user->cartItems;

        $order = $user->orders()->create([
                'user_id' => $user->id,
            ]);

        foreach ($cartItems as $cartItem) {
            $order->orderProducts()->create([
                    'product_id' => $cartItem->product_id,
                    'quantity'   => $cartItem->quantity,
                ]);
        }

        $user->cartItems()->delete();

        return $this->ok();
    }
}