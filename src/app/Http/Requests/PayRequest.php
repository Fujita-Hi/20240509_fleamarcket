<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PayRequest extends FormRequest
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
            'item_id' => 'required',
            'amount' => 'required|integer',
            'name' => 'required',
            'user_name' => 'required',
            'code' => 'required|regex:/^\d{3}-\d{4}$/',
            'addr' => 'required|max:255',
            'building' => 'nullable|max:255'
        ];
    }

    
    public function messages()
    {
        return [
            'item_id' => 'この商品は購入できません',
            'amount' => 'この商品は購入できません',
            'name' => 'この商品は購入できません',
            'user_name.required' => 'ユーザー名が設定されていません。マイページから設定してください',
            'code.required' => '配送先の郵便番号が設定されていません',
            'code.regex' => '配送先の郵便番号が間違っています。〇〇〇-〇〇〇〇で登録してください',
            'addr.required' => '配送先の住所が設定されていません',
            'addr.max' => '配送先の住所は255文字以内で登録してください',
            'building.max' => '配送先の建物名は255文字以内で登録してください', 
        ];
    }
}
