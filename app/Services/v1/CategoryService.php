<?php

namespace App\Services\v1;

use App\Http\Resources\CategoryResource;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Services\BaseService;
use App\Services\Contracts\CategoryServiceInterface;

class CategoryService extends BaseService implements CategoryServiceInterface
{
    public function __construct(private CategoryRepositoryInterface $repository)
    {
        parent::__construct();
    }

    public function index()
    {
        $categories = $this->repository->all();

        return $this->result([
            'category' => CategoryResource::collection($categories),
        ]);
    }

	public function show(int $id)
    {
        $category = $this->repository->find($id);

        return $this->result([
            'category' => (new CategoryResource($category)),
        ]);
    }
}