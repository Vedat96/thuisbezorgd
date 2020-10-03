@extends('layout')

@section('content')

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
<div class="row">
    <div class="col-md-9 col-lg-9 col-sm-9 pull-left">
      <!-- Jumbotron -->
        <div class="jumbotron">

            {{-- <img src="{{ asset('uploads/'.$user->image) }}" class="default" style="width:150px; height: 150px;">
                @if(Auth::check())
                    @if(Auth::user()->id)        
                        <form enctype="multipart/form-data" action="{{ route('users.update') }}" method="POST">
                            @csrf
                            <br>
                            <input type="file" name="image"><br>
                            <br>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    @endif
                @endif --}}




            <h1>{{ $user->name }}</h1>
            @if(Auth::check())

                <p class="lead">{{ $user->email}}</p>
                
            @endif
            {{-- <p class="lead">{{ $user->password}}</p> --}}
        </div> 


        </div>

        @if(Auth::check())
            @if(Auth::user()->id)
          
                <div class="col-md-3 col-lg-3 col-sm-3 pull-right">
                    <div class="sidebar-module">
                        {{-- <h4>Actions</h4> --}}
                        <ol class="list-unstyled">
                            <li><a href="/users/{{$user->id}}/edit"><i class="fas fa-user-edit"></i> Edit</a></li>
                            {{-- <li><a href="/users"><i class="fas fa-users"></i> All users</a> --}}
                            </li>
                            <br>
                            <li>

                            <a href="#" onclick="
                                  var result = confirm('Are you sure you wish to delete this user?');
                                      if( result ){
                                              event.preventDefault();
                                              document.getElementById('delete-form').submit();
                                      }
                                          "
                                          >
                                  <i class="fas fa-trash-alt"></i> Delete
                              </a>

                            <form id="delete-form" action="{{ route('users.destroy',[$user->id]) }}" 
                                method="POST" style="display: none;">
                                        <input type="hidden" name="_method" value="delete">
                                        {{ csrf_field() }}
                            </form>

                            </li>
                        </ol>
                    </div>

                    {{-- <a class="btn btn-primary" href="{{ route('like', ['id' => Auth::id()]) }}">Like me</a> --}}
            @endif
        @endif
    </div>
</div>
@endsection