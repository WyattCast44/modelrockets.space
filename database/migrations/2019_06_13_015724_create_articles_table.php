<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->index();

            $table->string('slug')->index()->unique();
            $table->string('title')->index();
            $table->string('subtitle')->index()->nullable();
            $table->text('body');

            $table->text('featured_image')->nullable();
            $table->text('featured_image_caption')->nullable();

            $table->boolean('published')->default(false);
            $table->timestamp('published_at')->nullable();

            $table->bigInteger('thread_id')->nullable()->index();

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
        Schema::dropIfExists('articles');
    }
}
