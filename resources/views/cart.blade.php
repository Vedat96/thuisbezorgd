@extends('layout')

@section('content')

	<h1>Cart</h1>
	<div class="cart">
		<table>
	<tr>
		<th>ID</th>
		<th>Product</th>
		<th>Prijs</th>
		<th>Aantal</th>
		<th>Actie</th>
	</tr>

	 @if(!$consumables)
	 Your cart is empty
	 @else
		@foreach($consumables->items as $cartProduct)
			<tr>
				<td>{{$cartProduct['item']->id}}  </td>
			    <td>{{$cartProduct['item']->name}}  </td>
			    <td>€{{$cartProduct['item']->price}}</td>
			    <td>{{$cartProduct['qty']}}x</td>
			    <td><a class="btn btn-primary" href="{{ route('cartProduct.AddToCart', ['id' => $cartProduct['item']->id])}}" role="button">+</a> 
			    	<a class="btn btn-primary" href="{{ route('cartProduct.removeFromCart', ['id' => $cartProduct['item']->id])}}" role="button">-</a></td>

			</tr>
			   
				
			

        
			
		@endforeach
		<a href="/delete"><button style="float: right;">Annuleer</button></a>
		<a href="/order"><button style="float: right;">Bestellen</button></a>
		

<!-- 		<p>Total quantity:
		{{$consumables->totalQty}}
		</p>
		<p>Total price: 
		€{{$consumables->totalPrice}}
		</p> -->

		
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
</div>
@endsection