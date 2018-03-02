<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetAmountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budget_amounts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('budget_category_id');
            $table->float('adjustment');
            $table->float('added_to_this_month');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('budget_amounts');
    }
}
