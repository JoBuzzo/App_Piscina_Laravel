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

        //Admins
        User::create([
            'name' => 'Wander Camargo dos Santos',
            'login' => 'WanderCamargo',
            'admin' => 1,
            'password' => Hash::make('123456'), 
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Rosimeire Buzzo Camargo',
            'login' => 'RosiBuzzo',
            'admin' => 1,
            'password' => Hash::make('123456'), 
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Pedro Augusto Buzzo',
            'login' => 'PedroBuzzo',
            'admin' => 1,
            'password' => Hash::make('123456'), 
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Laiza Camargo',
            'login' => 'LaizaCamargo',
            'admin' => 1,
            'password' => Hash::make('123456'), 
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'João Lucas Buzzo',
            'login' => 'JoaoBuzzo',
            'admin' => 1,
            'password' => Hash::make('123456'), 
            'remember_token' => Str::random(10),
        ]); 
        User::create([
            'name' => 'Heitor Bergamaschi Camargo',
            'login' => 'HeitorBergamaschi',
            'admin' => 1,
            'password' => Hash::make('123456'), 
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
