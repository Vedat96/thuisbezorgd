@extends('layout')

@section('content')

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
<div class="row">
    <div class="col-md-9 col-lg-9 col-sm-9 pull-left" style="background: white;">
    <h1>Add consumable</h1>
        <!-- Example row of columns -->
        <div class="row col-lg-12 col-md-12 col-sm-12">

            <form method="post" action="{{ route('consumables.store') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="consumable-category">Category<span class="required">*</span></label>
                                <select name="category">
                                    <option value="1">Drinks</option>
                                    <option value=" 2">Snacks</option>
                                    <option value="3">Foods</option>
                                </select>   
                                {{-- placeholder="Enter category"  
                                          id="consumable-category"
                                          required
                                          name="category"
                                          spellcheck="false"
                                          class="form-control"
                                           /> --}}
                            </div>
                            @if($restaurants == null)
                            <input class="form-control" type="hidden" name="restaurant_id" value="{{$restaurant_id}}">
                            
                            @endif

                            @if($restaurants != null)
                            <div class="form-group">
                                <label for="consumable-content">Select restaurant</label>
                                <select name="restaurant_id" class="form-control" style="padding:15px;">
                                    @foreach($restaurants as $restaurant)
                                    <option value="{{$restaurant->id}}">{{$restaurant->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="consumable-name">Name<span class="required">*</span></label>
                                <input   placeholder="Enter name"  
                                          id="consumable-name"
                                          required
                                          name="name"
                                          spellcheck="false"
                                          class="form-control"
                                           />
                            </div>
                            <div class="form-group">
                                <label for="consumable-description">Description</label>
                                <textarea placeholder="Enter description" 
                                          style="resize: vertical" 
                                          id="consumable-description"
                                          name="description"
                                          rows="5" spellcheck="false"
                                          class="form-control autosize-target text-left"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="consumable-price">Price<span class="required">*</span></label>
                                <input   placeholder="Enter price"  
                                          id="consumable-price"
                                          required
                                          name="price"
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
{{--        Site footer
      <footer class="footer">
        <p>© 2016 consumable, Inc.</p>
      </footer> --}}
    
  
    <div class="col-md-3 col-lg-3 col-sm-3 pull-right">
        {{-- <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
                <li><a href="/consumables">My consumables</a></li>
            </ol>
        </div> --}}
    </div>
</div>
@endsection