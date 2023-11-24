<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\MasterData\Product\StoreProductValidation;
use App\Http\Requests\api\MasterData\Product\UpdateProductValidation;
use App\Http\Services\MasterData\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $products = $this->service->indexService();

        return $this->paginatedApiResponse(
            'success',
            'Successfully Retrieved Regions Data',
            200,
            $products
        );
    }

    public function show($id)
    {
        try {
            $product = $this->service->findService($id);

            return $this->specificApiResponse(
                'success',
                'Successfully Retrieved Specific Region Data',
                200,
                $product
            );
        } catch (\Throwable $th) {
            return $this->specificApiResponse('failed', 'Region Data not Found', 404);
        }
    }

    public function store(StoreProductValidation $request)
    {
        $inputData = $request->validated();

        $product = $this->service->storeService($inputData);

        return $this->specificApiResponse(
            'success',
            'Successfully Stored Region Data',
            201,
            $product
        );
    }

    public function update(UpdateProductValidation $request, $id)
    {
        $inputData = $request->validated();

        $product = $this->service->updateService($inputData, $id);

        return $this->specificApiResponse(
            'success',
            'Successfully Updated Region Data',
            200,
            $product
        );
    }
}
