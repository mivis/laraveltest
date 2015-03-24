@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					@if(isset($tovars))
						@foreach ($tovars as $one)
						<div class="col-md-6">
							<b>{{$one->name}}</b>
							<div>{{$one->body}}</div>
						</div>
						<div class="col-md-6">
							<form action='cart/add/{{$one->id}}' method='post'>
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type='number' name='colvo' value='1' min='1' max='100' required>
								<button type="submit" class="btn btn-default">
									<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> Купить</span></button>
							</form>
						</div>
						<div style="clear:both"></div>
						<hr>
						@endforeach
						{!!$tovars->render()!!} <!--модуль пагинации -->
						Всего товаров {!!$tovars->total()!!}
					@endif						
				</div>				
			</div>
		</div>
	</div>
</div>
@endsection
