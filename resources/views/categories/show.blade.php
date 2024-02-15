@extends('categories.layout')
@section('title')
 show category
@endsection
@section('content')
<h3>{{$category->name}}</h3>
<h4>{{$category->desc}}</h4>
<h4>Books</h4>

@if ($category->books->count()!=0)
    @foreach ($category->books as $book)
        <p>{{$book->name}}</p>
    @endforeach
@endif

<img src="{{asset(str_replace("public/","storage/",$category->img))}}" alt="">
<a href="{{url("categories/$category->id/edit")}}">Edit</a>
@endsection
