<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerTeamTournament extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;
    public $table="player_team_tournament";
    protected $fillable = [
        'tournament_id', 'player_id', 'team_id'
    ];
    public function playerdetail(){
        return $this->hasOne('App\Player','id','player_id');
    }
}
