@extends('layout');
@section('content');
    <section>
        <div class="m-5">
            <h2>Register</h2>
            <form action="/register" method="post">
                @csrf
                <input name="name" type="text" placeholder="Name">
                <input name="email" type="email" placeholder="Email">
                <input name="password" type="password" placeholder="Password">
                <button type="submit">Register</button>
            </form>
        </div>
    </section>
@endsection
