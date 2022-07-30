<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('diet_chart');
            $table->string('type')->default('keto');
            $table->string('draft');
            $table->mediumText('note');
            $table->string('date')->default(now());

            $table->string('person_name')->default('aaaa');
            $table->string('age')->default('aaaa');
            $table->string('gender')->default('aaaa');
            $table->string('height')->default('aaaa');
            $table->string('weight')->default('aaaa');
            
            $table->string('q_one');
            $table->string('q_two');
            $table->string('q_three');
            $table->string('q_four');
            $table->string('q_five')->default('xxxx');
            $table->string('q_six')->default('yyyy');
            $table->string('join')->default('premade');
            $table->string('created_at')->default(now());

            $table->string('updated_at')->default(now());
            $table->foreignId('user_id')->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('transaction_id')->constrained('transactions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('diets');
    }
}








