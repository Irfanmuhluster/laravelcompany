<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduk extends FormRequest
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

    public function rules()
    {
        // dd(request());

        $return = [
            'product_name' => ['required', 'string', 'min:4'],
            'product_description' => ['nullable', 'min:4'],
            'image' => [
                'required',
                'mimetypes:image/jpeg,image/png',
                'mimes:jpeg,jpg,png',
                'max:1024',
            ],
      ];

        $method = request()->method();
        if ($method == 'PUT') {
            $return['image'][0] = 'nullable'; 
        }

        if ($method == 'POST') {
            $return['product_name'][4] = 'unique:App\Models\Product,product_name';
        }

        return $return;
    }

    public function messages()
    {
        return [
            'product_name.required' => 'Judul harus diisi',
            'image.mimetypes' => 'image harus jpg atau png',
        ];
    }
}
