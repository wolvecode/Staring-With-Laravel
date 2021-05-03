@extends('layouts.master')

@section('title', 'Welcome to Student Record Keeper')

@section('content')
    <div class="h-100 w-100 d-flex justify-content-center align-content-center">
        <div style="width: 300px; height: 200px;" class="text-center">
            <a href="{{route('user.all')}}" class="btn btn-outline-primary my-4 px-5">Begin Recording</a>
        </div>
    </div>
@endsection
