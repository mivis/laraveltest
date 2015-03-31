<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use View;
use DB;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;
	public $styles=array('/css/app.css');
	public $scripts=array('//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js',
							'//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js');
	public function __construct() {
		View::composer('app', function($view) {	//вызываем app.blade.php шаблон с function
			$view->with('styles', $this->styles)
				->with('scripts', $this->scripts);//в итоге app будет вызываться с стилями обозначенными в переменной $styles
		});
		View::composer('home', function($view) { //делаем tovars доступной в шаблоне home
			$this->scripts[]='media/js/my.js';
			$tovars=DB::table('products') 	//-> where ('vip','=',1)
											-> paginate(8);	//-> get()получить все, -> first () //-> first()получить текущую запись, ->paginate()
			$view	->with('tovars',$tovars);
					//->with('vip','1');
		});
	}
}