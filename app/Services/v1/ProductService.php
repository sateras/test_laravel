<?php

namespace App\Services\v1;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Services\BaseService;
use App\Services\Contracts\ProductServiceInterface;
use Str;

class ProductService extends BaseService implements ProductServiceInterface
{
    public function __construct(private ProductRepositoryInterface $repository)
    {
        parent::__construct();
    }

    public function index(array $params)
    {
        $products = $this->repository->all($params);

        return $this->result([
            'product' => ProductResource::collection($products),
        ]);
    }

	public function show(int $id)
    {
        $product = $this->repository->find($id);

        return $this->result([
            'product' => (new ProductResource($product)),
        ]);
    }

    public function showBySlug(string $slug)
    {
        $product = $this->repository->findBySlug($slug);

        return $this->result([
            'product' => (new ProductResource($product)),
        ]);
    }

    public function store(array $data)
    {
        // $data['slug'] = $this->generateUniqueSlug($data['category_id']);

        $data['slug'] = $this->generateUniqueSlug($data['name']);

        $product = $this->repository->store($data);

        return $this->result([
            'product' => (new ProductResource($product)),
        ]);
    }

    public function addAttribute(int $id, array $attributes)
    {
        $product = $this->repository->addAttribute($id, $attributes);
        
        return $this->result([
            'product' => (new ProductResource($product)),
        ]);
    }

    protected function generateUniqueSlug($name)
    {
        $slug = Str::slug($name, '-');
        $count = 2;

        $product = $this->repository->findBySlug($slug);
        
        while (isset($product)) {
            $slug = Str::slug($name, '-') . '-' . $count;
            $count++;

            $product = $this->repository->findBySlug($slug);
        }

        return $slug;
    }
}