<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules= [
            "name"=>"required",
            "description"=>"required",
            "price"=>"required|numeric",
            "quantity"=>"required|numeric",
            "category_id"=>"numeric",
        ];
       /*dd($this->route()->getActionMethod());*/
        if ($this->route()->getActionMethod() === 'store'){ // applay the rule of image validation when the request type is create not update
              $rules["image"]="required";
        }
        return $rules;
    }
}
