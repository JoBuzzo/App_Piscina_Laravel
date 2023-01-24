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
    
        $rules = [
                'nome' => 'required|string|min:4|max:30',        
                'numero' => 'nullable|string|min:15',        
                'primeiro_dia' => "required|unique:reservas,primeiro_dia,id",        
                'ultimo_dia' => "required|unique_ultimo",           
                'valor_pago' => 'required',
                'valor_total' => 'required|gte:valor_pago',    
        ];

        
        if($this->method() == 'PUT'){
            $rules['primeiro_dia'] = [
                'nullable',
                'unique_primeiro'
            ];
            $rules['ultimo_dia'] = [
                'nullable',
                'unique_ultimo'
            ];
        }
        return $rules;
    }

}
