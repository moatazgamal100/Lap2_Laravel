@extends('layouts.main')

@section('title',"post list")

@section('content')

<table class=" mx-auto shadow my-5 rounded-3">
    <div class=" mx-auto w-25 mt-5"><a href="/users/create" class="btn btn-success me-2 w-100">Add New User</a></div>
    <tr class="bg-dark text-white border">
        <th class="border p-2 text-center">ID</th>
        <th class="border p-2 text-center">Name</th>
        <th class="border p-2 text-center">Email</th>
        <th class="border p-2 text-center">Post Count</th>
        <th class="border p-2 text-center">Action</th>
    </tr>
    @foreach ($users as $user)
    <tr class="border">
        <td class="border p-2 text-center">{{$user->id}}</td>
        <td class="border p-2 text-center">{{$user->name}}</td>
        <td class="border p-2 text-center">{{$user->email}}</td>
        <td class="border p-2 text-center">{{$user->posts_count}}</td>
        <td class="border p-2 text-center d-flex"><a class="btn btn-info me-2" href="/users/{{$user->id}}">Show</a><a class="btn btn-info me-2" href="/users/{{$user->id}}/edit">Edit</a><form action="{{url("users/$user->id")}}" method="post"><input class="btn btn-danger" value="Delete" type="submit">@csrf @method("delete")</form></td>
    </tr>
    @endforeach
</table>
@endsection
