<?php

namespace App\Http\Requests\Users;

use App\Rules\EmailVerification\EmailVerificationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:128',
            'username' => 'required|min:2|max:64|unique:users',
            'email' => [
                'required',
                'string',
                'email',
                'min:2',
                'max:255',
                'unique:users',
                new EmailVerificationRule(),
            ],
            'password' => 'required|min:8|confirmed',
            'JMBG' => 'required|min:13|max:13|unique:users',
            'photo' => 'image',
            'user_gender_id' => 'required',
        ];
    }
}
