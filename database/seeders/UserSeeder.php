<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Gabriel Lopes',
            'email' => 'fernandes.g@csi.com',
            'password' => Hash::make('12345678'),
            'profile' => 'admin'
        ]);

        DB::table('users')->insert([
            'name' => 'Gustavo Diniz',
            'email' => 'gus@csi.com',
            'password' => Hash::make('12345678'),
            'profile' => 'admin'
        ]);

        DB::table('users')->insert([
            'name' => 'Gabriel Pereira',
            'email' => 'gb@csi.com',
            'password' => Hash::make('12345678'),
            'profile' => 'admin'
        ]);

        DB::table('users')->insert([
            'name' => 'Rogério',
            'email' => 'rogerio@csi.com',
            'password' => Hash::make('12345678'),
            'profile' => 'admin'
        ]);

        DB::table('users')->insert([
            'name' => 'Teste',
            'email' => 'teste@csi.com',
            'password' => Hash::make('12345678'),
            'profile' => 'user'
        ]);

        DB::table('users')->insert([
            'name' => 'André Neves',
            'email' => 'andr@andr.com.br',
            'password' => Hash::make('123456789'),
            'profile' => 'admin'
        ]);
    }
}
