<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckOutRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "price" => "required|integer|numeric",
            "name" => "required",
            "quantity" => "required|integer|numeric",
        ];
    }
}
