<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use View;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;
	public $styles=array('/css/app.css');
	public function __construct() {
		View::composer('app', function($view) {	//вызываем app.blade.php шаблон с function
			$view->with('styles', $this->styles); //в итоге app будет вызываться с стилями обозначенными в переменной $styles
		});
	}
}

