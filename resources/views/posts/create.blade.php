@extends('layouts.main')

@section('title',"create post")

@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    @endif
<Form class="shadw bg-danger w-25 mx-auto my-5 rounded-3 shadow p-3" method="post" action="{{url('/posts')}}">
    @csrf
    <div class="d-flex flex-column justify-content-around">
        <label for="id" class="m-1">Post Title</label>
        <input type="text" name="title">
    </div>
    <div class="d-flex flex-column justify-content-around">
        <label for="id" class="m-1">Body</label>
        <input type="text" name="body">
    </div>
    <div class="d-flex flex-column justify-content-around">
        <label for="id" class="m-1">Publish At</label>
        <input type="text" name="published_at">
    </div>
    <div class="w-50 mx-auto">
        <input class="btn btn-info w-100 m-2 mx-auto" type="submit" value="ADD">
    </div>
</Form>

@endsection
