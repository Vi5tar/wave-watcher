<?php

namespace App\Console\Commands;

use App\Models\Stock;
use Carbon\Carbon;
use Illuminate\Console\Command;

class GetCurrentStockRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stock:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrapes yahoo finance for live price.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $stocks = Stock::all();

        foreach ($stocks as $stock) {
            $stock->update([
                'exchange_rate' => $stock->getCurrentRate(),
                'last_rate_update' => Carbon::now(),
            ]);

            sleep(rand(1, 4)); //slow it down in hopes of not getting black listed.
        }
    }
}
