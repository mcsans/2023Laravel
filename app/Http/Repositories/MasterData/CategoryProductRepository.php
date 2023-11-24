<?php

namespace App\Http\Repositories\MasterData;

use App\Http\Repositories\BaseRepository;
use App\Http\Repositories\Contracts\MasterData\CategoryProductContract;
use App\Models\CategoryProduct;

class CategoryProductRepository extends BaseRepository implements CategoryProductContract
{
    protected $model;

    public function __construct(CategoryProduct $categoryProduct)
    {
        $this->model = $categoryProduct;
    }
}
