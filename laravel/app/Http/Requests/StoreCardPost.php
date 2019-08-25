<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCardPost extends FormRequest
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
            'title' => 'required|max:20',
            'memo'  => 'required|max:255'
        ];
    }
    
    /**
     * 定義済みバリデーションルールのエラーメッセージ取得
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'タイトルを入力してください',
            'title.max'      => 'タイトルは最大20文字までです',
            'memo.required'  => 'メモを入力してください',
            'title.max'      => 'メモは最大255文字までです',
        ];
    }
}
