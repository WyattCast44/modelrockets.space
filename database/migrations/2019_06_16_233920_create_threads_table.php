<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->index();
            $table->text('body');
            $table->bigInteger('user_id')->index()->unsigned();
            $table->bigInteger('board_id')->index()->unsigned();
            $table->boolean('open')->default(true)->index();
            $table->bigInteger('best_answer_thread_id')->index()->unsigned()->nullable();
            $table->bigInteger('favorites')->index()->unsigned()->nullable()->default(0);
            $table->bigInteger('views')->default(0)->index()->unsigned();
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
        Schema::dropIfExists('threads');
    }
}
