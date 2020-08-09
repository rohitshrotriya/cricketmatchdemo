<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Fixture;
class Point extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //public $timestamps = false;
    protected $fillable = [
       'team_id','tournament_id','value'
    ];
    public function team(){
    	return $this->belongsTo('App\Team','team_id');
    }
    public function totalMatchWinner($tournament_id,$team_id){
    	return Fixture::where('tournament_id',$tournament_id)
    	->where('winner_id',$team_id)
    	->count();
    }
    public function totalMatchLoss($tournament_id,$team_id){
    	return $this->totalMatch($tournament_id,$team_id)-$this->totalMatchWinner($tournament_id,$team_id);
    }
    public function totalMatch($tournament_id,$team_id){
    	return Fixture::where('tournament_id',$tournament_id)->whereNotNull('winner_id')
    	->where(function ($q) use($team_id){
		    $q->where('team1_id', $team_id)->orWhere('team2_id', $team_id);
		})->count();
    }
}
