@extends('layout')

@section('content')

<div class="row">

    <div class="row col-md-9 col-lg-9 col-sm-9 pull-left" style="background: white;">
        <h1>Create new restaurant </h1>
        <div class="row  col-md-12 col-lg-12 col-sm-12" >

        <form method="post" action="{{ route('restaurants.store') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="restaurant-title">Title<span class="required">*</span></label>
                <input   placeholder="Enter title"  
                          id="restaurant-title"
                          required
                          name="title"
                          spellcheck="false"
                          class="form-control"
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
                           />
            </div>

            
         
            <div class="form-group">
                <input type="submit" class="btn btn-primary"
                       value="Submit"/>
            </div>
        </form>
    </div>
</div>


<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
    <div class="sidebar-module">
            <ol class="list-unstyled">
                <li><a href="/restaurants">My restaurants</a></li>
            </ol>
        </div>
    </div>
</div>
@endsection