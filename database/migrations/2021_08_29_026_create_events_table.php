<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('house_no')->nullable();
            $table->string('road_number')->nullable();
            $table->string('area')->nullable();
            $table->string('district')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable()->default(now());
            $table->string('img_url')->nullable()->default('a');
            $table->integer('c_m_position')->nullable()->default(1);
            $table->text('description')->nullable();
            $table->foreignId('gallery_id')->nullable()->default(1);
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
        Schema::dropIfExists('events');
    }
}
