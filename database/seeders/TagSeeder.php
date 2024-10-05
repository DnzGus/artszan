<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->insert([
            'name' => 'animais'
        ]);
        DB::table('tags')->insert([
            'name' => 'comidas'
        ]);
        DB::table('tags')->insert([
            'name' => 'horror'
        ]);
        DB::table('tags')->insert([
            'name' => 'anatomia'
        ]);
        DB::table('tags')->insert([
            'name' => 'personagens'
        ]);
        DB::table('tags')->insert([
            'name' => 'fanart'
        ]);
        DB::table('tags')->insert([
            'name' => 'arquitetura'
        ]);
        DB::table('tags')->insert([
            'name' => 'veiculos'
        ]);
        DB::table('tags')->insert([
            'name' => 'animes'
        ]);
    }
};
