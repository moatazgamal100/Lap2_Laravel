@extends('layouts.main')

@section('title',"post list")

@section('content')
<table class=" mx-auto shadow my-5 rounded-3">
    <div class=" mx-auto w-25 mt-5"><a href="/users/create" class="btn btn-success me-2 w-100">Add New User</a></div>
    <tr class="bg-dark text-white border">
        <th class="border p-2 text-center">ID</th>
        <th class="border p-2 text-center">Name</th>
        <th class="border p-2 text-center">Email</th>
        <th class="border p-2 text-center">Action</th>
    </tr>
    @foreach ($users as $user)
    <tr class="border">
        <td class="border p-2 text-center">{{$user->id}}</td>
        <td class="border p-2 text-center">{{$user->name}}</td>
        <td class="border p-2 text-center">{{$user->email}}</td>
        <td class="border p-2 text-center"><a class="btn btn-info me-2" href="/users/{{$user->id}}">Show</a><a class="btn btn-info me-2" href="/users/{{$user->id}}/edit">Edit</a><a class="btn btn-danger" href="">Delete</a></td>
    </tr>
    @endforeach
</table>
@endsection
