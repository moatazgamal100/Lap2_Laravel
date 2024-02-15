@extends('categories.layout')
@section('title')
 create category
@endsection
@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    @endif
    <form action="{{url('/categories')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name='name'>
    <br>
    <input type="file" name='img'>
    <br>
    <textarea name="desc" id="" cols="20" rows="5"></textarea>
    <br>
    <input type="submit">
    </form>
@endsection
