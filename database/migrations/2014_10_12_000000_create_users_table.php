<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('profile_picture')->nullable();
            $table->bigInteger('phone_number');
            $table->integer('address_number');
            $table->string('address_road');
            $table->string('town');
            $table->integer('zipcode');
            $table->enum('country', ['Luxembourg', 'Belgique', 'Allemagne', 'France']);


            $table->string('company_name')->nullable();
            $table->integer('tva_number')->nullable();
            $table->string('role')->nullable();
            $table->enum('category', ['plumbery', 'hvac', 'electricity'])->nullable();

            $table->enum('type', ['client', 'company']);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /*
    $table->integer('id', true);
    $table->string('first_name');
    $table->string('last_name');
    $table->string('profile_picture');
    $table->string('company_name');
    $table->integer('tva_number');
    $table->string('role');
    $table->string('password');
    $table->enum('categories', ['plumbery', 'hvac', 'electricity']);
    $table->integer('phone_number');
    $table->integer('address_number');
    $table->string('address_road');
    $table->integer('zipcode');
    $table->enum('country', ['Luxembourg', 'Belgique', 'Allemagne', 'France']

*/


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
