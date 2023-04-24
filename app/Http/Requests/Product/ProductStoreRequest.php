<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'ibsn_code' => 'required',
            'author' => 'required|max:255',
            'category_id' => 'required',
            'age' => 'required',
            'price' => 'required',
            'size' => 'required',
            'number_of_pages' => 'required',
            'format' => 'required',
            'weight' => 'required',
            'image' => 'required',
            'description' => 'required',
        ];
    }
}
