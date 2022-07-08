<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('request', function (Blueprint $table) {
        //     $table->integer('id', true);
        //     $table->string('title', 400)->default('none');
        //     $table->text('description');
        //     $table->text('pictures');
        //     $table->enum('type', ['interior', 'exterior', 'both', '']);
        //     $table->enum('categories', ['plumbery', 'hvac', 'electricity']);
        //     $table->date('date');
        //     $table->enum('status', ['open', 'pending', 'close']);
        //     $table->bigInteger('users_id')->unsigned()->index('users_id');
        //     $table->bigInteger('company_id')->unsigned()->index('company_id')->nullable();
        // });

        Schema::create('request', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('title', 400)->default('none');
            $table->text('description');
            $table->text('pictures');
            $table->enum('type', ['interior', 'exterior', 'both', '']);
            $table->enum('categories', ['plumbery', 'hvac', 'electricity']);
            $table->date('date');
            $table->enum('status', ['open', 'pending', 'close']);
            $table->bigInteger('users_id')->unsigned()->index('users_id')->nullable();
            $table->bigInteger('company_id')->unsigned()->index('company_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request');
    }
}