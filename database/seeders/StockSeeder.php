<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stocks = [
            [
                'name' => 'Amazon',
                'symbol' => 'AMZN',
            ],
            [
                'name' => 'Apple',
                'symbol' => 'AAPL',
            ],
            [
                'name' => 'NIO',
                'symbol' => 'NIO',
            ],
            [
                'name' => 'Tesla',
                'symbol' => 'TSLA',
            ], 
        ];

        foreach ($stocks as $stock) {
            Stock::factory()->create([
                'name' => $stock['name'],
                'symbol' => $stock['symbol'],
            ]);
        }
    }
}
