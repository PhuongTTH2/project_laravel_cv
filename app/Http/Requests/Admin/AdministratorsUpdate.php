<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdministratorsUpdate extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $requests = FormRequest::all();
        if (preg_match("/create/", \URL::previous())) {
            return [
                'account' => 'required|ascii|max:64|unique:administrators,account',
                'password' => 'required|ascii|min:6|max:64',
                'password_confirm' => 'same:password',
            ];
    
        } else {
            return [
                'account' => sprintf('required|ascii|max:64|unique:administrators,account,%s,id,deleted_at,NULL', $requests['administrators_id']),
                'password' => 'nullable|ascii|min:6|max:64',
                'password_confirm' => 'same:password',
            ];
        }
    }

    /**
     * 定義済みバリデーションルールのエラーメッセージ取得
     *
     * @return array
     */
    public function messages()
    {
        return [
            'password_confirm.same' => 'パスワードと同じ文字を入力してください。',
            'account.unique' => '既に使用されているログインIDです。',
            'account.ascii' => 'ログインIDは半角英数字、記号のみで入力してください。',
            'password.ascii' => 'パスワードは半角英数字、記号のみで入力してください。',
        ];
    }
}