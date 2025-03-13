@extends('layout');
@section('content');
    <section class="d-flex">
        <div >
            <h2>All Posts</h2>
            <div class="d-flex gap-3 ">
            @foreach ($posts as $post)
            <div class="card d-flex flex-col align" style="width: 18rem; display: flex; flex-direction: column; justify-content: space-between; min-height: 20rem; border: 1px solid black; margin-top: 10px; padding: 10px;">
                <h5>{{$post->user->name}}</h5>
                <h3 class="card-title">{{ $post->title }} by  </h3>
                <p class="card-text">{{ $post->body }}</p>
                <p  class="btn btn-primary"> <a class="text-white" style="text-decoration: none" href="/edit-post/{{$post->id}}">Edit</a> </p>
                <form action="/delete-post/{{$post->id}}" method="post">  
                @csrf
                @method('delete')
                <button class="btn btn-danger text-white">Delete</button>
                </form>
            </div>
            @endforeach
        </div>
        </div>

    </section>
@endsection