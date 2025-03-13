<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curd</title>
</head>
<body>

    @auth

    <p>Congrates you are logged in </p>
    <form action="/logout" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>



    <form action="/create-post" method="post">
        @csrf
        <input name="title" type="text" placeholder="Post title">
        <input name="body" type="text" placeholder="Post body">
        <button type="submit">Create Post</button>
    </form>


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

    @endauth



    <div>
        <h2>Register</h2>
        <form action="/register" method="post">
            @csrf
            <input name="name" type="text" placeholder="Name">
            <input name="email" type="email" placeholder="Email">
            <input name="password" type="password" placeholder="Password">
            <button type="submit">Register</button>
        </form>
    </div>



    <div>
        <h2>Login</h2>
        <form action="/login" method="post">
            @csrf
            <input name="loginname" type="text" placeholder="Name">
            <input name="loginpassword" type="password" placeholder="Password">
            <button type="submit">Login</button>
        </form>
    </div>



</body>
</html>