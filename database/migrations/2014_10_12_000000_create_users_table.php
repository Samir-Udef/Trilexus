<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
      	    $table->string('avatar')->nullable();
            $table->boolean('uselocalavatar')->default(false);
	        $table->string('provider', 20)->nullable();
	        $table->string('provider_id')->nullable();
            $table->string('access_token')->nullable();		
	        $table->boolean('verified')->default(false);
            $table->string('infotext')->nullable();
            $table->string('gender')->nullable();
            $table->date('birthdate')->nullable();
            $table->rememberToken();
            $table->timestamps();
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
