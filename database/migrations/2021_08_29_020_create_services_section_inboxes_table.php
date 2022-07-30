<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesSectionInboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_section_inboxes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('occupation');
            $table->string('age');
            $table->string('gender');
            $table->mediumText('message');
            $table->string('email');
            $table->string('status'); 
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
        Schema::dropIfExists('services_section_inboxes');   
    }
}
