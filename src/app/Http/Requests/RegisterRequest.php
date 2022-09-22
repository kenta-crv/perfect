<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\NotDeleted;

class RegisterRequest extends FormRequest
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
            'last_name' => ['required', 'string', 'max:20'],
            'first_name' => ['required', 'string', 'max:20'],
            'last_name_kana' => ['required', 'string', 'max:20', 'regex:/^[ぁ-ん 　〜ー−]+$/u'],
            'first_name_kana' => ['required', 'string', 'max:20', 'regex:/^[ぁ-ん 　〜ー−]+$/u'],
            'nickname' => ['required', 'string', 'max:20'],
            'birthday' => ['required'],
            'zipcode' => ['required'],
            'prefecture' => ['required'],
            'address' => ['required'],
            // 'tel' => 'required|regex:/^[0-9]{2,4}[0-9]{2,4}[0-9]{3,4}$/',
            'tel' => 'required|regex:/^[0-9]{2,4}$/',
            'tel2' => 'required|regex:/^[0-9]{2,4}$/',
            'tel3' => 'required|regex:/^[0-9]{3,4}$/',
            'pachislot_flag' => ['required'],
            // 'email' => ['required', 'email', new NotDeleted('users', 'email'), 'unique:users,email','email:strict,dns,spoof'],
            'email' => ['required', 'email', new NotDeleted('users', 'email'), 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed', 'min:6', 'regex:/^[a-zA-Z0-9]+$/'],
            'password_confirmation' => ['required_with:password'],
        ];
    }

    public function messages()
    {
        return [
            '*.required' => ':attributeを入力してください。',
            '*.regex' => ':attributeに正しい形式を入力してください。',
            '*.confirmed' => ':attribute（確認）と一致していません。',
            '*.unique' => 'この:attributeはすでに登録されています。',
            // '*.min:6' => ':attribute fsdfsdfsdfsd',
            '*.min' => ':attribute 少なくとも6文字である必要があります',
            'nickname.max' => 'ニックネームは最大20文字',

        ];
    }

    public function attributes()
    {
        return [
            'last_name' => '姓',
            'first_name' => '名',
            'last_name_kana' => 'ふりがな（せい）',
            'first_name_kana' => 'ふりがな（めい）',
            'nickname' => 'ニックネーム',
            'birthday' => '生年月日',
            'zipcode' => '郵便番号',
            'prefecture' => '都道府県',
            'address' => '市区町村',
            'tel' => '電話番号',
            'tel2' => '電話番号',
            'tel3' => '電話番号',
            'email' => 'Eメール',
            'pachislot_flag' => 'パチンコ派パチスロ派',
            'password' => 'パスワード',
            'password_confirmation' => '確認用パスワード',
        ];
    }
}
