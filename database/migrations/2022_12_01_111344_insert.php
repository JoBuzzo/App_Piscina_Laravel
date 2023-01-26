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

        User::create([
            'name' => 'João Lucas',
            'login' => 'Administrador',
            'admin' => 1,
            'password' => Hash::make('admin'), 
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
