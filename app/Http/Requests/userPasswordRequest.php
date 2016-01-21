<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use User;
class userPasswordRequest extends Request
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
            'oldpassword'=>'required',
            'newpassword'=>'required|min:3|different:oldpassword|same:password_confirmation',
            'password_confirmation' => 'required|min:3'
        ];
    }
}
