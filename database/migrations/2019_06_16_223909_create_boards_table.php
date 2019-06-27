<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->index();
            $table->string('slug')->index();
            $table->text('description')->nullable();
            $table->boolean('public')->default(true)->index();
            $table->string('password')->nullable();
            $table->bigInteger('user_id')->index()->nullable();
            $table->boolean('allow_new_public_threads')->default(true)->index();
            $table->boolean('sticky')->default(false)->index();
            $table->timestamp('sticky_until')->default(null)->nullable();
            $table->json('meta')->nullable();
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
        Schema::dropIfExists('boards');
    }
}
