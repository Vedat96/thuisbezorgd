@extends('layout')

@section('content')
<div>
<h1>Cart</h1>
 @if(!$consumables)
 Your cart is empty
 @else
	<p>
	@foreach($consumables->items as $consumables->item)
	<p>{{$consumables->item['item']->name}}: €{{$consumables->item['item']->price}} {{$consumables->item['qty']}}x<p>
	@endforeach
	</p>
	<p>Total quantity:
	{{$consumables->totalQty}}
	</p>
	<p>Total price: 
	€{{$consumables->totalPrice}}
	</p>

	<button><a href="/order">Bestellen</a></button>
{{-- 	<p>
	@foreach($consumables->items as $consumables->item)
	{{$consumables->totalQty}}
	@endforeach
	</p>
	<p>
	@foreach($consumables as $consumable)
	{{$consumables->totalQty}}
	@endforeach
	</p>

	{{$consumables}}

	<p>{{$consumables->item['item']}}<p> --}}

	{{-- <p>{{$consumables->item['item']->name}}<p> --}}

	
	

</div>
@endif
@endsection