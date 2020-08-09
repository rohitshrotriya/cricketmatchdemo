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
                <div class="card-header">{{ __('Add Player') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.save.player') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input  type="text" name="first_name" value="{{ old('first_name') }}"   required autofocus>

                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input  type="text" name="last_name" value="{{ old('last_name') }}"    autofocus>

                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image_uri" class="col-md-4 col-form-label text-md-right">{{ __('Image Uri') }}</label>

                            <div class="col-md-6">
                               <input  type="file" name="image_uri" value="{{ old('image_uri') }}"   autofocus required>

                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jersey" class="col-md-4 col-form-label text-md-right">{{ __('Jersey') }}</label>

                            <div class="col-md-6">
                               <input  type="number" name="jersey" value="{{ old('jersey') }}"   autofocus required min:1>

                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                               <select name="country_id" required>
                                 <option value="">Select Country</option>
                                @if($country->count())
                                    @foreach($country as $key=>$value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                @endif
                                   
                               </select>

                                
                            </div>
                        </div>
                        @if($attribute->count())
                        @foreach($attribute as $key=>$value)
                        <div class="form-group row">
                            <label for="attribute_{{$value->id}}" class="col-md-4 col-form-label text-md-right">{{ ucfirst(strtolower($value->name)) }}</label>

                            <div class="col-md-6">
                               <input  type="number" name="attribute[{{$value->id}}]" value="0"   autofocus  min:1>
                            </div>
                        </div>
                        @endforeach
                        @endif
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
