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
        Schema::create('island_user', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('island_id');
            $table->integer('mokokosGotten')->default(0);
            $table->boolean('isFavorite')->default(0);
            $table->boolean('soulGotten')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
