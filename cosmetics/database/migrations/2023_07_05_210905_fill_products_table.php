<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FillProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $faker = Faker::create();

        // Array com as 6 categorias disponíveis
        $categories = [
            'Maquiagem',
            'Cuidados com a pele',
            'Cuidados com o cabelo',
            'Perfumes e fragrâncias',
            'Produtos para banho e corpo',
            'Unhas e esmaltes',
            'Acessórios de beleza',
        ];
        
        for ($i = 0; $i < 20; $i++) {
            DB::table('products')->insert([
                'product_name' => $faker->word,
                'product_qty' => $faker->randomNumber(2),
                'product_description' => $faker->sentence,
                'product_category' => $faker->randomElement($categories), // Escolher uma categoria aleatoriamente
                'product_price' => $faker->randomFloat(2, 10, 100),
                'product_image_path' => 'c6e9182d0dbd0568699a9006b0e08129.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('products')->truncate();
    }
}
