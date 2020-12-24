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
                'name' => 'Airbnb',
                'symbol' => 'ABNB',
                'yahoo_css_selector' => 'div > span[data-reactid=42]',
            ],
            [
                'name' => 'Amazon',
                'symbol' => 'AMZN',
                'yahoo_css_selector' => 'div > span[data-reactid=50]',
            ],
            [
                'name' => 'Apple',
                'symbol' => 'AAPL',
                'yahoo_css_selector' => 'div > span[data-reactid=50]'
            ],
            [
                'name' => 'C3.ai',
                'symbol' => 'AI',
                'yahoo_css_selector' => 'div > span[data-reactid=50]'
            ],
            [
                'name' => 'NIO',
                'symbol' => 'NIO',
                'yahoo_css_selector' => 'div > span[data-reactid=50]'
            ],
            [
                'name' => 'Tesla',
                'symbol' => 'TSLA',
                'yahoo_css_selector' => 'div > span[data-reactid=50]'
            ], 
        ];

        foreach ($stocks as $stock) {
            Stock::factory()->create([
                'name' => $stock['name'],
                'symbol' => $stock['symbol'],
                'yahoo_css_selector' => optional($stock)['yahoo_css_selector'],
            ]);
        }
    }
}
