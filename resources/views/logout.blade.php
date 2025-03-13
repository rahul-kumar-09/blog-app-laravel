@extends('layout');
@section('content');
    <section>
        <form action="/logout" method="post">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </section>
@endsection