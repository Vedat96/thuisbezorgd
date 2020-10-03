@extends('layout')

@section('content')

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
<div class="row">
    <div class="col-md-9 col-lg-9 col-sm-9 pull-left">

        <!-- Example row of columns -->
        <div class="row col-lg-12 col-md-12 col-sm-12" style="background: white; margin: 10px;">

            <form method="post" action="{{ route('consumables.update',[$consumable->id]) }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="_method" value="put">

                            <div class="form-group">
                                <label for="consumable-category">Category<span class="required">*</span></label>
                                <select name="category">
                                    <option value="1">Drinks</option>
                                    <option value="2">Snacks</option>
                                    <option value="3">Foods</option>
                                </select>   
                            </div>
                            <div class="form-group">
                                <label for="consumable-name">Name<span class="required">*</span></label>
                                <input   placeholder="Enter name"  
                                          id="consumable-category"
                                          drinks
                                          name="name"
                                          spellcheck="false"
                                          class="form-control"
                                          value="{{ $consumable->name }}"
                                           />
                            </div>
                            <div class="form-group">
                                <label for="consumable-content">Description</label>
                                <textarea placeholder="Enter description" 
                                          style="resize: vertical" 
                                          id="consumable-content"
                                          name="description"
                                          rows="5" spellcheck="false"
                                          class="form-control autosize-target text-left">{{ $consumable->description }}</textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="consumable-price">price<span class="required">*</span></label>
                                <input   placeholder="Enter price"  
                                          id="consumable-price"
                                          required
                                          name="price"
                                          spellcheck="false"
                                          class="form-control"
                                          value="{{ $consumable->price }}"
                                           />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary"
                                       value="Submit"/>
                            </div>
            </form>


        </div>

{{--        Site footer
      <footer class="footer">
        <p>© 2016 consumable, Inc.</p>
      </footer> --}}
    </div>
  
    <div class="col-md-3 col-lg-3 col-sm-3 pull-right">
        <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
                <li><a href="/consumables/{{$consumable->id}}">View consumable</a></li>
                <li><a href="/consumables">All consumables</a></li>
            </ol>
        </div>

    {{--   <div class="sidebar-module">
        <h4>Memers</h4>
        <ol class="list-unstyled">
          <li><a href="#">March 2014</a></li>
        </ol>
      </div> --}}

    </div>
</div>
    @endsection