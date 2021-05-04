@extends('layouts.master')

@section('title', 'Edit Record')

@section('content')
    <div class="col-12 col-md-6">
        <div class="row">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <form method="post" action="/user/{{$user->id}}">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <h4>Hello {{$user->name}}</h4>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fullname</label>
                                <input type="text" class="form-control" value="{{$user->name}}" name="name" id="exampleInputEmail1" value="{{ old('name') }}" aria-describedby="emailHelp">
                                @error('name')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Age</label>
                                <input type="text" name="age" value="{{$user->age}}" class="form-control" id="exampleInputPassword1" value="{{ old('age') }}">
                                @error('age')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
