<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productRequest extends FormRequest
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

            'name'          => 'required|unique:products,name',
            'id_type'    => 'required|numeric',
            'new'         => 'required',
            'unit_price'      => 'required|numeric',
            'image'         => 'required|image',
        ];
    }
    public function messages() {
        return [
            'name.required'         => 'Vui lòng nhập tên sản phẩm!',
            'name.unique'           => 'Tên sàn phẩm này đã tồn tại!',
            'id_type.required'         => 'Vui lòng chọn danh mục!',
            'image.required'        => 'Vui lòng chọn ảnh cho sản phẩm!',
            'image.image'           => 'Hình ảnh không đúng định dạng!',
            'unit_price.required'        => 'Vui lòng nhập giá  cho sản phẩm!',
            'unit_price.numeric'         => 'Giá  phải là số!',
            'new.required'     => 'Vui lòng nhập tình trạng cho sản phẩm!',
        
        ];
    }
}
