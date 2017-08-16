<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';

            $table->increments('id');
            $table->string('name',25);
            $table->string('headline');
            $table->string('title',100);
            $table->integer('view')->default(0);
            $table->integer('weight')->default(0);
            $table->string('content',455);
            $table->integer('status')->default('1');
            $table->string('img_src',255)->nullable();

            $table->integer('sort_id')->unsigned()->nullable();
            $table->foreign('sort_id')->references('id')->on('sort_reports');
            $table->string('tag_id',50)->nullable();

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
        Schema::dropIfExists('reports');
    }
}
