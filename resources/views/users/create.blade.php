@extends('layouts.main')

@section('title',"create post")

@section('content')
<Form class="shadw bg-danger w-25 mx-auto my-5 rounded-3 shadow p-3">
    <div class="d-flex flex-column justify-content-around">
        <label for="id" class="m-1">ID</label>
        <input type="text" >
    </div>
    <div class="d-flex flex-column justify-content-around">
        <label for="id" class="m-1">NAME</label>
        <input type="text" >
    </div>
    <div class="d-flex flex-column justify-content-around">
        <label for="id" class="m-1">Email</label>
        <input type="text">
    </div>
    <div class="d-flex flex-column justify-content-around">
        <label for="id" class="m-1">Password</label>
        <input type="Password">
    </div>
    <div class="w-50 mx-auto">
        <a href="" class="btn btn-info w-100 m-2 mx-auto">Edit</a>
    </div>
</Form>

@endsection
