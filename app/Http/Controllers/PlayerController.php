<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Validator;
use Illuminate\Support\Facades\Response;
use App\Facade\Storage;
use App\Player;
use App\Country;
use App\PlayerHistory;
use App\Attribute;
class PlayerController extends Controller
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
   
    	$country=Country::all();
    	$attribute=Attribute::all();
        return view ("player.create",compact('request','country','attribute'));
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
                          'first_name' => 'required|min:3',
                          'jersey' => 'required|unique:players',
                          'country_id' => 'required',
                          'image_uri' => 'required|image|mimes:jpeg,png,jpg,gif'
         ]);
        
        if ($vt->fails()) {
            return redirect()->back()->withErrors($vt)->withInput();
        }
        $dataArr=[];
        $dataArr=$request->except('_token','attribute');

        if(null !== $request->file('image_uri') && !empty($request->file('image_uri'))){
           $files=$request->file('image_uri');
           $destinationPath = public_path('/player/'); // upload path          
           $playerImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath,$playerImage);
           $dataArr['image_uri'] = $playerImage;
        }
        $player=Player::create($dataArr);

        /*PlayerHistory*/
        $attributeArr=[];
        if(isset($request->attribute) && !empty($request->attribute)){
        	foreach($request->attribute as $key=>$value){
        		PlayerHistory::create([
        			'player_id'=>$player->id,
        			'attribute_id'=>$key,
        			'value'=>$value
        		]);
        		 
        	}
        }else{
        	$attribute=Attribute::all();
        	if($attribute->count()){
        		foreach($attribute as $key=>$value){
        		 PlayerHistory::create([
        			'player_id'=>$player->id,
        			'attribute_id'=>$value->id,
        			'value'=>0
        		]);
        		}

        	}
        }
       /* dd($attributeArr);
        PlayerHistory::create([$attributeArr]);*/
        return back()->with('success', 'Player added successfully');
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
