<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->constrained('transactions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
                $table->string('person_name')->default('aaaa');
                $table->string('age')->default('aaaa');
                $table->string('gender')->default('aaaa');
                $table->string('height')->default('aaaa');
                $table->string('weight')->default('aaaa');
                 
            $table->string('q_one');
            $table->string('q_two');
            $table->string('q_three');
            $table->string('q_four');
            $table->string('q_five')->default('aaaa');
            $table->string('q_six')->default('aaaa');
            $table->string('send')->default('n');
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
        Schema::dropIfExists('diet_requests');
    }
}
