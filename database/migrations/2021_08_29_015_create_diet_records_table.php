<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_records', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('transaction_id')->unique()->constrained('transactions')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            // $table->timestamp('date')->useCurrent();
            $table->string('date_of_submission')->useCurrent();

            $table->foreignId('diet_id')->constrained('diets')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('cause')->default('diet');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diet_records');
    }
}
// $table->timestamp('date_of_submission')->useCurrent();
