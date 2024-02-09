@extends('layouts.main')

@section('title',"edit post")

@section('content')
<Form class="shadw bg-danger w-25 mx-auto my-5 rounded-3 shadow p-3">
    <div class="d-flex flex-column justify-content-around">
        <label for="id" class="m-1">ID</label>
        <input type="text" value="{{$user->id}}">
    </div>
    <div class="d-flex flex-column justify-content-around">
        <label for="id" class="m-1" >Name</label>
        <input type="text" value="{{$user->name}}" >
    </div>
    <div class="d-flex flex-column justify-content-around">
        <label for="id" class="m-1"  >Email</label>
        <input type="text" value="{{$user->email}}">
    </div>
    <div class="w-50 mx-auto">
        <a href="" class="btn btn-info w-100 m-2 mx-auto">Edit</a>
    </div>
</Form>

@endsection
