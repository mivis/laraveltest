@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					Вы вошли в систему!
					@if($tovars)
						@foreach ($tovars as $one)
							<h2>{{$one->name}}</h2>
							<div>{{$one->body}}</div>
							<hr>
						@endforeach
						{!!$tovars->render()!!} <!--модуль пагинации -->
					@endif	
					Всего товаров в VIP={{$vip}} : {!!$tovars->total()!!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
