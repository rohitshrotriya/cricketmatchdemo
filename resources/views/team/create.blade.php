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
                <div class="card-header">{{ __('Add Team') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.save.team') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input  type="text" name="name" value="{{ old('name') }}"   required autofocus>

                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="logouri" class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</label>

                            <div class="col-md-6">
                               <input  type="file" name="logouri" value="{{ old('logouri') }}"   autofocus required>

                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="club_state" class="col-md-4 col-form-label text-md-right">{{ __('Club/State') }}</label>

                            <div class="col-md-6">
                               <input  type="text" name="club_state" value="{{ old('club_state') }}"   autofocus>

                                
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
