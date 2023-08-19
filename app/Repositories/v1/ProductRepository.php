<?php

namespace App\Repositories\v1;

use App\Models\Product;
use App\Models\ProductAttribute;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function all($params): ?Collection
    {
        $query = $this->model->with('category', 'attributes');

        $query = $this->queryApplyFilter($query, $params);

        return $query->get();
    }

    public function find(int $id): ?Model
    {
        return $this->model->with('category', 'attributes')->findOrFail($id);
    }

    public function findBySlug(string $slug): ?Model
    {
        return $this->model->with('category', 'attributes')->where('slug', $slug)->first();
    }

    public function addAttribute(int $id, array $attributes): ?Model
    {
        $product = $this->model->findOrFail($id);
        $product->attributes()->create($attributes);

        return $product;
    }

    protected function queryApplyFilter($query, array $params = [])
    {
        if (isset($params['price_above'])) {
            $query->where('price', '>', $params['price_above']);
        }

        if (isset($params['price_below'])) {
            $query->where('price', '<', $params['price_below']);
        }

        if (isset($params['category_id'])) {
            $query->where('category_id', $params['category_id']);
        }

        if (isset($params['slug'])) {
            $query->where('slug', $params['slug']);
        }

        return $query;
    }

    
}
