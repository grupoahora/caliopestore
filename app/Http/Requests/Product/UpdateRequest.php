<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:products,name,' . $this->route('product')->id . '|string',
            'code' => 'nullable|unique:products,code,' . $this->route('product')->id . '|string',
            'short_description' => 'max:240|required',
            'long_description' => 'max:900|required',
            'sell_price' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
        ];
    }
}
