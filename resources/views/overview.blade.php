@extends('dashboard')

@section('content')
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
	<a href="{{ route('report.generate') }}">Generate Report</a>

		<div class="box">
			<h2>Blogs</h2>
			<p>Click here to view all blog posts</p>
			<a href="{{ route('blogs.index') }}">View Blogs</a>
		</div>
		<div class="box">
			<h2>Forms</h2>
			<p>Click here to view all submitted forms</p>
			<a href="{{ route('adminForm.index') }}">View Forms</a>
		</div>
		<div class="box">
			<h2>Users</h2>
			<p>Click here to view all registered users</p>
			<a href="{{ route('adminUser.index') }}">View Users</a>
		</div>
		<div class="box">
			<h2>Newsletter</h2>
			<p>Click here to view all newsletter subscribers</p>
			<a href="{{ route('newsletter.index') }}">View Subscribers</a>
		</div>
	</div>
</body>
</html>
@endsection
