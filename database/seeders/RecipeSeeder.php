<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert(
            [
                'name' => 'torte',
                'parent_id' => 1
            ],
            [   'name' => 'slatke torte',
                'parent_id' => 1
        ]);

        DB::table('ingredient_groups')->insert([
            [
                'name' => 'sastojci za fil'
            ],
            [
                'name' => "sastojci za punjenje"
            ],
            [
                'name' => 'sastojci za paste'
            ]]);

        DB::table('step_groups')->insert([
            [
                'name' => 'priprema fila'
            ],
            [
                'name' => "priprema baze"
            ],
            [
                'name' => 'zavrsna priprema'
            ]]);

        DB::table('steps')->insert([
            [
                'recipe_id' => 1,
                'title' => 'sipajte brasno',
                'group' => 1,
            ],
            [
                'recipe_id' => 1,
                'title' => 'sipajte secer',
                'group' => 1,
            ],
            [
                'recipe_id' => 1,
                'title' => 'sipajte nista',
                'group' => 2,
            ],
            [
                'recipe_id' => 1,
                'title' => 'preliv',
                'group' => null
            ],
            [
                'recipe_id' => 2,
                'title' => 'sipajte nista opet',
                'group' => 1,
            ],
            [
                'recipe_id' => 2,
                'title' => 'sipajte sastojak grupa 1',
                'group' => 1,
            ],
            [
                'recipe_id' => 2,
                'title' => 'sipajte sastojak grupa 2',
                'group' => 2,
            ],
            [
                'recipe_id' => 2,
                'title' => 'sipajte samostalan sastojak',
                'group' => null
            ]]);


        DB::table('ingredients')->insert([
            [
                'recipe_id' => 1,
                'title' => 'brasno',
                'group' => 1,
            ],
            [
                'recipe_id' => 1,
                'title' => 'secer',
                'group' => 1,
            ],
                [
                'recipe_id' => 1,
                'title' => 'srbija',
                'group' => 2,
            ],
            [
                'recipe_id' => 1,
                'title' => 'preliv',
                'group' => null
            ],
            [
                'recipe_id' => 2,
                'title' => 'nebitan sastojak grupa 1',
                'group' => 1,
            ],
            [
                'recipe_id' => 2,
                'title' => 'nebitan sastojak grupa 1',
                'group' => 1,
            ],
            [
                'recipe_id' => 2,
                'title' => 'nebitan sastojak grupa 2',
                'group' => 2,
            ],
            [
                'recipe_id' => 2,
                'title' => 'samostalan sastojak',
                'group' => null
            ]]);

        DB::table('recipes')->insert([
            [
            'title' => 'kolac sa sljivama',
            'user_id' => 1,
            'category_id' => 2,
            'slug' => 'kolac-sa-sljivama',
            'difficulty' => 'Tesko',
            'preparation_time' => '10',
            'portion_number' => '3',
            'description' => 'ovo je nebitan opis',
            ],
            [
                'title' => 'rozen torta',
                'user_id' => 2,
                'category_id' => 2,
                'slug' => 'rozen-torta',
                'difficulty' => 'Lako',
                'preparation_time' => '20',
                'portion_number' => '10',
                'description' => 'jos jedan nebitan opis',
            ]]);
    }
}
