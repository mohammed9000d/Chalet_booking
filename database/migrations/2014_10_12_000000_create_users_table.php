<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('first_name',45);
            $table->string('last_name',45);
            $table->string('email',45)->unique();
            $table->string('mobile',15)->unique();
            $table->string('password',45);
            $table->enum('gender',['Male','Female']);
            $table->string('birth_date',45);
            $table->enum('status',['Active','Inactive','Blocked'])->default('Active');
            $table->remembertoken();
            $table->timestamps();

            $table->foreignId('state_id');
            $table->foreign('state_id')->references('id')->on('states');

            $table->string('image',100);
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
