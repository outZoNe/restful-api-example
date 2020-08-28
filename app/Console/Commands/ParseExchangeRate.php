<?php

namespace App\Console\Commands;

use App\ExchangeRate;
use \GuzzleHttp\Client;
use Illuminate\Console\Command;

class ParseExchangeRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:exchange_rate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse exchange rate';

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
     * Парсим валюту и сохраняем в БД. Одна запись раз в сутки в полночь
     *
     * @return int
     */
    public function handle()
    {
        $client = new Client();
        $res = new \SimpleXMLElement($client->request('GET', 'http://www.cbr.ru/scripts/XML_daily.asp?date_req=' . \Carbon\Carbon::now()->format('d/m/Y'))->getBody());
        $data = [
            'date' => \Carbon\Carbon::now()->format('Y-m-d')
        ];

        foreach ($res as $el) {
            $data[strtolower($el->CharCode)] = str_replace(',', '.', $el[0]->Value);
        }

        ExchangeRate::create($data);
        return 0;
    }
}
