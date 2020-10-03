@extends('layout')

@section('title', 'Myspace')

@section('content')


<h1>Users</h1>

<div class= "col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
	<div class= "panel panel-primary">
		
		<div class= "panel-heading" style= "list-style-type:none;">	
			@if(Auth::check())
				@if(Auth::user()->role_id == 1)
				<ul class="list-group" style= "list-style-type:none;">
					<div class="panel-body">
				@endif
			@endif
		

			@foreach($users as $user)
				<li class="list-group-item"><a href="/users/{{$user->id}}" >{{ $user->name}}</a></li>
			@endforeach
			
			</ul>
		</div>
	</div>
</div>

<!-- 
<div class= "col-md-4 col-lg-4 col-md-offset-3 col-lg-offset-3 pull-right">

		<form action="/search" method="POST" role="search">
		    {{ csrf_field() }}
		    <div class="input-group">
		        <input type="text" class="form-control" name="q"
		            placeholder="Search user"> <span class="input-group-btn">
		            <button type="submit" class="btn btn-default">
		                <span class="glyphicon glyphicon-search"></span>
		            </button>
		        </span>
		    </div>
		</form>

		{{-- <div class="container">
		    @if(isset($details))
		        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
		    <h2>Sample User details</h2>
		    <table class="table table-striped">
		        <thead>
		            <tr>
		                <th>Name</th>
		                <th>Email</th>
		            </tr>
		        </thead>
		        <tbody>
		            @foreach($details as $user)
		            <tr>
		                <td>{{$user->name}}</td>
		                <td>{{$user->email}}</td>
		            </tr>
		            @endforeach
		        </tbody>
		    </table>
		    @endif
		</div> --}}

	</div>
</div> -->

@endsection