<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachedPreMadeDietChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attached_pre_made_diet_charts', function (Blueprint $table) {
            $table->id();

            $table->string('date_of_submission');
            $table->string('cause')->default('diet');
            $table->string('person_name')->default('aaaa');
            $table->string('age')->default('aaaa');
            $table->string('gender')->default('aaaa');
            $table->string('height')->default('aaaa');
            $table->string('weight')->default('aaaa');
            $table->string('q_one');
            $table->string('q_two');
            $table->string('q_three');
            $table->string('q_four');
            $table->string('q_five')->default('s');
            $table->string('q_six')->default('s');
            $table->string('date')->default('s');
            $table->string('join')->default('premade');

            // forign key 
            $table->foreignId('pre_made_diet_chart_id')->constrained('pre_made_diet_charts')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('user_id')->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('transaction_id')->unique()->constrained('transactions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('attached_pre_made_diet_charts');
    }
}
