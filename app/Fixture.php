<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //public $timestamps = false;
    protected $fillable = [
       'team1_id', 'team2_id', 'tournament_id','level_id','winner_id','start','end','description'
    ];

    public function team1(){
    	return $this->belongsTo('App\Team','team1_id');
    }
    public function team2(){
    	return $this->belongsTo('App\Team','team2_id');
    } 
    public function winner(){
    	return $this->belongsTo('App\Team','winner_id');
    }
    public function level(){
    	return $this->belongsTo('App\Level','level_id');
    }
    public function tournament(){
        return $this->belongsTo('App\Tournament','tournament_id');
    }
}
