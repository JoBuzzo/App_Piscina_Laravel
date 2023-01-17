<?php namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class UniqueDateServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //Criação de uma nova validação  
        \Validator::extend('unique_primeiro', function ($attribute, $value, $parameters, $validator) {

            $value = str_replace('/', '-', $value);
            $value = date("Y-m-d", strtotime($value));

            return ((DB::table('reservas')->where('primeiro_dia','=', $value)->where('ultimo_dia','=', $value)->count()) == 0 );

        });

        \Validator::extend('unique_ultimo', function ($attribute, $value, $parameters, $validator) {

            $value = str_replace('/', '-', $value);
            $value = date("Y-m-d", strtotime($value));
            return ((DB::table('reservas')->where('primeiro_dia','=', $value)->count()) == 0 );

        });

        //Mensagem da validação customizada
        \Validator::replacer('unique_primeiro', function ($message, $attribute, $rule, $parameters) {

            return 'Data já existente no sistema';

        });

        \Validator::replacer('unique_ultimo', function ($message, $attribute, $rule, $parameters) {

            return 'Data já existente no sistema';

        });
    }    
    public function register()
    {
    }
}
