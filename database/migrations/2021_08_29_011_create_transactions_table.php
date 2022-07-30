<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('trix_id')->unique();
            $table->string('amount');
            $table->string('sent_to');
            $table->string('sent_from');

            $table->foreignId('user_id')->nullable()->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('trix_date')->default(now()->format('d-m-Y'));
            $table->string('payment_status')->default('pending');
            $table->string('payment_method');
            $table->string('handler_id')->nullable();

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
        Schema::dropIfExists('transactions');
    }
}
