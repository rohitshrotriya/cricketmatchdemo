<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'logouri', 'clube_state',
    ];
    public function teamPlayerList(){
    	return $this->hasMany('App\PlayerTeamTournament','team_id','id');
    }
    
}
