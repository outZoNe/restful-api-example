<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nickname')->unique()->index(); // попросим БД содать индекс для этого поля, вдруг нам в будущем захочется сделать поиск по nickname
            $table->enum('currency', ['AUD', 'GBP', 'DKK', 'USD', 'EUR', 'KZT', 'RUB']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
