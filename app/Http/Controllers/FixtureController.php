<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Validator;
use Illuminate\Support\Facades\Response;
use App\Team;
use App\Tournament;
use App\PlayerTeamTournament;
use App\Level;
use App\Fixture;
use Carbon\Carbon;
use App\Point;
class FixtureController extends Controller
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
    	$tournament=Tournament::leftJoin('fixtures', 'tournaments.id', '=', 'fixtures.tournament_id')
    	->select('tournaments.*')
    	->whereNull('fixtures.id')
    	->distinct()->get();
    	return view ("fixture.create",compact('request','tournament'));
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
                          'tournament_id' => 'required'
                          
         ]);
        $vt->setAttributeNames([
                'tournament_id' => 'Tournament'
                
        ]);
        if ($vt->fails()) {
            return redirect()->back()->withErrors($vt)->withInput();
        }
        
       $tournament_id=$request->tournament_id;
       $getTeamIds=$this->getTournamentTeam($tournament_id);
       if(count($getTeamIds)<4){
        return back()->with('error', 'Sorry min 4 teams are required.');
       }
      
       $lastKey=0;
       if(count($getTeamIds)>1){
       		$fixtureArr=$this->createFixture($getTeamIds);
       		\DB::beginTransaction();
       		foreach($fixtureArr as $key=>$value){
       			Fixture::create([
       				'team1_id'=>$value[0],
       				'team2_id'=>$value[1],
       				'level_id'=>1,
       				'tournament_id'=>$tournament_id,
              'start'=>Carbon::now()->addDay($key),
              'end'=>Carbon::now()->addDay($key),
       				
       			]);
            $lastKey=$key;
       		}
          $lastKey=$lastKey+2;
       		//for semi final
       		Fixture::create([
       				'team1_id'=>null,
       				'team2_id'=>null,
       				'level_id'=>2,
       				'tournament_id'=>$tournament_id,
              'start'=>Carbon::now()->addDay($lastKey),
              'end'=>Carbon::now()->addDay($lastKey),
       			]);
          $lastKey=$lastKey+1;
       		Fixture::create([
       				'team1_id'=>null,
       				'team2_id'=>null,
       				'level_id'=>2,
       				'tournament_id'=>$tournament_id,
              'start'=>Carbon::now()->addDay($lastKey),
              'end'=>Carbon::now()->addDay($lastKey),
       			]);
       		//final
          $lastKey=$lastKey+2;
       		Fixture::create([
       				'team1_id'=>null,
       				'team2_id'=>null,
       				'level_id'=>3,
       				'tournament_id'=>$tournament_id,
              'start'=>Carbon::now()->addDay($lastKey),
              'end'=>Carbon::now()->addDay( $lastKey),
       			]);
       		\DB::commit();
       	 	return back()->with('success', 'Fixture created successfully.');
       	}else{
       		return back()->with('error', 'Sorry  min 2 teams are required.');
       	}
       
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
    public function fixturesResult(Request $request){

    	$tournament=Tournament::leftJoin('fixtures', 'tournaments.id', '=', 'fixtures.tournament_id')
    	->select('tournaments.*')
    	->whereNotNull('fixtures.id')
    	->distinct()->get();
    	$fixture=collect();
    	
    	if(isset($request->tournament_id) && !empty($request->tournament_id)){
        $tournament_id=$request->tournament_id;
    		$fixture=Fixture::where('tournament_id',$tournament_id)->get();
        $this->updatematchSemiAndFinal($tournament_id);
    	}
    	
    	return view ("fixture.result",compact('request','fixture','tournament'));
    }

    public function fixturesResultSave(Request $request){
     
       $vt =Validator::make($request->all(), [
                          'tournament_id' => 'required'
         ]);
        $vt->setAttributeNames([
                'tournament_id' => 'Tournament'
        ]);
        if ($vt->fails()) {
            return redirect()->back()->withErrors($vt)->withInput();
        }
        $tournament_id=$request->tournament_id;
        $winnerIdArr=[];
        $getAllwinnerIdArr=[];
        if(isset($request->winner_id) && !empty($request->winner_id)){
          $getAllwinnerIdArr=$request->winner_id;
        }
       
        foreach($getAllwinnerIdArr as $key=>$value){
          if(isset($value) && !empty($value)){
            $winnerIdArr[$key]=$value;
          }
          $getFixture=Fixture::where('id',$key)->first();
          $getFixture->winner_id=$value;
          $getFixture->description=isset($request->description[$key])?$request->description[$key]:null;
          $getFixture->save();
        }
       
        
         if(count($winnerIdArr)){
           $this->updatePointsTable(array_keys($winnerIdArr),$tournament_id);
         }
       
         return back()->with('success', 'Fixture edited successfully.');
    }
    
    public function getTournamentTeam($tournament_id=''){
    	$getTeamIds=[];

    	if(!empty($tournament_id)){
    		$getTeamIds=PlayerTeamTournament::where('tournament_id',$tournament_id)->groupBy('team_id')->pluck('team_id')->toArray();
    	}
    	return $getTeamIds;

    }
    //create for matches;
    public function createFixture($getTeamIds){
    	$countTeamIds=count($getTeamIds);
    	$fixtureArr=[];
    	$visitedArr=[];
    	for($i=0;$i<$countTeamIds; $i++){
			for($j=0;$j<$countTeamIds;$j++){
				if($i!=$j && empty($visitedArr[$i][$j])){
					$fixtureArr[] = [$getTeamIds[$i],$getTeamIds[$j]];
					$visitedArr[$i][$j]=1;
					$visitedArr[$j][$i]=1;
				}
			}
    	}
		shuffle($fixtureArr);
    	return $fixtureArr;
    }
    public function updatePointsTable($winnerIdArr,$tournament_id){
      $winnerArr=[];
      $lossArr=[];

      $getWinnerfixture=Fixture::where('tournament_id',$tournament_id)->whereIn('id',$winnerIdArr)->get();
      
      if($getWinnerfixture->count()){
            foreach($getWinnerfixture as $key=>$val){
              $winnerArr[$val->id]['team_id']=$val->winner_id;
              $winnerArr[$val->id]['level_id']=$val->level_id;
              if($val->team1_id!=$val->winner_id){
                $lossArr[$val->id]['team_id']=$val->team1_id;
                $lossArr[$val->id]['level_id']=$val->level_id;
              }else{
                $lossArr[$val->id]['team_id']=$val->team2_id;
                $lossArr[$val->id]['level_id']=$val->level_id;
              }
            }
        }
       
        if(count($winnerArr)){
          $this->winlossupdateTable($winnerArr,$tournament_id,true);
        }
         
         if(count($lossArr)){
          $this->winlossupdateTable($lossArr,$tournament_id);
        }
       
    }

    public function winlossupdateTable($fixture,$tournament_id,$is_winloss=false){
      $getTournament=Tournament::where('id',$tournament_id)->first();
     
      foreach($fixture as $key=>$team){
            $teamid= $team['team_id'];
            $level= $team['level_id'];
           $getPoint=Point::where('tournament_id',$tournament_id)->where('team_id',$teamid)->first();

           if(isset($getPoint) && !empty($getPoint)){
              if($is_winloss && $level==1){//1 for   round-1
                $getPoint->value=($getPoint->value+$getTournament->points_per_match);
                 $getPoint->save();
              }else{
                $getPoint->value=$getPoint->value;
                $getPoint->save();
              }
              
           }else{
            Point::create([
              'tournament_id'=>$tournament_id,
              'team_id'=>$teamid,
              'value'=>$is_winloss?$getTournament->points_per_match:0,

            ]);
           }
        }
      $this->updatematchSemiAndFinal($tournament_id);
    }
    public function updateSemiFinalTable($tournament_id,$topteamNo,$level_id){
        $getTopTeam=[];
         if($level_id==3){//for final

           $getcountRoundids=Fixture::where('tournament_id',$tournament_id)->whereNull('winner_id')->where('level_id',$level_id)->get();
            $getTopTeam=Fixture::where('tournament_id',$tournament_id)->whereNotNull('winner_id')->where('level_id',$level_id-1)->pluck('winner_id')->toArray();
           
         }else{ //semi final
           $getTopTeam= Point::where('tournament_id',$tournament_id)->orderBy('value','desc')->pluck('team_id')->toArray();
          $getTopTeam=array_slice($getTopTeam, 0,$topteamNo);
           $getcountRoundids=Fixture::where('tournament_id',$tournament_id)->whereNull('winner_id')->where('level_id',$level_id)->get();
         }
         if($getcountRoundids->count()){
          $counter=1;
            foreach($getcountRoundids as $key=>$value){
              $value->team1_id=$getTopTeam[$key];
              $value->team2_id=$getTopTeam[count($getTopTeam)-$counter];
              $value->save();
              $counter++;
            }
         }
    }
     public function updatematchSemiAndFinal($tournament_id){
      $getcountRound=Fixture::where('tournament_id',$tournament_id)->whereNull('winner_id')->where('level_id',1)->count();
        if($getcountRound==0){
          $this->updateSemiFinalTable($tournament_id,4,2);
          $getcountNextRound=Fixture::where('tournament_id',$tournament_id)->whereNull('winner_id')->where('level_id',2)->count();

          if($getcountNextRound==0){//final
            $this->updateSemiFinalTable($tournament_id,2,3);

          }
        }
    }
}
