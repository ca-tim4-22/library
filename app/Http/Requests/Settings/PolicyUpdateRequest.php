<?php

namespace App\Http\Requests\Settings;

use App\Rules\PolicyRule;
use Illuminate\Foundation\Http\FormRequest;

class PolicyUpdateRequest extends FormRequest
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
            'value' => [
                'numeric',
                'gt:0',
                new PolicyRule(),
            ],
        ];
    }
}
