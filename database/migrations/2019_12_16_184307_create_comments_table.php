<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content');
            $table->timestamps();

            $table->bigInteger('user_id')->unsigned();
            //makes owner id a foreign key in pages table.
            $table->foreign('user_id')->references('id')->on('users')
              ->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('page_id')->unsigned();
            //makes owner id a foreign key in pages table.
            $table->foreign('page_id')->references('id')->on('pages')
              ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
