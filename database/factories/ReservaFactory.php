<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reserva>
 */
class ReservaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $dia = rand(1, 28);
        $mes = rand(1, 12);
    
        $data = "2023-$mes-$dia";
        $data = date('Y-m-d', strtotime($data));

   
        $valor = 400;
        
        
        return [
  
                'nome' => fake()->name(),
                'primeiro_dia' => $data,
                'ultimo_dia' => $data,
                'valor_pago' => $valor,
                'valor_total' => $valor,
                'valor_pendente' => 0,
        ];
    }
}
