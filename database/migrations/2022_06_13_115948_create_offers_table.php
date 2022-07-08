<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->integer('id', true);
            $table->bigInteger('owner_id')->unsigned()->index('users_id');
            $table->integer('request_id')->index('request_id');
            $table->integer('estimated_price');
            $table->text('estimated_start_time')->useCurrent();
            $table->text('estimated_end_time')->useCurrent();
            $table->enum('status', ['pending', 'accepted', 'close']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}