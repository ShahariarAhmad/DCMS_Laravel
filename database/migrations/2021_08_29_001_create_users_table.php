<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('f_name');
            $table->string('l_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('cell_number')->nullable();
            $table->string('sex')->nullable();
            // $table->string('age')->nullable();
            // $table->string('height')->nullable();
            // $table->string('weight')->nullable();
            // $table->string('ocupation')->nullable();
            $table->foreignId('role_id')->default('3')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('account_status')->default('active');
            $table->string('avatar')->nullable();
            $table->string('remember_token')->nullable();
            
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
        Schema::dropIfExists('users');
    }
}
