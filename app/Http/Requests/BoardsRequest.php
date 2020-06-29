<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoardsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->path() == 'boards/store' | $this->path() == 'boards/update')
        {
            return true;
        } else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50',
            'content' => 'required|max:140',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルは必須項目です。',
            'title.max' => 'タイトルは50文字以内で入力して下さい。',
            'content.required' => 'コンテンツは必須項目です。',
            'content.max' => 'コンテンツは140文字以内で入力して下さい。',
        ];
    }
}
