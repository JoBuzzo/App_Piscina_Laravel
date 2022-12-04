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
                'primeiro_dia' => "required|date|unique:reservas,primeiro_dia,{$id},id|unique:reservas,ultimo_dia,{$id},id",        
                'ultimo_dia' => "nullable|date|unique:reservas,primeiro_dia,{$id},id|unique:reservas,ultimo_dia,{$id},id",           
                'valor_pago' => 'required',        
                'valor_total' => 'required',        
                'outrainst' => 'nullable|required_if:valor_pago,OUTRO|numeric',        
                'outraopcao' => 'nullable|required_if:valor_total,OUTRO|numeric',        
        ];
    }
    public function messages()
    {
        return [
            'required_if' => 'O campo :attribute é obrigatório.',
        ];
    }
}
