@extends('categories.layout')
@section('title')
    edit category
@endsection
@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    @endif
    <form action="{{url("/categories/$category->id")}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <input type="text" name='name' value="{{$category->name}}">
    <br>
    <textarea name="desc" id="" cols="20" rows="5">{{$category->desc}}</textarea>
    <br>
    <input type="file" name='img'>
    <br>
    <input type="submit">
    </form>
@endsection
