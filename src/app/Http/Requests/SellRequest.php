<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellRequest extends FormRequest
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
        return [
            'upload_file' => 'required|image|mimes:jpeg,png,gif|max:2048',
            'category' => 'required|max:255',
            'condition' => 'required|max:255',
            'name' => 'required|max:255',
            'brand' => 'required|max:255',
            'description' => 'required|max:500',
            'price' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'upload_file' => '画像を2MB以内の画像ファイルで登録してください',
            'category.required' => 'カテゴリーは必須です',
            'category.max' => 'カテゴリーを255文字以内で登録してください',
            'condition.required' => '商品の状態は必須です',
            'condition.max' => '商品の状態を255文字以内で登録してください',
            'name.required' => '商品名は必須です',
            'name.max' => '商品名を255文字以内で登録してください',
            'brand.required' => 'ブランドは必須です',
            'brand.max' => 'ブランドを255文字以内で登録してください',
            'description.required' => '商品の説明は必須です',
            'description.max' => '商品の説明を500文字以内で登録してください',
            'price.required' => '販売価格は必須です',
            'price.integer' => '販売価格を数字で登録してください',
        ];
    }
}
