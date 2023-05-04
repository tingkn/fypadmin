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
<h1>Contact Form</h1>

    <div class="container">
        <form action="{{ route('adminForm.index') }}" method="GET">
        <div class="form-group">
            <input type="text" class="form-control" id="search" name="search" placeholder="Search...">
        </div>
    </form>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Form ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Message</th>
            <th>Action</th>
        </tr>
        @foreach ($forms as $form)
        <tr>
            <td>{{ $form->id }}</td>
            <td>{{ $form->name }}</td>
            <td>{{ $form->email }}</td>
            <td>{{ $form->content }}</td>
            <td>
                <button type="button" class="btn btn-danger" 
                            onclick="if (confirm('Are you sure you want to delete this record?')) {
                                event.preventDefault();
                                document.getElementById('delete-form-{{$form->id}}').submit();
                            } else {
                                return false;
                            }">
                    Delete
                </button>
                <form id="delete-form-{{$form->id}}" 
                      action="{{route('adminForm.destroy', $form->id)}}"
                      method="post">
                    @csrf @method('DELETE')
                </form>
            </td>
        </tr>
    @endforeach
    </table>
    {!! $forms->links() !!}
</body>
</html>
@else
    <!-- Redirect unauthenticated users to login page -->
    <div class="alert alert-danger">
        <p>You need to <a href="{{ route('login') }}">log in</a> to access this page.</p>
    </div>
@endif
@endsection