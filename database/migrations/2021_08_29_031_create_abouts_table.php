<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('profile_img')->nullable();
            $table->string('name')->nullable();
            $table->string('degree')->nullable();
            $table->mediumText('brife_description')->nullable();
            $table->string('service_img')->nullable();
            $table->string('service_title')->nullable();
            // $table->string('titile');
            $table->mediumText('service_description')->nullable();
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
        Schema::dropIfExists('abouts');
    }
}
