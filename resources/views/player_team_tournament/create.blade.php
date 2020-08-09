@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
        @endif
     @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $err)
                <li class="errors__item">{{ $err }}</li>
            @endforeach
        </ul>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Player Team Tournament') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.add.playerteamtournament') }}">
                        @csrf

                      
                        <div class="form-group row">
                            <label for="tournament" class="col-md-4 col-form-label text-md-right">{{ __('Tournament') }}</label>

                            <div class="col-md-6">
                               <select name="tournament_id" required>
                                 <option value="">Select Tournament</option>
                                @if($tournament->count())
                                    @foreach($tournament as $key=>$value)
                                        <option value="{{$value->id}}">{{ucfirst($value->name)}}</option>
                                    @endforeach
                                @endif
                                   
                               </select>

                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="team" class="col-md-4 col-form-label text-md-right">{{ __('Team') }}</label>

                            <div class="col-md-6">
                               <select name="team_id" required>
                                 <option value="">Select Team</option>
                                @if($team->count())
                                    @foreach($team as $key=>$value)
                                        <option value="{{$value->id}}">{{ucfirst($value->name)}}</option>
                                    @endforeach
                                @endif
                                   
                               </select>

                                
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="player" class="col-md-4 col-form-label text-md-right">{{ __('Player') }}</label>
 
                            <div class="col-md-6">
                               <select name="player_id[]"  multiple>
                                
                                @if($player->count())
                                    @foreach($player as $key=>$value)
                                        <option value="{{$value->id}}">{{ucfirst($value->first_name)}} {{ucfirst($value->last_name)}}</option>
                                    @endforeach
                                @else
                                 <option value="">Select Player</option>
                                @endif
                                   
                               </select>

                                
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
