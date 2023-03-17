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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
<link rel="stylesheet" href="css/style.css">

</head>
<body>
<h1>Blog</h1>
    <form action="{{ route('blogs.index') }}" method="GET">
        <div class="form-group">
            <input type="text" class="form-control" id="search" name="search" placeholder="Search...">
        </div>
    </form>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                    <div class="pull-right mb-2">
                        <a class="btn btn-success" href="{{ route('blogs.create') }}"> Create Blog</a>
                    </div>
            </div>
        </div>
    
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Blog ID</th>
            <th>Blog Title</th>
            <th>Blog Content</th>
            <th width="150px">Action</th>
        </tr>
        @foreach ($blogs as $blog)
        <tr>
            <td>{{ $blog->id }}</td>
            <td>{{ $blog->title }}</td>
            <td>{{ $blog->content }}</td>
            <td>            
                <a class="btn btn-primary" href="{{ route('blogs.edit',$blog->id) }}">Edit</a>
                <button type="button" class="btn btn-danger" href="{{ route('blogs.index') }}" 
                        onclick="if(confirm('Are you sure you want to delete this blog?')){
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{$blog->id}}').submit();
                                    }">
                        Delete 
                </button>
                <form id="delete-form-{{$blog->id}}" 
                    action="{{route('blogs.destroy', $blog->id)}}"
                    method="post">
                    @csrf @method('DELETE')
                </form>
            </td>
        </tr>
    @endforeach
    </table>
    {!! $blogs->links() !!}
</body>
</html>

@else
    <!-- Redirect unauthenticated users to login page -->
    <div class="alert alert-danger">
        <p>You need to <a href="{{ route('login') }}">log in</a> to access this page.</p>
    </div>
@endif

@endsection