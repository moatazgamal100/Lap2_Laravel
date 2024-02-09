@extends('layouts.main')

@section('title',"show one post")

@section('content')
<div class="container">
    <Form class="shadw   w-25 mx-auto">
        <div class="d-flex align-items-center">
            <h4 class="m-2  ">ID : </h4>
            <label for="id">{{$user->id}}</label>

        </div>
        <div class="d-flex align-items-center">
            <h4 class="m-2  ">Name : </h4>
            <label for="id">{{$user->name}}</label>
        </div>
        <div class="d-flex align-items-center">
            <h4 class="m-2  ">Email : </h4>
            <label for="id">{{$user->email}}</label>
        </div>
    </Form>
</div>
@endsection
