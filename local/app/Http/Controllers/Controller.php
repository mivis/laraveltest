<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use View;
use DB;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;
	public $styles=array('/css/app.css');
	public function __construct() {
		View::composer('app', function($view) {	//вызываем app.blade.php шаблон с function
			$view->with('styles', $this->styles); //в итоге app будет вызываться с стилями обозначенными в переменной $styles
		});
		View::composer('home', function($view) { //делаем tovars доступной в шаблоне home
			$tovars=DB::table('products') 	-> where ('vip','=',1)
											-> paginate(2);	//-> get()получить все, -> first () //-> first()получить текущую запись, ->paginate()
			$view	->with('tovars',$tovars)
					->with('vip','1');
		});
	}
}

