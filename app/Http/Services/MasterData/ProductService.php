<?php

namespace App\Http\Services\MasterData;

use App\Http\Repositories\Contracts\MasterData\ProductContract;
use App\Http\Resources\ProductResource;

class ProductService
{
    protected $repository;

    public function __construct(ProductContract $productRepository)
    {
        $this->repository = $productRepository;
    }

    protected function payload($request)
    {
        $payloads = [
            'category_product_id' => $request['category_product_id'],
            'name' => $request['name'],
            'code' => $request['code'],
            'price' => $request['price'],
        ];

        return $payloads;
    }

    public function indexService()
    {
        $product = $this->repository->all();

        return ProductResource::collection($product);
    }

    public function findService($id)
    {
        $product = $this->repository->find($id);

        return new ProductResource($product);
    }

    public function storeService(array $request)
    {
        $inputData = $this->payload($request);

        $product = $this->repository->store($inputData);

        return new ProductResource($product);
    }

    public function updateService(array $request, $id)
    {
        $inputData = $this->payload($request);

        $this->repository->update($inputData, $id);

        return $this->findService($id);
    }
}
