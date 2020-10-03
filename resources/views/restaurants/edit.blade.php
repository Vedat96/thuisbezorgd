@extends('layout')

@section('content')

<div class="row">
    <div class="col-md-9 col-lg-9 col-sm-9 pull-left">
        <h1>Edit restaurant</h1>
        <div class="row col-lg-12 col-md-12 col-sm-12" style="background: white; margin: 10px;">
            <form method="post" action="{{ route('restaurants.update',[$restaurant->id]) }}">
                            {{ csrf_field() }}

                <input type="hidden" name="_method" value="put">

                <div class="form-group">
                    <label for="restaurant-name">Title<span class="required">*</span></label>
                    <input   placeholder="Enter title"  
                              id="restaurant-title"
                              required
                              name="title"
                              spellcheck="false"
                              class="form-control"
                              value="{{ $restaurant->title }}" 
                               />
                </div>
                <div class="form-group">
                    <label for="restaurant-email">Email<span class="required">*</span></label>
                    <input   placeholder="Enter email"  
                              id="restaurant-email"
                              required
                              name="email"
                              spellcheck="false"
                              class="form-control"
                              value="{{ $restaurant->email }}" 
                               />
                </div>
                <div class="form-group">
                    <label for="restaurant-address">Address<span class="required">*</span></label>
                    <input   placeholder="Enter address"  
                              id="restaurant-address"
                              required
                              name="address"
                              spellcheck="false"
                              class="form-control"
                              value="{{ $restaurant->address }}" 
                               />
                </div>
                <div class="form-group">
                    <label for="restaurant-zipcode">Zipcode<span class="required">*</span></label>
                    <input   placeholder="Enter zipcode"  
                              id="restaurant-zipcode"
                              required
                              name="zipcode"
                              spellcheck="false"
                              class="form-control"
                              value="{{ $restaurant->zipcode }}" 
                               />
                </div>
                <div class="form-group">
                    <label for="restaurant-city">City<span class="required">*</span></label>
                    <input   placeholder="Enter city"  
                              id="restaurant-city"
                              required
                              name="city"
                              spellcheck="false"
                              class="form-control"
                              value="{{ $restaurant->city }}" 
                               />
                </div>
                <div class="form-group">
                    <label for="restaurant-phone">Phone<span class="required">*</span></label>
                    <input   placeholder="Enter phone"  
                              id="restaurant-phone"
                              required
                              name="phone"
                              spellcheck="false"
                              class="form-control"
                              value="{{ $restaurant->phone }}" 
                               />
                </div>

                

                </div>  
                <div class="form-group">
                    <input type="submit" class="btn btn-primary"
                           value="Submit"/>
                </div>
            </form>
        </div>
    </div>
  
    <div class="col-md-3 col-lg-3 col-sm-3 pull-right">
        <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
                <li><a href="/restaurants/{{$restaurant->id}}">View restaurant</a></li>
                <li><a href="/restaurants">All restaurants</a></li>
            </ol>
        </div>
    </div>
</div>
@endsection