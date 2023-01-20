<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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

        $rules = [
            'name' => 'required|string|max:35|min:4',
            'login' => 'required|string|max:20|min:4',
            'password' => 'required|min:6|max:20',
        ];

        if($this->method() == 'PUT'){
            $rules['password'] = [
                'nullable',
                'min:6',
                'max:20'
            ];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => 'O campo nome deve ser preenchido',
            'name.max' => 'O campo nome deve ter no máximo 20 caracteres',
            'password.max' => 'O campo senha deve ter no máximo 20 caracteres',
            'name.min' => 'O campo nome deve ter no mínimo 5 caracteres',
            'password.min' => 'O campo senha deve ter no mínimo 6 caracteres',
        ];
    }
}
