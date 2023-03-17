@extends('dashboard')

@section('content')

@if (Auth::check())
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Forum</h1>
    <form action="{{ route('post.index') }}" method="GET">
        <div class="form-group">
            <input type="text" class="form-control" id="search" name="search" placeholder="Search...">
        </div>
    </form>

    <div class="container">
        <table class="table table-bordered">
            <tr>
                <th>Post ID</th>
                <th>Post Title</th>
                <th>Post Content</th>
                <th width="150px">Action</th>
            </tr>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td>
                    <button type="button" class="btn btn-danger" href="{{ route('post.index') }}" 
                            onclick="if(confirm('Are you sure you want to delete this post?')){
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{$post->id}}').submit();
                                        }">
                            Delete 
                    </button>
                    <form id="delete-form-{{$post->id}}" 
                        action="{{route('post.destroy', $post->id)}}"
                        method="post">
                        @csrf @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {!! $posts->links() !!}
    </div>
</body>
</html>
@else
    <!-- Redirect unauthenticated users to login page -->
    <div class="alert alert-danger">
        <p>You need to <a href="{{ route('login') }}">log in</a> to access this page.</p>
    </div>
@endif

@endsection
