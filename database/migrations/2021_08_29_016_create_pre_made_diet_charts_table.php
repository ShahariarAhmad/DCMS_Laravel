<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreMadeDietChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_made_diet_charts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('age');
            $table->string('sex');
            $table->json('diet');
      
            $table->string('type');
            $table->text('note');
            $table->string('created_at')->default(now());

            $table->string('updated_at')->default(now());
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pre_made_diet_charts');
    }
}
