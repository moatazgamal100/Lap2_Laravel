@extends('../categories/layout')
@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    @endif
    <form action="{{url("/login")}}" method="post">
        @csrf
        <input type="email" name="email" placeholder="email">
        <br>
        <input type="password" name="password" placeholder="password">
        <br>
        <input type="submit" value="login" >
    </form>
@endsection
