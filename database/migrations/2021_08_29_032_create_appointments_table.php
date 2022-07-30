<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('desired_serial_date');
            $table->string('last_visit_date')->nullable();
            $table->string('cause')->default('visit');
            $table->string('present')->nullable();
            $table->integer('given_serial_no')->nullable();
            $table->string('appointed_date')->nullable();
            $table->foreignId('transaction_id')
            ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('chamber_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('handler_id')->nullable()->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('appointments');
    }
}
