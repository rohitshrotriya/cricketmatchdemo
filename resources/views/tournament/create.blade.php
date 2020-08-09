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
                <div class="card-header">{{ __('Add Tournament') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.save.tournament') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input  type="text" name="name" value="{{ old('name') }}"   required autofocus>

                               
                            </div>
                        </div>

                        {{--<div class="form-group row">
                            <label for="logouri" class="col-md-4 col-form-label text-md-right">{{ __('Start Date') }}</label>

                            <div class="col-md-6">
                               <input  type="text" name="start" value="{{ old('start') }}"   autofocus >
                               </div>
                                
                         </div>
                          <div class="form-group row">
                            <label for="logouri" class="col-md-4 col-form-label text-md-right">{{ __('End Date') }}</label>

                            <div class="col-md-6">
                               <input  type="text" name="end" value="{{ old('end') }}"   autofocus >  </div>                             
                         </div>--}}
                         <div class="form-group row">
                            <label for="logouri" class="col-md-4 col-form-label text-md-right">{{ __('Points Per Match') }}</label>

                            <div class="col-md-6">
                               <input  type="number" name="points_per_match" value="{{ old('points_per_match') }}"   autofocus required min:2>
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
