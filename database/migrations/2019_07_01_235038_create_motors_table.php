<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->index();
            $table->string('diameter')->nullable(); // mm
            $table->string('height')->nullable(); // mm
            $table->string('total_impulse')->nullable(); // N*s
            $table->string('propellant_mass')->nullable(); // grams
            $table->string('dry_mass')->nullable(); // grams
            $table->string('total_mass')->nullable(); // grams
            $table->string('average_thrust')->nullable(); // N
            $table->string('max_thrust')->nullable(); // N
            $table->string('burn_time')->nullable(); // s
            $table->string('delay_time')->nullable(); // s
            $table->unsignedBigInteger('class_id')->index()->nullable();
            $table->unsignedBigInteger('type_id')->index()->nullable();
            $table->unsignedBigInteger('vendor_id')->index()->nullable();
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();

            $table->foreign('class_id')->references('id')->on('motor_classifications')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('type_id')->references('id')->on('motor_types')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('vendor_id')->references('id')->on('vendors')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motors');
    }
}
