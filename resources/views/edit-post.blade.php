@extends('layout');
@section('content');
<section>
    <h1>Edit post</h1>
    <form action="/edit-post/{{$post->id}}" method="post">
    @csrf
    @method('put')
    <input type="text" name="title" value="{{$post->title}}">
    <textarea name="body">{{$post->body}}</textarea>    
    <button>Save changes</button>
    </form>
</section>
@endsection
