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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Fixtures') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.save.fixtures') }}">
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
                      {{--<div class="form-group row">
                            <label for="level_id" class="col-md-4 col-form-label text-md-right">{{ __('Level') }}</label>

                            <div class="col-md-6">
                               <select name="level_id" required>
                                 <option value="">Select level</option>
                                @if($level->count())
                                    @foreach($level as $key=>$value)
                                        <option value="{{$value->id}}">{{ucfirst($value->name)}}</option>
                                    @endforeach
                                @endif
                                   
                               </select>

                                
                            </div>
                        </div>--}}
                        
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
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
