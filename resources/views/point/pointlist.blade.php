@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
        @endif
     @if ($errors->any())
        <ul class="errors">
            @foreach ($errors->all() as $err)
                <li class="errors__item">{{ $err }}</li>
            @endforeach
        </ul>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Point List') }}</div>
                  <div class="card-body">
                    <div class="form-group row">
                      
                            <label for="tournament" class="col-md-4 col-form-label text-md-right">{{ __('Tournament') }}</label>

                            <div class="col-md-6">
                               <select name="tournament_id" id="pointlist_tournament_id" onchange="callList('pointlist_tournament_id')">
                                 <option value="0">Select Tournament</option>
                                @if($tournament->count())
                                    @foreach($tournament as $key=>$value)
                                    @if(isset($request->tournament_id) && !empty($request->tournament_id) && $value->id==$request->tournament_id)

                                    <option value="{{$value->id}}" selected>{{ucfirst($value->name)}}</option>
                                    @else
                                        <option value="{{$value->id}}">{{ucfirst($value->name)}}</option>
                                    @endif
                                    @endforeach
                                @endif
                                   
                               </select>

                            </div>
                        </div>
                    @if($pointlist->count())
                   <div class="card-body">

                            <h1>Winner Of the tournament:
                              @if(isset($winnerTeam) && !empty($winnerTeam))
                              {{$winnerTeam}} 
                              @else
                                yet to be decided.
                              @endif</h1>
                              <small class="text-muted">Points are updated only for round-1 matches but no. of matches/win/loss are updated for all rounds,semi final and final matches.</small>
                             <table class="table table-striped">
                                <tr>
                                  <th scope="row"></th>
                                  <td>Team</td>
                                  <td>Match</td>
                                  <td>Won</td>
                                  <td>Loss</td>
                                  <td>Point</td>
                                </tr>
                              <tbody>
                        @foreach($pointlist as $key=>$point)
                   
                                <tr>
                                  <th scope="row"></th>
                                  <td>@if(isset($point->team->logouri) && !empty($point->team->logouri) && file_exists(public_path('team/'.$point->team->logouri)))
                                    <img src="{{asset('team/'.$point->team->logouri)}}" class="rounded-circle mr-1" height="30px" width="30px">
                                  @else
                                   <img src="{{asset('team/team.png')}}" class="rounded-circle mr-1" height="30px" width="30px">
                                @endif 
                             {{ucfirst($point->team->name)}}</td>
                                  <td>{{$point->totalMatch($point->tournament_id,$point->team_id)}}</td>
                                  <td>{{$point->totalMatchWinner($point->tournament_id,$point->team_id)}}</td>
                                  <td>{{$point->totalMatchLoss($point->tournament_id,$point->team_id)}}</td>
                                  
                                  <td>{{round($point->value,0,PHP_ROUND_HALF_UP)}}</td>
                                </tr>
                               
                              
                        
                        @endforeach
                        </tbody>

                            </table>
                           
                          </div>
                    @if($pointlist->count())
                    {{ $pointlist->appends(['tournament_id' =>$request->get('tournament_id')])->links() }}
                    @endif
                     
                    @else
                      <p align="center">No point list found.</p>
                    @endif
  							  </div>
            </div>  
        </div>
    </div>
</div>
    </div>
</div>
@endsection
