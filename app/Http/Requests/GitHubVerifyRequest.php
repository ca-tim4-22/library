<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GitHubVerifyRequest extends FormRequest
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
            'email' => 'required|min:2|max:50|email|unique:users,email,' . $this->id,
            'JMBG' => 'required|min:13|max:13',
            'user_gender_id' => 'required',
            'result' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }

    public function messages()
    {
        return [
            'JMBG.max' => 'Polje za JMBG ne može da sadrži više od 13 karaktera.',
            'g-recaptcha-response.required' => 'Ovo polje morate označiti.',
        ];
    }
}
