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

        for ($i = 0; $i < 20; $i++) {
            DB::table('products')->insert([
                'product_name' => $faker->word,
                'product_qty' => $faker->randomNumber(2),
                'product_description' => $faker->sentence,
                'product_category' => json_encode([$faker->word, $faker->word]),
                'product_price' => $faker->randomFloat(2, 10, 100),
                'product_image_path' => 'bd4b039ea9de88151f77958bb54c80aa.png',
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
