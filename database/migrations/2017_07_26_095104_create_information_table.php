<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';

            $table->increments('id');
            $table->string('name',25);
            $table->string('headline')->unique();
            $table->string('title',100);
            $table->integer('view')->default(0);
            $table->integer('weight')->default(0);
            $table->string('mantle',255)->nullable();
            $table->string('src_img',455)->nullable();
            $table->string('information_content',455);
            $table->integer('status')->default('0');

            $table->integer('sort_id')->unsigned()->nullable();
            $table->foreign('sort_id')->references('id')->on('sort_information');
            $table->string('intag_id',50)->nullable();

            $table->integer('collection')->default(0);

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('information');
    }
}
