@extends('layout')

@section('title', 'Home')

@section('content')

<div class="row">
    <div class="col-sm-8">
    <h1>Search restaurants</h1>
        <div class="container">

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
        @if(isset($details))
            <h5> The Search results for<b> {{ $query }} </b> are :</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Zipcode</th>
                        <th>City</th>
                        <th>Phone</th>
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
    </div>
</div>

@endsection