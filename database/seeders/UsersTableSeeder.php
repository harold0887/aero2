<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Usuario Acosta',
            'email' => 'arnulfoacosta0887@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('5514404046'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $usuario = User::create([
            'name' => 'Arnulfo Acosta',
            'email' => 'harold0887@hotmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('5514404046'),
            'created_at' => now(),
            'updated_at' => now()
        ]);



        $admin->assignRole('administrador');
        $usuario->assignRole('usuario');
    }
}
