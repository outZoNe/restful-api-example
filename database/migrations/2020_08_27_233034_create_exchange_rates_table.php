<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangeRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchange_rates', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedDecimal('aud', 10, 5)->nullable();
            $table->unsignedDecimal('gbp', 10, 5)->nullable();
            $table->unsignedDecimal('dkk', 10, 5)->nullable();
            $table->unsignedDecimal('usd', 10, 5)->nullable();
            $table->unsignedDecimal('eur', 10, 5)->nullable();
            $table->unsignedDecimal('kzt', 10, 5)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchange_rates');
    }
}
