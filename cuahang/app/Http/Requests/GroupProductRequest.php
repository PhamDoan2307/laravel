<?php

namespace App\Http\Requests;

use App\Models\GroupProduct;
use App\Product;
use Illuminate\Foundation\Http\FormRequest;

class GroupProductRequest extends FormRequest
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
            'name' => 'required|unique:group_products,name,'.$this->id.'|min:3',
            'image' => 'required|image',
            'company' => 'required'
            //
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên!',
            'name.unique' => 'Tên này đã tồn tại !vui lòng chọn tên khác',
            'image.required' => 'Vui lòng chọn file',
            'image.image' =>'Sai định dạng ảnh',
            'company.required' => 'Vui lòng chọn công ty'
        ];
    }
}
