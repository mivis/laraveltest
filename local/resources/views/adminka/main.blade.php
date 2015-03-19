@extends ('app')

@section('content')
	<div style="width:800px; margin-left:50px">
	<h2>Система администрирования</h2>
	<a href="/adminka">Товары</a> | <a href="/adminka/orders/">Заказы</a>
	<hr>
	<form method='post' action="{{asset('adminka')}}" enctype='multipart/form-data'> <!-- asset функция laravel -->
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
		<label for="exampleInputPassword1">Имя</label>
		<input type="name" class="form-control" id="exampleInputPassword1" name="name" placeholder="Имя...">
	</div>
	<div class="form-group">
		<label for="exampleInputPassword1">Описание</label>
		<textarea class="form-control" name="body" placeholder="Описание..."></textarea>
	</div>
	<div class="form-group">
		<label for="exampleInputFile">Картинка</label>
		<input type="file" id="exampleInputFile" name="picture">
		<p class="help-block">нажмите обзор для загрузки файла</p>
	</div>
	<div class="checkbox">
		<label><input type="checkbox" name="showhide">show</label>
	</div>
	<div class="form-group">
		<label for="exampleInputPassword1">Цена</label>
		<input type="name" class="form-control" name="price" id="exampleInputPassword1" placeholder="Цена...">
	</div>
	<select class="form-control" name="catid">
		<option value="1">Категория 1</option>
		<option value="2">Категория 2</option>
	</select>
	<br>
	VIP Позиция<br>
	<label class="radio-inline">
		<input type="radio" name="vip" id="inlineRadio1" value="1"> 1
	</label>
	<label class="radio-inline">
		<input type="radio" name="vip" id="inlineRadio2" value="2"> 2
	</label>
	<label class="radio-inline">
		<input type="radio" name="vip" id="inlineRadio3" value="3"> 3
	</label>
	<br><br>
	<button type="submit" class="btn btn-default">Готово</button>
	</form>
	<br>
	@if(isset($tovars))
		<table border="1px" bordercolor="#dedede">
			<tr><td width="400px">Изображение</td>
				<td width="200px">Название</td>
				<td width="200px">Цена</td>
				<td width="200px">Категория</td>
				<td width="200px">VIP позиция</td>
				<td width="300px">Действия</td>
			</tr>
			@foreach ($tovars as $one)
			<tr>			
				<td><img src="/media/images/{{$one->picturesmall}}"></td>
				<td>{{$one->name}}</td>
				<td>{{$one->price}}</td>
				<td>{{$one->catid}}</td>
				<td>{{$one->vip}}</td>			
				<td style="font-size:12px">
					<a href='{{asset("adminka/edit/".$one->id)}}'>Редактировать</a><br>
					@if ($one->showhide=='show') 
						<? $showhide='hide'; $textlink='Скрыть'?>
						@else
						<? $showhide='show'; $textlink='Показать'?>
					@endif
					<a href='{{asset("adminka/$showhide/".$one->id)}}'>{{$textlink}}</a><br>
					<a href='{{asset("adminka/delete/".$one->id)}}'>Удалить</a>
				</td>
			</tr>
			@endforeach
		</table>
			{!!$tovars->render()!!} <!--модуль пагинации -->
			
		
	@endif	
	</div>	
@endsection