<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class FillProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $productsData = [
            [
                'image_path' => 'A',
                'product_name' => 'KAIAK PULSO MASCULINO',
                'product_category' => 'PERFUME',
                'product_price' => 155.90,
                'product_qty' => 3,
            ],
            [
                'image_path' => 'B',
                'product_name' => 'KAIAK AVENTURA MASCULINO',
                'product_category' => 'PERFUME',
                'product_price' => 124.70,
                'product_qty' => 3,
            ],
            [
                'image_path' => 'C',
                'product_name' => 'KAIAK AERO MASCULINO',
                'product_category' => 'PERFUME',
                'product_price' => 155.90,
                'product_qty' => 3,
            ],
            [
                'image_path' => 'D',
                'product_name' => 'KAIAK OCEANO MASCULINO',
                'product_category' => 'PERFUME',
                'product_price' => 124.70,
                'product_qty' => 3,
            ],
            [
                'image_path' => 'E',
                'product_name' => 'KAIAK URBE MASCULINO',
                'product_category' => 'PERFUME',
                'product_price' => 155.90,
                'product_qty' => 3,
            ],
            [
                'image_path' => 'F',
                'product_name' => 'NATURA HOMEM MASCULINO',
                'product_category' => 'PERFUME',
                'product_price' => 169.90,
                'product_qty' => 2,
            ],
            [
                'image_path' => 'G',
                'product_name' => 'LUNA DESODORANTE COLONIA',
                'product_category' => 'PERFUME',
                'product_price' => 157.90,
                'product_qty' => 2,
            ],
            [
                'image_path' => 'H',
                'product_name' => 'LUNA RADIANTE DESODORANTE COLONIA',
                'product_category' => 'PERFUME',
                'product_price' => 157.90,
                'product_qty' => 2,
            ],
            [
                'image_path' => 'I',
                'product_name' => 'HUMOR A DOIS DESODORANTE COLONIA',
                'product_category' => 'PERFUME',
                'product_price' => 89.90,
                'product_qty' => 3,
            ],
            [
                'image_path' => 'J',
                'product_name' => 'HUMOR PRÓPRIO DESODORANTE COLONIA',
                'product_category' => 'PERFUME',
                'product_price' => 89.90,
                'product_qty' => 3,
            ],
            [
                'image_path' => 'K',
                'product_name' => 'Sabonete em Barra Puro Vegetal Tododia Macadâmia',
                'product_category' => 'CORPO E BANHO',
                'product_price' => 28.90,
                'product_qty' => 5,
            ],
            [
                'image_path' => 'L',
                'product_name' => 'Sabonete Em Barra Puro Vegetal Tododia Capim Limão e Hortelã',
                'product_category' => 'CORPO E BANHO',
                'product_price' => 25.90,
                'product_qty' => 5,
            ],
            [
                'image_path' => 'M',
                'product_name' => 'Sabonete em Barra Puro Vegetal Cremoso e Esfoliante Ekos Maracujá',
                'product_category' => 'CORPO E BANHO',
                'product_price' => 29.90,
                'product_qty' => 5,
            ],
            [
                'image_path' => 'N',
                'product_name' => 'Desodorante Corporal Kaiak Masculino',
                'product_category' => 'CORPO E BANHO',
                'product_price' => 33.90,
                'product_qty' => 4,
            ],
            [
                'image_path' => 'O',
                'product_name' => 'Desodorante Corporal Natura Homem',
                'product_category' => 'CORPO E BANHO',
                'product_price' => 33.90,
                'product_qty' => 4,
            ],
            [
                'image_path' => 'P',
                'product_name' => 'Desodorante Antitranspirante Roll-On Natura Homem',
                'product_category' => 'CORPO E BANHO',
                'product_price' => 25.90,
                'product_qty' => 4,
            ],
            [
                'image_path' => 'Q',
                'product_name' => 'Desodorante Corporal Luna',
                'product_category' => 'CORPO E BANHO',
                'product_price' => 44.90,
                'product_qty' => 4,
            ],
            [
                'image_path' => 'R',
                'product_name' => 'Sabonete gel para o rosto faces',
                'product_category' => 'ROSTO',
                'product_price' => 23.90,
                'product_qty' => 2,
            ],
        ];

        foreach ($productsData as $productData) {
            DB::table('products')->insert([
                'product_name' => $productData['product_name'],
                'product_qty' => $productData['product_qty'],
                'product_description' => '',
                'product_category' => $productData['product_category'],
                'product_price' => $productData['product_price'],
                'product_image_path' => $productData['image_path'] . '.jpg',
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
