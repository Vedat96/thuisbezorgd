@extends('layout')

@section('content')

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
<div class="row">
    <div class="col-md-9 col-lg-9 col-sm-9 pull-left">
        <h1>Edit</h1>
        <div class="row col-lg-12 col-md-12 col-sm-12" style="background: white; margin: 10px;">
            <form method="post" action="{{ route('users.update',[$user->id]) }}">
                {{ csrf_field() }}

                <input type="hidden" name="_method" value="PUT">

                <div class="form-group">
                    <label for="user-name">Name<span class="required">*</span></label>
                    <input   placeholder="Enter name"  
                              id="user-name"
                              required
                              name="name"
                              spellcheck="false"
                              class="form-control"
                              value="{{ $user->name }}" 
                               />
                </div>

                <div class="form-group">
                    <label for="user-email">Email<span class="required">*</span></label>
                    <input   placeholder="Enter email"  
                              id="user-email"
                              required
                              name="email"
                              spellcheck="false"
                              class="form-control"
                              value="{{ $user->email }}"
                              width="500" 
                               />
                </div>

                <div class="form-group">
                    <label for="user-adress">Address<span class="required">*</span></label>
                    <input   placeholder="Enter adress"  
                              id="user-adress"
                              required
                              name="adress"
                              spellcheck="false"
                              class="form-control"
                              value="{{ $user->address }}" 
                               />
                </div>
                <div class="form-group">
                    <label for="user-zipcode">Zipcode<span class="required">*</span></label>
                    <input   placeholder="Enter zipcode"  
                              id="user-zipcode"
                              required
                              name="zipcode"
                              spellcheck="false"
                              class="form-control"
                              value="{{ $user->zipcode }}" 
                               />
                </div>
                <div class="form-group">
                    <label for="user-name">City<span class="required">*</span></label>
                    <input   placeholder="Enter name"  
                              id="user-name"
                              required
                              name="city"
                              spellcheck="false"
                              class="form-control"
                              value="{{ $user->city }}" 
                               />
                </div>
                <div class="form-group">
                    <label for="user-phone">Phone<span class="required">*</span></label>
                    <input   placeholder="Enter phone"  
                              id="user-phone"
                              required
                              name="phone"
                              spellcheck="false"
                              class="form-control"
                              value="{{ $user->phone }}" 
                               />
                </div>

                <div class="form-group">
                    <label for="user-password">Password<span class="required">*</span></label>
                    <input   placeholder="Enter password"  
                              id="user-password"
                              required
                              name="password"
                              spellcheck="false"
                              class="form-control"
                              value=""
                               />
                </div>

                @if(Auth::check())
                    @if(Auth::user()->role_id == 1)

                        <div class="form-group">
                            Role
                            <select name="role_id">
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  
                            </select>
                        </div>
                    @endif
                @endif

                <div class="form-group">
                    <input type="submit" class="btn btn-primary"
                           value="Submit"/>
                </div>
            </form>
        </div>
    </div>
    
      
    <div class="col-md-3 col-lg-3 col-sm-3 pull-right">
        {{-- <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
                <li><a href="/users/{{$user->id}}">View user</a></li>
                <li><a href="/users">All users</a></li>
            </ol>
        </div> --}}
    </div>
    
</div>
@endsection