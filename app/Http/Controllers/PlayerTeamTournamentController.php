<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Validator;
use Illuminate\Support\Facades\Response;
use App\Team;
use App\Tournament;
use App\Player;
use App\PlayerTeamTournament;
class PlayerTeamTournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$tournament=Tournament::all();
    	$player=Player::all();

    	$team=Team::all();
        return view ("player_team_tournament.create",compact('request','player','team','tournament'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
         $vt =Validator::make($request->all(), [
                          'tournament_id' => 'required',
                          'player_id' => 'required',
                          "team_id"=>"required"
         ]);
        $vt->setAttributeNames([
                'tournament_id' => 'Tournament',
                'player_id' => 'Player',
                'team_id' => 'Team'
        ]);
        if ($vt->fails()) {
            return redirect()->back()->withErrors($vt)->withInput();
        }
        
        $playerArr=$request->player_id;
        if(isset($playerArr) && !empty($playerArr)){
        	foreach($playerArr as $key=>$playerid){
        		$getTounamentPlayer=PlayerTeamTournament::where('player_id',$playerid)->where('tournament_id',$request->tournament_id)->count();
        		if($getTounamentPlayer==0)
        		PlayerTeamTournament::create([
        			'team_id'=>$request->team_id,
        			'player_id'=>$playerid,
        			'tournament_id'=>$request->tournament_id,
        		]);
        	}
        }
        return back()->with('success', 'Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
