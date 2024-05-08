<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'comment' => 'required|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'item_id.required' => '商品情報が読み込めませんでした。ページを読み込みなおしてください',
            'comment.required' => '商品へのコメントは必須です',
            'comment.max' => '商品へのコメントを1000文字以内で登録してください',
        ];
    }
}
