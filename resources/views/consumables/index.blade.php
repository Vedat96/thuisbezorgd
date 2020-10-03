@extends('layout')

@section('content')
<div class= "col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
	<div class= "panel panel-primary">
		<div class= "panel-heading" style= "list-style-type:none;"> Consumables 
			<a class="pull-right btn btn-primary btn-sm" style= "padding-top: 0px" href="/consumables/create">Create new</a></div>
		<div class="panel-body">

			<ul class="list-group">
				@foreach($consumables as $consumable)
				<li class="list-group-item"><a href="/consumables/{{$consumable->id}}" >{{ $consumable->name}}</a></li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
@endsection