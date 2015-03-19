@extends ('app')

@section('content')
	<div style="width:800px; margin-left:50px">
	<h2>Заказы</h2>
	<a href="/adminka">Товары</a> | <a href="/adminka/orders/">Заказы</a>
	<hr>	
	@if(isset($orders))
		
		<table border="1px" bordercolor="#dedede">
			<tr><td width="400px">Изображение</td>
			</tr>
			@foreach ($orders as $one)
			
			<?php
		$bodyunser=unserialize($one->body);
		print_r ($bodyunser);
		?>
			
			<tr>			
				<td>{{$one->body}}</td>
			</tr>
			@endforeach
		</table>
		{!!$orders->render()!!} <!--модуль пагинации -->
			
		
	@endif	
	</div>	
@endsection