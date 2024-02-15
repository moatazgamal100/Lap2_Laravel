@extends('layouts.main')

@section('title',"show one post")

@section('content')
<div class="container">
    <Form class="shadw   w-25 mx-auto">
        <div class="d-flex align-items-center">
            <h4 class="m-2  ">ID : </h4>
            <label for="id">{{$post->id}}</label>

        </div>
        <div class="d-flex align-items-center">
            <h4 class="m-2  ">Title : </h4>
            <label for="id">{{$post->title}}</label>
        </div>
        <div class="d-flex align-items-center">
            <h4 class="m-2  ">Body : </h4>
            <label for="id">{{$post->body}}</label>
        </div>
        <div class="d-flex align-items-center">
            <h4 class="m-2  ">User ID created post : </h4>
            <label for="id">{{$post->user_id}}</label>
        </div>
    </Form>
</div>
@endsection
