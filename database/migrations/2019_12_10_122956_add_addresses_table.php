<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->index();
            $table->string('street_address');
            $table->string('secondary_address')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('zipcode');
            $table->timestamps();
        });


        Schema::create('address_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('address_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->timestamps();

            $table->unique(['address_id', 'user_id']);

            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('address_user');
    }
}
