<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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

            'name'          => 'required|unique:categories,name',
            'description'         => 'required',
            'image'         => 'required|image',

        ];
    }

    public function messages() {
        return [
            'name.required'         => 'Vui lòng nhập tên danh mục!',
            'name.unique'           => 'Tên danh mục này đã tồn tại!',
            'description.required'        => 'Vui nhập tình trạng cho danh mục!',
            'image.required'        => 'Vui lòng chọn ảnh cho danh mục!',
            'image.image'           => 'Hình ảnh không đúng danh mục!',

        ];
    }
}
