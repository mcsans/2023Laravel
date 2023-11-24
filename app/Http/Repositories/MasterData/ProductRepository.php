<?php

namespace App\Http\Repositories\MasterData;

use App\Http\Repositories\BaseRepository;
use App\Http\Repositories\Contracts\MasterData\ProductContract;
use App\Models\Product;

class ProductRepository extends BaseRepository implements ProductContract
{
    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }
}
