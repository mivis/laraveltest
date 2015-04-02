@extends('app')

@section('content')
<style>
.modal-window {
	position:fixed;
	top:50px;
	left:50%;
	margin-left:-250px;
	width:500px;
	height:300px;
	border:1px solid orange;
	box-shadow:2px 2px 20px black;
	padding:10px;
	background-color:#fff;	
	border-radius:15px;
}
#jquery-overlay {
	height:100%;
	width:100%;
	background:black;
	opacity:0.6;
	position:fixed;
	left:0;
	top:0;
}
.modal-close {
	position:absolute;
	right:15px;
	top:5px;
	color:red;
	font-size:20px;
}
.modal-close:before {
	position:relative;
	content:'Закрыть';
	top:-1px;
	font-size:12px;
}
.cart-window {
	position:fixed;
	top:70px;
	right:0px;
	width:200px;
	border:1px solid orange;
	border-right:0px;
	box-shadow:2px 2px 20px black;
	padding:10px;
	background-color:#fff;	
	border-radius:15px 0px 0px 15px;
	display:none;
}
</style>
<div class="container">
	<div class="cart-window">
	</div>
	<div style="text-align:center">
		<h2><a href="/cart/">Корзина</a></h2>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">				
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					@if(isset($tovars))
					<div class="tovar">
						@foreach ($tovars as $one)
						<div class="col-md-6">
							<b><a href="" data="{{$one->id}}">{{$one->name}}</a></b>
							<div>{{$one->body}}</div>
						</div>
						<div class="col-md-6">
							<form action='cart/add/{{$one->id}}' method='post'>
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type='number' name='colvo' id='colvo-{{$one->id}}' value='1' min='1' max='100' required>
								<button type="submit" data="{{$one->id}}" class="btn btn-default buy">
									<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> Купить</span>
								</button>
								<span id="data-{{$one->id}}">
									
								</span>
							</form>
						</div>
						<div style="clear:both"></div>
						<hr>
						@endforeach
					</div>
						{!!$tovars->render()!!} <!--модуль пагинации -->
						Всего товаров {!!$tovars->total()!!}
					@endif						
				</div>				
			</div>
		</div>
	</div>
</div>
@endsection
