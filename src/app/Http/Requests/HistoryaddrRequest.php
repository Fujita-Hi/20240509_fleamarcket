<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistoryaddrRequest extends FormRequest
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
            'history_id' => 'required',
            'code' => 'nullable|regex:/^\d{3}-\d{4}$/',
            'addr' => 'nullable|max:255',
            'building' => 'nullable|max:255'
        ];
    }

    public function messages()
    {
        return [
            'history_id.required' => '購入履歴が読み込めませんでした。ページを読み込みなおしてください',
            'code.required' => '郵便番号が設定されていません',
            'code.regex' => '郵便番号が間違っています。〇〇〇-〇〇〇〇で登録してください',
            'addr.required' => '住所が設定されていません',
            'addr.max' => '住所は255文字以内で登録してください',
            'building.max' => '建物名は255文字以内で登録してください', 
        ];
    }
}
