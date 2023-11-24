<?php

namespace App\Http\Requests\api\MasterData\Product;

use App\Http\Requests\API\BaseRequestValidation;

class UpdateProductValidation extends BaseRequestValidation
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_product_id' => 'required',
            'name' => 'required|string',
            'code' => 'required',
            'price' => 'required',
        ];
    }
}
