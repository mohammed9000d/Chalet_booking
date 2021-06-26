<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChaletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chalets', function (Blueprint $table) {
            $table->id();
            $table->string('name',45);
            $table->string('address',45);
            $table->string('chalet_space',45);
            $table->longText('description');
            $table->string('image',100);
            $table->string('price',45);
            $table->enum('status',['Active','Inactive','Blocked'])->default('Active');
            $table->longText('seating_places');
            $table->longText('swimming_pools');
            $table->longText('accompanying');
            $table->longText('washrooms');
            $table->longText('kitchen_facilities');
            $table->longText('bedrooms');

            $table->foreignId('owner_id');
            $table->foreign('owner_id')->references('id')->on('owners');

            $table->foreignId('state_id');
            $table->foreign('state_id')->references('id')->on('states');
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
        Schema::dropIfExists('chalets');
    }
}
