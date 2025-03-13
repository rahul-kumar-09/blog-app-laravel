@extends('layout');
@section('content');
    <section>
        <form action="/create-post" method="post">
            @csrf
            <input name="title" type="text" placeholder="Post title">
            <input name="body" type="text" placeholder="Post body">
            <button type="submit">Create Post</button>
        </form>
    </section>
@endsection
