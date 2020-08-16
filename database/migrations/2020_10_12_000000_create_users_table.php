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
            $table->enum('gender', ['male', 'female']);
            $table->string('mobile_no', 12)->unique();
            $table->string('email')->unique();
            $table->text('address')->nullable();
            $table->integer('state_id')->unsigned()->nullable(false);
            $table->string('password');
            $table->boolean('isActive');
            $table->rememberToken();
            $table->timestamps();

            /* foreign key */
            $table->foreign('state_id')->references('id')->on('states');
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
