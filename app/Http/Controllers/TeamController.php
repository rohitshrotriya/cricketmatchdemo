<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Validator;
use Illuminate\Support\Facades\Response;
use App\Team;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
class TeamController extends Controller
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
    	
       return view ("team.create",compact('request'));
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
                          'name' => 'required|min:3',
                          'logouri' => 'required|image|mimes:jpeg,png,jpg,gif'
         ]);
        $vt->setAttributeNames([
                'logouri' => 'Logo'
        ]);
        if ($vt->fails()) {
            return redirect()->back()->withErrors($vt)->withInput();
        }

        $dataArr=[];
        $dataArr=$request->all();
        if(null !== $request->file('logouri') && !empty($request->file('logouri'))){
           $files=$request->file('logouri');
           $destinationPath = public_path('/team/'); // upload path          
           $teamImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath,$teamImage);
           $dataArr['logouri'] = $teamImage;
        }
       
       
        Team::create($dataArr);
        return back()->with('success', 'Team added successfully');
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

    public function teamList(Request $request){
        $teamlist=Team::paginate(5, ['*'], 'tmlist');
        return view ("team.teamlist",compact('request','teamlist'));
    }
}
