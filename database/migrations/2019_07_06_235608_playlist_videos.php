<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaylistVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlist_videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('playlist_id')->index();
            $table->unsignedBigInteger('video_id')->index();
            $table->unsignedBigInteger('order')->default(0);
            $table->timestamps();

            $table->foreign('playlist_id')->references('id')->on('playlists')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('video_id')->references('id')->on('video')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
