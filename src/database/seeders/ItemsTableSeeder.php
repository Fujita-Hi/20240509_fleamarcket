<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'name' => '商品1',
            'brand' => 'brand1',
            'price' => '47000',
            'category' => '洋服,メンズ',
            'condition' => '良好',
            'description' => '商品1の説明',
            'img' => 'sample.jpg'
        ];
        DB::table('items')->insert($param);

        $param = [
            'name' => '商品2',
            'brand' => 'brand2',
            'price' => '47000',
            'category' => '洋服,メンズ',
            'condition' => '良好',
            'description' => '商品2の説明',
            'img' => 'sample.jpg'
        ];
        DB::table('items')->insert($param);

        $param = [
            'name' => '商品3',
            'brand' => 'brand3',
            'price' => '47000',
            'category' => '洋服,メンズ',
            'condition' => '良好',
            'description' => '商品3の説明',
            'img' => 'sample.jpg'
        ];
        DB::table('items')->insert($param);

        $param = [
            'name' => '商品4',
            'brand' => 'brand4',
            'price' => '47000',
            'category' => '洋服,メンズ',
            'condition' => '良好',
            'description' => '商品4の説明',
            'img' => 'sample.jpg'
        ];
        DB::table('items')->insert($param);
        
        $param = [
            'name' => '商品5',
            'brand' => 'brand5',
            'price' => '47000',
            'category' => '洋服,メンズ',
            'condition' => '良好',
            'description' => '商品5の説明',
            'img' => 'sample.jpg'
        ];
        DB::table('items')->insert($param);

        $param = [
            'name' => '商品6',
            'brand' => 'brand6',
            'price' => '47000',
            'category' => '洋服,メンズ',
            'condition' => '良好',
            'description' => '商品6の説明',
            'img' => 'sample.jpg'
        ];
        DB::table('items')->insert($param);

        $param = [
            'name' => '商品7',
            'brand' => 'brand7',
            'price' => '47000',
            'category' => '洋服,メンズ',
            'condition' => '良好',
            'description' => '商品7の説明',
            'img' => 'sample.jpg'
        ];
        DB::table('items')->insert($param);

        $param = [
            'name' => '商品8',
            'brand' => 'brand8',
            'price' => '47000',
            'category' => '洋服,メンズ',
            'condition' => '良好',
            'description' => '商品8の説明',
            'img' => 'sample.jpg'
        ];
        DB::table('items')->insert($param);

        $param = [
            'name' => '商品9',
            'brand' => 'brand9',
            'price' => '47000',
            'category' => '洋服,メンズ',
            'condition' => '良好',
            'description' => '商品9の説明',
            'img' => 'sample.jpg'
        ];
        DB::table('items')->insert($param);

        $param = [
            'name' => '商品10',
            'brand' => 'brand10',
            'price' => '47000',
            'category' => '洋服,メンズ',
            'condition' => '良好',
            'description' => '商品10の説明',
            'img' => 'sample.jpg'
        ];
        DB::table('items')->insert($param);
    }
}
