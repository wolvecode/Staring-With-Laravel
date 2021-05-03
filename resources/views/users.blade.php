@extends('layouts.master')

@section('title', 'Manage Record')

@section('content')
    @if(session()->has('user.created'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Welldone Mate!</strong> {{ session()->get('user.created') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Available Users on the System
                    </button>
                </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    @if(count($users))
                        @foreach($users as $user)
                            <div class="row">
                                <div class="col-12 col-md-4"><strong> {{ $user->name }} </strong></div>
                                <div class="col-12 col-md-4">{{ $user->age }}</div>
                                <div class="mb-2 mr-5">
                                    <a href="/user/{{$user->id}}/edit" class="btn btn-warning">Edit user</a>
                                </div>
                                <div class="mb-2 ">
                                    <form method="post" action="/user/{{$user->id}}/delete">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete user</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-warning" role="alert">
                            Houston! You have no user yet on this system!
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div active="1" class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Add Users
                    </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <form method="post" action="{{ route('user.all') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Fullname</label>
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="{{ old('name') }}" aria-describedby="emailHelp">
                                    @error('name')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Age</label>
                                    <input type="text" name="age" class="form-control" id="exampleInputPassword1" value="{{ old('age') }}">
                                    @error('age')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
