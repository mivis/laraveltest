@extends ('app')

@section('content')
	<div style="width:800px; margin-left:50px">
	<h2>Корзина</h2>
	Здесь корзина покупателя
	<hr>
	<br>
	@if(isset($tovars))
		<table border="1px" bordercolor="#dedede">
			<tr><td width="400px">Изображение</td>
				<td width="200px">Название</td>
				<td width="200px">Цена</td>
				<td width="800px">Количество</td>
				<td width="200px">Сумма</td>
				<td width="300px">Действия</td>
			</tr>
			<?php
			$itogo=0;
			?>
			@foreach ($tovars as $one)
			<? $summa=$one->price*$arr[$one->id];?>
			<tr>			
				<td><img src="/media/images/{{$one->picturesmall}}"></td>
				<td>{{$one->name}}</td>
				<td>{{$one->price}}</td>
				<td>
					<form action='cart/add/{{$one->id}}' method='post'>
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type='number' name='colvo' value='{{$arr[$one->id]}}' min='1' max='100' required>
							<button type="submit" class="btn btn-default">
									<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> Купить</span></button>
					</form>				
				</td>
				<td>{{$summa}}</td>			
				<td style="font-size:12px">					
					<a href='{{asset("cart/delete/".$one->id)}}'>Удалить</a>
				</td>
				<?php
				$itogo+=$summa;
				?>				
			</tr>
			@endforeach
			<tr>
				<td colspan="4"><b>Итого:</b></td>
				<td colspan="2" align="center"><b>{{$itogo}}</b></td>
			</tr>
				
		</table>
		<br><br>
		<table border="1px" bordercolor="#dedede">
		<font style="color:red"><b>ПОДТВЕРЖДЕНИЕ ЗАКАЗА</b><br>
		
			@if(count($errors)>0)
				@foreach($errors->all() as $one)
					{{$one}}<br>
				@endforeach
			@endif
		
		</font>
			<form method='post' action="{{asset('cart/order')}}"> <!-- asset функция laravel -->
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<label for="exampleInputPassword1">Телефон</label>
						<input type="phone" value"{{Input::old('phone')}}" class="form-control" name="phone" id="exampleInputPassword1" placeholder="Телефон...">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Ваш комментарий</label>
						<textarea class="form-control" name="comment" placeholder="Ваш комментарий..."></textarea>
					</div>
					<button type="submit" class="btn btn-default">Подтвердить</button>
			</form>
		</table>
		
	@endif	
	</div>	
@endsection