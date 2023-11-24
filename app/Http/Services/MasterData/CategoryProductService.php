<?php

namespace App\Http\Services\MasterData;

use App\Http\Repositories\Contracts\MasterData\CategoryProductContract;
use App\Http\Resources\CategoryProductResource;

class CategoryProductService
{
    protected $repository;

    public function __construct(CategoryProductContract $categoryProductRepository)
    {
        $this->repository = $categoryProductRepository;
    }

    protected function payload($request)
    {
        $payloads = [
            'name' => $request['name'],
        ];

        return $payloads;
    }

    public function indexService()
    {
        $categoryProduct = $this->repository->all();

        return CategoryProductResource::collection($categoryProduct);
    }

    public function findService($id)
    {
        $categoryProduct = $this->repository->find($id);

        return new CategoryProductResource($categoryProduct);
    }

    public function storeService(array $request)
    {
        $inputData = $this->payload($request);

        $categoryProduct = $this->repository->store($inputData);

        return new CategoryProductResource($categoryProduct);
    }

    public function updateService(array $request, $id)
    {
        $inputData = $this->payload($request);

        $this->repository->update($inputData, $id);

        return $this->findService($id);
    }
}
