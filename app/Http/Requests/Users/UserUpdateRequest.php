<?php

namespace App\Http\Requests\Users;

use App\Rules\EmailVerification\EmailVerificationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => "required|min:2|max:30",
            'username' => "required|min:2|max:30|unique:users,username,$this->id,id",
            'email' => [
                'required', 
                'string', 
                'email', 
                'min:2', 
                'max:255', 
                "unique:users,email,$this->id,id",
                new EmailVerificationRule(),],
        ];
    }

    public function messages()
    {
        return [
            'username.unique' => "Uneseno korisničko ime -> " . $_REQUEST['username'] . " je zauzeto.",  
        ];
    }
}
