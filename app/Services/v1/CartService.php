<?php

namespace App\Services\v1;

use App\Http\Resources\ProductResource;
use App\Repositories\Contracts\CartRepositoryInterface;
use App\Services\BaseService;
use App\Services\Contracts\CartServiceInterface;
use Str;

class CartService extends BaseService implements CartServiceInterface
{
    public function __construct(private CartRepositoryInterface $repository)
    {
        parent::__construct();
    }

    public function index()
    {
        $products = $this->repository->getByUserId($this->user->id);

        return $this->result([
            // 'cart' => CartResource::collection($products),
            'cart' => $products,
        ]);
    }

	public function update(int $id, array $attributes)
    {
        $product = $this->repository->updateByProductId($id, $attributes);

        return $this->result([
            'cart' => $product,
        ]);
    }

    public function destroy(int $id)
    {
        $product = $this->repository->destroyByProductId($id);

        return $this->ok();
    }

    public function store(array $data)
    {
        $data['user_id'] = $this->user->id;
        $data['quantity'] = $data['quantity'] ?? 1; // если количество не указано то 1

        $product = $this->repository->getProductFromCart($data);

        if (isset($product)) {
            $data['quantity'] = $product->quantity + $data['quantity'];

            $product = $this->repository->updateByProductId($data['product_id'], $data);
        } else {
            $product = $this->repository->store($data);
        }

        return $this->result([
            // 'cart' => CartResource::collection($products),
            'cart' => $product,
        ]);
    }
}