<?php

namespace App\Models;

use Goutte\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'exchange_rate',
        'last_rate_update',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'last_rate_update' => 'datetime:Y-m-d',
    ];

    /**
     * The users that belong to the stock.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Get the current price of the stock.
     * 
     * Alpha Vantage limits: 5 API requests per minute and 500 requests per day
     */
    public function getCurrentRate()
    {
        // $response = Http::get("https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=$this->symbol&apikey=" . env('ALPHA_VANTAGE_KEY'));
        // if (array_key_exists("Note", $response->json())) {
        //     return null;
        // }
        // return $response->json()["Global Quote"]["05. price"];

        $client = new Client();

        $crawler = $client->request('GET', 'https://finance.yahoo.com/quote/' . $this->symbol);

        $scrapedPrice = $crawler->filter($this->yahoo_css_selector)->text();
        $price = str_replace(',', '', $scrapedPrice);

        return $price;

        // return rand(1, 4000);
    }
}
