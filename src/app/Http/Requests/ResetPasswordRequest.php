<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'token' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed|min:6|',
            'password_confirmation' => 'required_with:password|min:6|',
        ];
    }

    public function messages()
    {
        return [
            'email.required' =>  ':attributeを入力してください。',
            'password.required' =>  ':attributeを入力してください。',
            'password.confirmed' => '確認用パスワードと内容がちがいます。',
            'password.min' => 'パスワードは6文字以上です。',
            'password_confirmation.required' =>  ':attributeを入力してください。',
            'password_confirmation.min' => '確認用パスワードは6文字以上です。',
            'token.required' =>  ':attributeが有効ではありません。',
        ];
    }


    public function attributes()
    {
        return [
            'token' => 'トークン',
            'email' => 'メール',
            'password' => 'パスワード',
            'password_confirmation' => '確認用パスワード',
        ];
    }
}
