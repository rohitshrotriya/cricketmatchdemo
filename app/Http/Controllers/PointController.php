<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Tournament;
use App\Point;
use App\Fixture;
class PointController extends Controller
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
    public function create(Request $request)
    {
    	
     //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function pointList(Request $request){
    	$tournament=Tournament::leftJoin('fixtures', 'tournaments.id', '=', 'fixtures.tournament_id')
    	->select('tournaments.*')
    	->whereNotNull('fixtures.id')
    	->distinct()->get();
    	$pointlist=collect();
        $winnerTeam="";
    	if(isset($request->tournament_id) && !empty($request->tournament_id)){
    		$pointlist= Point::where('tournament_id',$request->tournament_id)->orderBy('value','desc')->paginate(5, ['*'], 'points');
            $getWinner= Fixture::where('tournament_id',$request->tournament_id)->where('level_id',3)->whereNotNull('winner_id')->first();
            if(isset($getWinner) && !empty($getWinner)){
                $winnerTeam=$getWinner->winner->name;
            }
    	}
        
        return view ("point.pointlist",compact('request','pointlist','tournament','winnerTeam'));
    }
}
