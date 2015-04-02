<div>
<a href="/cart/">Ваша корзина</a><br>
@foreach($products as $one)
	{{$one->name}}
	@if(isset($cookies[$one->id]))
		<b>{{$cookies[$one->id]}}</b>
		<?php $tt=$cookies[$one->id]*$one->price;
			echo $tt;?>
	@endif
	<br />
@endforeach
</div>