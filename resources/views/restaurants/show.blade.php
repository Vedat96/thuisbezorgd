@extends('layout')

@section('content')

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
<div class="row">
    <div class="col-md-9 col-lg-9 col-sm-9 pull-left">
        <h1>{{ $restaurant->title }}</h1>
        {{-- <p class="lead">Title:{{ $restaurant->title}}</p> --}}
        <p class="lead">Email:{{ $restaurant->email}}</p>
        <p class="lead">Address:{{ $restaurant->address}}</p>
        <p class="lead">Zipcode:{{ $restaurant->zipcode}}</p>
        <p class="lead">City:{{ $restaurant->city}}</p>
        <p class="lead">Phone:{{ $restaurant->phone}}</p>
      
        <h1>Menu</h1>
        <h2>
        <a href="{{ route('restaurants.show', ['restaurant' => $restaurant->id, 'category' => 1]) }}">Drinks</a>/
        <a href="{{ route('restaurants.show', ['restaurant' => $restaurant->id, 'category' => 2]) }}">Snacks</a>/ 
        <a href="{{ route('restaurants.show', ['restaurant' => $restaurant->id, 'category' => 3]) }}">Foods</a>
        </h2>
        <div style="background: orange; margin: 0px;">
            @if(Auth::check())
            @if(Auth::user()->role_id == 1)
            <div>
                <a class="btn btn-primary" style="float: right; margin-right: 15px; padding: 10px; position: relative;" href="{{ route('consumables.create', ['restaurant_id' => $restaurant->id]) }}" role="button">Add consumables</a>
                </div>
            @endif
            @endif
            <div class="row col-md-12 col-lg-12 col-sm-12" >
                

                @foreach($restaurant->consumables as $consumable)
                <div class= "consumable" style="background-color: white; margin: 10px; padding: 15px; border-style: solid; border-color: black; position: relative; ">
                    {{-- <h2>{{$consumable->category}}</h2> --}}
                    <h4><a href="{{ route('consumables.show', ['restaurant_id' => $restaurant->id, 'consumable' => $consumable->id]) }}">{{$consumable->name}} </a></h4>
                    <p class="text-danger">€{{$consumable->price}} </p>
                    <p><a class="btn btn-primary" style="padding: 10px;" href="{{route('consumable.AddToCart', ['id' => $consumable->id])}}" role="button">Add to cart</a></p>
                </div>
                @endforeach
            </div>
        </div>
 

    @if(Auth::check())
        
        
    </div>
    <div class="col-md-3 col-lg-3 col-sm-3 pull-right">
        <div class="sidebar-module">
            {{-- <h4>Actions</h4> --}}
            <ol class="list-unstyled">
                @if(Auth::user()->role_id == 1)
                <li><a href="/restaurants/{{$restaurant->id}}/edit"></i> Edit estaurant</a></li>
                <li><a href="/restaurants">All restaurants</a></li>
                <li><a href="/restaurants/create">Add new restaurant</a></li>
                <br>
                <li>

                    <a href="#" onclick="
                        var result = confirm('Are you sure you wish to delete this restaurant?');
                            if( result ){
                                    event.preventDefault();
                                    document.getElementById('delete-form').submit();
                              }
                                "
                                >
                        <i class="fas fa-trash-alt"></i> Delete restaurant
                    </a>

                    <form id="delete-form" action="{{ route('restaurants.destroy',[$restaurant->id]) }}" 
                        method="POST" style="display: none;">
                                <input type="hidden" name="_method" value="delete">
                                {{ csrf_field() }}
                    </form>
                    <div class="container">
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
                                @foreach($details as $restaurant)
                                <tr>
                                    <td>{{$restaurant->title}}</td>
                                    <td>{{$restaurant->email}}</td>
                                    <td>{{$restaurant->address}}</td>
                                    <td>{{$restaurant->zipcode}}</td>
                                    <td>{{$restaurant->city}}</td>
                                    <td>{{$restaurant->phone}}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </li>
                
        
        @endif
        <li>
                    <a href="../cart">Cart <i class="fa fa-shopping-cart"></i></a>

                </li>
            </ol>
        </div>
    @endif
    </div>
</div>
@endsection