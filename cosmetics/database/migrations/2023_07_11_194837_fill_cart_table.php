<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $faker = Faker::create();

        
        
        for($i = 0; $i < 19; $i++){
            
            $userid = $this -> getRandomNumber(1, 19);
            $productid = $this -> getRandomNumber(1, 18);
            $qty = $this -> getRandomNumber(1, 3);

            DB::table('carts')->insert([
                'user_id' => $userid,
                'product_id' => $productid,
                'qty' => $qty,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('cart')->truncate();
    }

    private function getRandomNumber($min, $max){
        return rand($min, $max);
    }
};
