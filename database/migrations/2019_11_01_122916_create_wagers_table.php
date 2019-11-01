<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wagers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('total_wager_value', 10, 2);
            $table->decimal('odds', 4, 2);
            $table->smallInteger('selling_percentage');
            $table->decimal('selling_price', 10, 2);
            $table->decimal('current_selling_price', 10, 2);
            $table->smallInteger('percentage_sold')->nullable();
            $table->decimal('amount_sold', 10, 2)->nullable();
            $table->timestamp('placed_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wagers');
    }
}
