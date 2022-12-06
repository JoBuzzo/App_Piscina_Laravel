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
        $ano = rand(2021, 2023);
        $data = "$ano-$mes-$dia";
        $data = date('Y-m-d', strtotime($data));
        $valor1 = rand(0,500);
        $valor2 = rand(200,1000);
        
        if($data <= date('Y-m-d')){
            
            $valor1 = $valor2;
        }
        
        $valor3 = $valor2 - $valor1;

        
        return [
  
                'nome' => fake()->name(),
                'primeiro_dia' => $data,
                'valor_pago' => $valor1,
                'valor_total' => $valor2,
                'valor_pendente' => $valor3,
        ];
    }
}
