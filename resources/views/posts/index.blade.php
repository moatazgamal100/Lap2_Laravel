@extends('layouts.main')

@section('title',"post list")

@section('content')

<x-app-layout>

    <table class=" mx-auto shadow my-5 rounded-3">
        <div class=" mx-auto w-25 mt-5"><a href="/posts/create" class="btn btn-success me-2 w-100">Add New Post</a></div>
        <tr class="bg-dark text-white border">
            <th class="border p-2 text-center">ID</th>
            <th class="border p-2 text-center">Title</th>
            <th class="border p-2 text-center">published At</th>
            <th class="border p-2 text-center">Action</th>
        </tr>
        @foreach ($posts as $post)
        <tr class="border">
            <td class="border p-2 text-center">{{$post->id}}</td>
            <td class="border p-2 text-center">{{$post->title}}</td>
            <td class="border p-2 text-center">{{$post->published_at}}</td>
            <td class="border p-2 text-center d-flex"><a class="btn btn-info me-2" href="/posts/{{$post->id}}">Show</a><a class="btn btn-info me-2" href="/posts/{{$post->id}}/edit">Edit</a><form action="{{url("posts/$post->id")}}" method="post"><input class="btn bg-danger" value="Delete" type="submit">@csrf @method("delete")</form></td>
        </tr>
        @endforeach
    </table>
</x-app-layout>
@endsection
