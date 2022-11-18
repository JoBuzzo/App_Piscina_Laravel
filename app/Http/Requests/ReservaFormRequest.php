<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservaFormRequest extends FormRequest
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
        $id = $this->id ?? '';
        return [
                'nome' => 'required|string|min:4|max:30',        
                'primeiro_dia' => "required|date|unique:reservas,primeiro_dia,{$id},id",        
                'primeiro_dia' => "required|date|unique:reservas,ultimo_dia,{$id},id",        
                'ultimo_dia' => "nullable|date|unique:reservas,primeiro_dia,{$id},id",        
                'pagamento' => 'required',        
                'valor' => 'nullable|numeric',        
        ];
    }
    public function messages()
    {
        return [
            'required' => 'O campo :attribute deve ser preenchido',
            'unique' => 'O campo :attribute já está reservado',
            'max' => 'O campo :attribute deve ter no máximo 30 caracteres',
            'min' => 'O campo :attribute deve ter no mínimo 4 caracteres',
            'numeric' => 'O campo :attribute deve ser caracteres do tipo números',
        ];
    }
}
