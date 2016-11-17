<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('messages', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('chat_id')->unsigned();
          $table->integer('user_id')->unsigned();
          $table->string('message');
          $table->timestamps();

          $table->foreign('chat_id')->references('id')->on('chat');
          $table->foreign('user_id')->references('id')->on('users');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('messages');
    }
}
