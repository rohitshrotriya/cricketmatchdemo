<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFixturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('level_id');
            $table->unsignedBigInteger('tournament_id');
            $table->unsignedBigInteger('team1_id')->nullable();
            $table->unsignedBigInteger('team2_id')->nullable();
            $table->unsignedBigInteger('winner_id')->nullable();
            $table->foreign('level_id')
            ->references('id')->on('levels')
            ->onDelete('CASCADE');
            $table->foreign('tournament_id')
            ->references('id')->on('tournaments')
            ->onDelete('CASCADE');
            $table->foreign('team1_id')
            ->references('id')->on('teams')
            ->onDelete('CASCADE');
            $table->foreign('team2_id')
            ->references('id')->on('teams')
            ->onDelete('CASCADE');
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();
            $table->foreign('winner_id')
            ->references('id')->on('teams')
            ->onDelete('CASCADE');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('fixtures');
    }
}
