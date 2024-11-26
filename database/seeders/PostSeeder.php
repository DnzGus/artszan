<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'id' => '1',
            'tags_id' => '["1","5"]',
            'user_id' => '4',
            'title' => 'Leão de nárnia aslan',
            'description' => 'O Grande Leão falante do mundo de Nárnia.',
            'nsfw' => '0',
            'private' => '0',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('posts')->insert([
            'id' => '2',
            'tags_id' => '["1","6"]',
            'user_id' => '4',
            'title' => 'Foca brincalhona',
            'description' => 'Foca brincalhona sonhadora da natureza.',
            'nsfw' => '0',
            'private' => '0',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('posts')->insert([
            'id' => '3',
            'tags_id' => '["1","10"]',
            'user_id' => '4',
            'title' => 'Gatos pixel',
            'description' => 'Gatinhos arranhando uma parede.',
            'nsfw' => '0',
            'private' => '0',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('posts')->insert([
            'id' => '4',
            'tags_id' => '["4","5","6"]',
            'user_id' => '4',
            'title' => 'Personagens que eu gosto',
            'description' => 'Alguns personagens que eu gosto.',
            'nsfw' => '1',
            'private' => '0',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('posts')->insert([
            'id' => '5',
            'tags_id' => '["5","6"]',
            'user_id' => '4',
            'title' => 'Soldados Futuristas',
            'description' => 'Soldados em uma batalha futurista.',
            'nsfw' => '0',
            'private' => '0',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('posts')->insert([
            'id' => '6',
            'tags_id' => '["3","7"]',
            'user_id' => '1',
            'title' => 'Cidade pos apocaliptica',
            'description' => 'Cenário fictício que se passa após um evento catastrófico que causou o colapso da sociedade.',
            'nsfw' => '0',
            'private' => '0',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('posts')->insert([
            'id' => '7',
            'tags_id' => '["3","4","9"]',
            'user_id' => '3',
            'title' => 'Coisas de horror',
            'description' => 'Imagens de horror.',
            'nsfw' => '0',
            'private' => '0',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('posts')->insert([
            'id' => '8',
            'tags_id' => '["2","7","9"]',
            'user_id' => '2',
            'title' => 'Cozinhas',
            'description' => 'Artes de cozinhas.',
            'nsfw' => '0',
            'private' => '0',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
