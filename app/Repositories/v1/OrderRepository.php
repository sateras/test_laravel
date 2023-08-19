<?php

namespace App\Repositories\v1;

use App\Models\Order;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    public function __construct(Order $model)
    {
        parent::__construct($model);
    }

    public function index(array $data): ?Collection
    {
        $query = $this->model->where('user_id', $data['user_id'])->with('orderProducts.products')->get();

        return $query;
    }

    public function find(int $id): ?Model
    {
        return $this->model->with(['parent', 'children'])->findOrFail($id);
    }
}
