<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'upload_file' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
            'name' => 'nullable|max:255',
            'code' => 'nullable|regex:/^\d{3}-\d{4}$/',
            'addr' => 'nullable|max:255',
            'building' => 'nullable|max:255'
        ];
    }

    public function messages()
    {
        return [
            'upload_file' => '画像は2MB以内の画像ファイルで登録してください',
            'name.max' => 'ユーザー名は255文字以内で登録してください',
            'code.regex' => '郵便番号は〇〇〇-〇〇〇〇形式で登録してください',
            'addr.max' => '住所は255文字以内で登録してください',
            'building.max' => '建物名は255文字以内で登録してください', 
        ];
    }
}
