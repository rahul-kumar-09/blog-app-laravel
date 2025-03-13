@extends('layout');
@section('content');
    <section>
        <div >
            <h2>All Posts</h2>
            @foreach ($posts as $post)
            <div style="border: 1px solid black; margin-top: 10px; padding: 10px;">
                <h3>{{ $post->title }} by <u> {{$post->user->name}} </u> </h3>
                <p>{{ $post->body }}</p>
                <p> <a href="/edit-post/{{$post->id}}">Edit</a> </p>
                <form action="/delete-post/{{$post->id}}" method="post">  
                @csrf
                @method('delete')
                <button>Delete</button>
                </form>
            </div>
            @endforeach
        </div>
    </section>
@endsection
