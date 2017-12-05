<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContactEmails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('contact_emails', function (Blueprint $table) {
             $table->increments('id');
             $table->string('name');
             $table->string('email');
             $table->string('phone_number')->nullable();
             $table->longText('content');
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
         Schema::dropIfExists('contact_emails');
     }
}
