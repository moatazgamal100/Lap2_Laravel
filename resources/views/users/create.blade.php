@extends('layouts.main')

@section('title',"create post")

@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    @endif
<Form class="shadw bg-danger w-25 mx-auto my-5 rounded-3 shadow p-3" method="post" action="{{url('/users')}}">
    @csrf
    <div class="d-flex flex-column justify-content-around">
        <label for="id" class="m-1">NAME</label>
        <input type="text" name="name">
    </div>
    <div class="d-flex flex-column justify-content-around">
        <label for="id" class="m-1">Email</label>
        <input type="text" name="email">
    </div>
    <div class="d-flex flex-column justify-content-around">
        <label for="id" class="m-1">Password</label>
        <input type="Password" name="password">
    </div>
    <div class="d-flex flex-column justify-content-around">
        <label for="id" class="m-1">Confirm Password</label>
        <input type="Password" name="password_confirmation">
    </div>
    <div class="w-50 mx-auto">
        <input class="btn btn-info w-100 m-2 mx-auto" type="submit" value="ADD">
    </div>
</Form>

@endsection
