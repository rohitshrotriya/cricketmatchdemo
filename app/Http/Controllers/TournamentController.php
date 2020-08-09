<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Validator;
use Illuminate\Support\Facades\Response;
use App\Facade\Storage;
use App\Team;
use App\Tournament;
use App\PlayerTeamTournament;
class TournamentController extends Controller
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
        return view ("tournament.create",compact('request'));
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
                          'name' => 'required|min:3|max:100',
                          'points_per_match' => 'required|numeric|min:2'
         ]);
        $vt->setAttributeNames([
                'points_per_match' => 'Points Per Match'
        ]);
        if ($vt->fails()) {
            return redirect()->back()->withErrors($vt)->withInput();
        }
        Tournament::create($request->except('_token'));
        return back()->with('success', 'Tournament added successfully');
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
    public function tournamentList(Request $request){
        
    }
}
