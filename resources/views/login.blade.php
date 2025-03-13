@extends('layout');
@section('content');
    <section>
        <div>
            <h2>Login</h2>
            <form action="/login" method="post">
                @csrf
                <input name="loginname" type="text" placeholder="Name">
                <input name="loginpassword" type="password" placeholder="Password">
                <button type="submit">Login</button> <br>
                <a href="/register">Register!</a>
            </form>
        </div>
    </section>
@endsection
