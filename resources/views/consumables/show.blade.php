@extends('layout')

@section('content')


<div class="row">
    <div class="row col-md-9 col-lg-9 col-sm-9 pull-left ">

        <div class="well well-lg" >
            {{-- <h1>{{ $consumable->category }}</h1> --}}
            <p class="lead">Name: {{ $consumable->name }}</p>
            <p class="lead">Description: {{ $consumable->description }}</p>
            <p class="lead">Price: €{{ $consumable->price }}</p>

        </div>       
    </div>
        @if(Auth::check())

            @if(Auth::user()->role_id == 1)

    <div class="col-sm-3 col-md-3 col-lg-3 pull-right">
        <div class="sidebar-module">
            <ol class="list-unstyled">
                <li><a href="{{ route('consumables.edit', ['consumable' => $consumable->id]) }}">Edit consumable</a></li>
                <li><a href="{{ route('consumables.create', ['consumable' => $consumable->id]) }}">Add consumable</a></li>
            
            <br/>


            {{-- @if($consumable->user_id == Auth::user()->id) --}}
            
                <li>
                <a href="#"
                  onclick="
                  var result = confirm('Are you sure you wish to delete this consumable?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }
                          "
                          >
                  Delete consumable
              </a>

              <form id="delete-form" action="{{ route('consumables.destroy',[$consumable->id]) }}" 
                method="POST" style="display: none;">
                        <input type="hidden" name="_method" value="delete">
                        {{ csrf_field() }}
              </form>

              </li>
            @endif
        @endif
            </ol>
        </div> 
    <div>
@endsection
</div>