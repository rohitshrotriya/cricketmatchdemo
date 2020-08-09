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
                <div class="card-header">{{ __('Team List') }}</div>
                  <div class="card-body">
                    @if($teamlist->count())
                    @foreach($teamlist as $key=>$team)
                   <div class="accordion" id="accordionExample">
                      <div class="card">
                        <div class="card-header" id="heading{{$team->id}}">
                          <h5 class="mb-0">
                            
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne{{$team->id}}" aria-expanded="true" aria-controls="collapseOne{{$team->id}}">
                               @if(isset($team->logouri) && !empty($team->logouri) && file_exists(public_path('team/'.$team->logouri)))
                                   <img src="{{asset('team/'.$team->logouri)}}" class="rounded-circle mr-1" height="30px" width="30px">
                                  @else
                                   <img src="{{asset('team/team.png')}}" class="rounded-circle mr-1" height="30px" width="30px">
                                @endif 
                              {{ucfirst($team->name)}}
                            </button>
                          </h5>
                        </div>

                        <div id="collapseOne{{$team->id}}" class="collapse show" aria-labelledby="heading{{$team->id}}" data-parent="#accordionExample">
                          <div class="card-body">
                            <h4> <small>Players list</small></h1>
                            @if($team->teamPlayerList->count())
                             <table class="table table-striped">
                                <tr>
                                  <th scope="row"></th>
                                  <td></td>
                                  <td>Last Name</td>
                                  <td>First Name</td>
                                </tr>
                              <tbody>
                                @foreach($team->teamPlayerList as $key=>$player)
                                <tr>
                                  <th scope="row">{{$key+1}}</th>
                                  <td> 
                                    @if(isset($player->playerdetail->image_uri) && !empty($player->playerdetail->image_uri) && file_exists(public_path('player/'.$player->playerdetail->image_uri)))
                                    <img src="{{asset('player/'.$player->playerdetail->image_uri)}}" class="rounded-circle mr-1" height="30px" width="30px">
                                  @else
                                   <img src="{{asset('player/player.png')}}" class="rounded-circle mr-1" height="30px" width="30px">
                                @endif</td>
                                  <td>@if(isset($player->playerdetail->last_name) && !empty($player->playerdetail->last_name))
                                    {{ucfirst($player->playerdetail->last_name)}}
                                  @endif</td>
                                  <td>{{ucfirst($player->playerdetail->first_name)}}</td>
                                </tr>
                                @endforeach
                              </tbody>

                            </table>
                            @else
                            <p align="center">No player list found.</p>
                            @endif
                          </div>
                        </div>
                      </div>
  
                    </div>
                        @endforeach
                    @if($teamlist->count())
                    {{ $teamlist->links() }}
                    @endif
                     
                    @else
                      <p align="center">No team list found.</p>
                    @endif
  							  </div>
            </div>  
        </div>
    </div>
</div>
    </div>
</div>
@endsection
