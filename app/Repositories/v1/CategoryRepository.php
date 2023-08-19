<?php

namespace App\Repositories\v1;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function all(): ?Collection
    {
        $query = $this->model->with(['parent', 'children'])->where('parent_id', null)->get();

        return $query;
    }

    public function find(int $id): ?Model
    {
        return $this->model->with(['parent', 'children'])->findOrFail($id);
    }
}
