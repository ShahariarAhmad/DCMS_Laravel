<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChambersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chambers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('house_no')->nullable();
            $table->string('road_number')->nullable();
            $table->string('area')->nullable();
            $table->string('district')->nullable();
            $table->string('day')->nullable();
            $table->string('time')->nullable();
            $table->integer('c_m_position');
            $table->string('img_url')->nullable();
            $table->integer('patient_limit')->nullable();
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
        Schema::dropIfExists('chambers');
    }
}
