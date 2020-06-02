<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'mail' => 'required|email',
            'pass' => 'required|min:7',
            'conf_pass' => 'required|same:pass',
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => '名前は必須項目です。',
            'mail.required'         => 'メールアドレスは必須項目です。',
            'mail.email'            => 'メールアドレスの形式を確認して下さい。',
            'pass.required'         => 'パスワードは必須項目です。',
            'pass.min'             => 'パスワードは7文字以上で入力して下さい。',
            'conf_pass.same'        => '同じパスワードを入力して下さい。',
            'conf_pass.required'    => '確認用パスワードは必須項目です。',
        ];
    }
}
