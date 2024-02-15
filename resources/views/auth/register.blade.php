@extends('../categories/layout')
@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    @endif
    <form action="{{url("/register")}}" method="post">
        @csrf
        <input type="text" name="name" placeholder="name">
        <br>
        <input type="email" name="email" placeholder="email">
        <br>
        <input type="password" name="password" placeholder="password">
        <br>
        <input type="password" name="password_confirmation" placeholder="password">
        <br>
        <input type="submit" value="register" >
    </form>
@endsection
