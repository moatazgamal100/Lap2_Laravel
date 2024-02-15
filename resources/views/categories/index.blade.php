@extends('categories.layout')
@section('title')
    categories
@endsection
@section('content')
    @foreach ($categories as $category)
        <h4>
            <a href="{{url("/categories/$category->id")}}">
                {{$category->name}}
            </a>
        </h4>
        <h4>{{$category->desc}}</h4>

        <form action="{{url("/categories/$category->id")}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Delete">
        </form>
        <hr>
    @endforeach
@endsection
