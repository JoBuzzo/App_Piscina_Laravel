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

        $valor_pago = rand(0,700);
        $valor_total = rand(400,700);
        
        while($valor_total < $valor_pago){
            $aux = $valor_pago;
            $valor_pago = $valor_total;
            $valor_total = $aux;
        }

        if($data <= date('Y-m-d')){
            
            $valor_pago = $valor_total;
        }
        
        $valor_pendente = $valor_total - $valor_pago;

        
        return [
  
                'nome' => fake()->name(),
                'primeiro_dia' => $data,
                'valor_pago' => $valor_pago,
                'valor_total' => $valor_total,
                'valor_pendente' => $valor_pendente,
        ];
    }
}
