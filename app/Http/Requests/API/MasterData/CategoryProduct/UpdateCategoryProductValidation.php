<?php

namespace App\Http\Requests\api\MasterData\CategoryProduct;

use App\Http\Requests\API\BaseRequestValidation;

class UpdateCategoryProductValidation extends BaseRequestValidation
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string'
        ];
    }
}
