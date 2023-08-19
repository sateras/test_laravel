<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\ApiController;
use App\Services\Contracts\CategoryServiceInterface;
use Illuminate\Http\Request;

class CategoryController extends ApiController
{
    public function __construct(private CategoryServiceInterface $service)
    {
        //
    }

    public function index()
    {
        return $this->result($this->service->index());
    }

    public function show(int $id)
    {
        return $this->result($this->service->show($id));
    }
}
