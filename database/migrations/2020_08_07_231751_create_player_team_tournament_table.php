<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerTeamTournamentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_team_tournament', function (Blueprint $table) {
            $table->unsignedBigInteger('tournament_id');
            $table->foreign('tournament_id')
            ->references('id')->on('tournaments')
            ->onDelete('CASCADE');
            $table->unsignedBigInteger('team_id');
            $table->foreign('team_id')
            ->references('id')->on('teams')
            ->onDelete('CASCADE');
            $table->unsignedBigInteger('player_id');
            $table->foreign('player_id')
            ->references('id')->on('players')
            ->onDelete('CASCADE');
            $table->unique(['tournament_id', 'team_id','player_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_team_tournament');
    }
}
