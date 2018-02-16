<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditCardChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_card_charges', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('credit_card_id');
            $table->string('source');
            $table->float('amount');
            $table->timestamp('date_charged')->useCurrent();
            $table->boolean('is_paid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credit_card_charges');
    }
}
