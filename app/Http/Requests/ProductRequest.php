<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Request;

class ProductRequest extends FormRequest
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

        if($this->getMethod() == Request::METHOD_PUT){
            return [
                'name' => 'required|string|min:10',
            ];
        }
        return [
            'art' => 'required|unique:products|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
            'name' => 'required|string|min:10',
        ];
    }
}
