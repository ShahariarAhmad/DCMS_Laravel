<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SickUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sick_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sick_id')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('user_id')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');;
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
        Schema::dropIfExists('sick_user');
    }
}
