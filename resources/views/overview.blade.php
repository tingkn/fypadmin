@extends('dashboard')

@section('content')

@if (Auth::check())
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
		@endif
	</div>
	<h1>Overview</h1>
	<div class="overview-container">
		<div class="box">
			<h2>Blogs</h2>
			<p>Download PDF Report for Blog</p>
			<a href="{{ route('BlogReport.pdf') }}">Download</a>
		</div>
		<div class="box">
			<h2>Forms</h2>
			<p>Download PDF Report for Contact Form</p>
			<a href="{{ route('FormReport.pdf') }}">Download</a>
		</div>
		<div class="box">
			<h2>Users</h2>
			<p>Download PDF Report for User</p>
			<a href="{{ route('UserReport.pdf') }}">Download</a>
		</div>
		<div class="box">
			<h2>Newsletter</h2>
			<p>Download PDF Report for Newsletter Subscribers</p>
			<a href="{{ route('NewsReport.pdf') }}">Download</a>
		</div>
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
