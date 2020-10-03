@extends('layout')

@section('title', 'Restaurants')

@section('content')

<h1>Restaurants</h1>
<div class="row">
	<div class= "col-md-8 col-lg-8 col-md-offset-3 col-lg-offset-3 pull-left">
		<div class= "panel panel-primary">
			<div class= "panel-heading" style= "list-style-type:none;">	
				<ul class="list-group" style= "list-style-type:none;">
   				@if(Auth::check())
            		@if(Auth::user()->role_id == 1)
					<li>
						{{-- <a class="pull-right btn btn-primary btn-sm" style= "padding-top: 0px" href="{{ route('restaurants.create', ['restaurant' => $restaurant->id]) }}">Create new</a></div> --}}
						<a class="pull-right btn btn-primary btn-sm" style= "padding-top: 0px" href="/restaurants/create">Add new restaurant</a>
					</li>
					@endif
				@endif
					<div class="panel-body">	
				@foreach($restaurants as $restaurant)
					<li class="list-group-item"><a href="/restaurants/{{$restaurant->id}}" >{{ $restaurant->title}}</a></li>
				@endforeach
				</ul>
			</div>
		</div>
	</div>
	<div class= "col-md-4 col-lg-4 col-md-offset-3 col-lg-offset-3 pull-right">

		<form action="/search" method="POST" role="search">
		    {{ csrf_field() }}
		    <div class="input-group">
		        <input type="text" class="form-control" name="q"
		            placeholder="Search restaurant"> <span class="input-group-btn">
		            <button type="submit" class="btn btn-default">
		                <span class="glyphicon glyphicon-search"></span>
		            </button>
		        </span>
		    </div>
		</form>
	</div>
</div>
@endsection