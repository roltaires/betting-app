<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyWagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_wagers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('wager_id');
            $table->decimal('buying_price', 10, 2);
            $table->timestamp('bought_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buy_wagers');
    }
}
