@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
        @elseif(session('error')) 
         <div class="alert alert-danger">
          {{ session('error') }}
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Result Fixtures') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.result.save.fixtures') }}">
                        @csrf

                      
                        <div class="form-group row">
                            <label for="tournament" class="col-md-4 col-form-label text-md-right">{{ __('Tournament') }}</label>

                            <div class="col-md-6">
                            <select name="tournament_id"  id="tournament_result-fixtures" onchange="callList('tournament_result-fixtures')" required>
                                 <option value="">Select Tournament</option>
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
                      <div class="form-group row">
                           

                            <div class="col-md-12">
                               @if($fixture->count())
                               <table class="table table-striped">
                                <tr>
                                  <th scope="row"></th>
                                  <td>Level</td>
                                  <td>Team1</td>
                                  <td>Team2</td>
                                  <td>Winner</td>
                                  <td>Start Date</td>
                                  <td>End Date</td>
                                  <td>Description</td>
                                </tr>
                              <tbody>
                               @foreach($fixture as $key=>$value)
                                <tr>
                                  <th scope="row">{{$key+1}}</th>
                                  <td>@if(isset($value->level->name) && !empty($value->level->name)){{$value->level->name}} @else
                                  --
                              @endif</td>
                                  
                                  <td>@if(isset($value->team1->name) && !empty($value->team1->name)){{ucfirst($value->team1->name)}} @else
                                  --
                              @endif</td>
                                  <td>@if(isset($value->team2->name) && !empty($value->team2->name)){{ucfirst($value->team2->name)}} @else
                                  --
                              @endif</td>
                              <td>@if(isset($value->winner->name) && !empty($value->winner->name)){{ucfirst($value->winner->name)}} @else
                                  <select name="winner_id[{{$value->id}}]">
                                    <option value="">Select Winner</option>
                                    @if(isset($value->team1->name) && !empty($value->team1->name))
                                      <option value="{{$value->team1_id}}">
                                      {{ucfirst($value->team1->name)}}</option>
                                      @endif
                                      @if(isset($value->team2->name) && !empty($value->team2->name))
                                    <option value="{{$value->team2_id}}">{{ucfirst($value->team2->name)}}</option>
                                    @endif
                                  </select>
                              @endif</td>
                              <td>@if(isset($value->start) && !empty($value->start)){{\Carbon\Carbon::parse($value->start)->format('d/m/Y')}} @else
                                  --
                              @endif</td>
                              <td>@if(isset($value->end) && !empty($value->end)){{\Carbon\Carbon::parse($value->end)->format('d/m/Y')}}@else
                                  --
                              @endif</td>
                              <td>@if(isset($value->description) && !empty($value->description)){{$value->description}} @else
                                  <input type="text" name="description[{{$value->id}}]" value="">
                              @endif</td>
                                </tr>
                               @endforeach
                                </tbody>

                            </table>
                             <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>

                            </div>
                        </div>
                            @else
                             <div class="form-group row mb-0"><div class="col-md-8 offset-md-4" align="center">No fixture list found.</div></div>
                            @endif

                                
                            </div>
                        </div>
                        
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
