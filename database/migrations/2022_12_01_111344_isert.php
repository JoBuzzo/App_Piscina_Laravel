<?php

use App\Models\Config;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Config::create([
            'nao_pago' => 0,
            'entrada_um' => 200,
            'entrada_dois' => 350,
            'completo_um' => 400,
            'completo_dois' => 700,
        ]);

        User::create([
            'name' => 'Administrador',
            'admin' => 1,
            'password' => Hash::make('password'), 
            'remember_token' => Str::random(10),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
