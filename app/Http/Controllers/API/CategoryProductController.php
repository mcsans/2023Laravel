<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\MasterData\CategoryProduct\StoreCategoryProductValidation;
use App\Http\Requests\api\MasterData\CategoryProduct\UpdateCategoryProductValidation;
use App\Http\Services\MasterData\CategoryProductService;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    protected $service;

    public function __construct(CategoryProductService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $categoryProducts = $this->service->indexService();

        return $this->paginatedApiResponse(
            'success',
            'Successfully Retrieved Regions Data',
            200,
            $categoryProducts
        );
    }

    public function show($id)
    {
        try {
            $categoryProduct = $this->service->findService($id);

            return $this->specificApiResponse(
                'success',
                'Successfully Retrieved Specific Region Data',
                200,
                $categoryProduct
            );
        } catch (\Throwable $th) {
            return $this->specificApiResponse('failed', 'Region Data not Found', 404);
        }
    }

    public function store(StoreCategoryProductValidation $request)
    {
        $inputData = $request->validated();

        $categoryProduct = $this->service->storeService($inputData);

        return $this->specificApiResponse(
            'success',
            'Successfully Stored Region Data',
            201,
            $categoryProduct
        );
    }

    public function update(UpdateCategoryProductValidation $request, $id)
    {
        $inputData = $request->validated();

        $categoryProduct = $this->service->updateService($inputData, $id);

        return $this->specificApiResponse(
            'success',
            'Successfully Updated Region Data',
            200,
            $categoryProduct
        );
    }
}
