<?php

namespace App\Repositories\v1;

use App\Models\Cart;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\CartRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CartRepository extends BaseRepository implements CartRepositoryInterface
{
    public function __construct(Cart $model)
    {
        parent::__construct($model);
    }

    public function all(): ?Collection
    {
        $query = $this->model->with('product')->get();

        return $query;
    }

    public function getByUserId(int $id): ?Collection
    {
        $query = $this->model->where('user_id', $id)->with('product')->get();

        return $query;
    }

    public function getProductFromCart(array $data): ?Model
    {
        $query = $this->model->where([
                ['user_id', $data['user_id']],
                ['product_id', $data['product_id']],
            ])->first();

        return $query;
    }

    public function destroyByProductId(int $id)
    {
        $this->model->where('product_id', $id)->delete();;
    }

    public function updateByProductId(int $id, array $attributes): Model
    {
        $model = $this->model->where('product_id', $id)->first();
        $model->update($attributes);
        $model->save();

        return $model;
    }
}
