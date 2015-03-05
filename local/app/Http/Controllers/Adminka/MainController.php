<?php namespace App\Http\Controllers\Adminka;

use Input; //для перехвата post данных
use DB;
use App\Http\Controllers\Controller;

class MainController extends Controller {
	public function __construct() {
		parent::__construct();
		$this->middleware('admin'); //или guest. добавляется в /app/http/kernel.php
	}
	public function getIndex(){
	// для вывод сделаем запрос в базу данных и через view передать переменную
		return view('adminka.main'); //adminka.main точкой показывается вложенность папки
	}
	public function postIndex () { //принимает post данные			
		$data=Input::all();
		if (isset($data['showhide'])) {
			$showhide='show';
		} else {
				$showhide='hide';
			}	
		DB::table('products')->insert( array(	'name'=>$data['name'],
												'body'=>$data['body'],
												'showhide'=>$showhide,
												'price'=>$data['price'],
												'catid'=>$data['catid'],
												'vip'=>$data['vip'])
									);
		return Redirect('/adminka');
	}
}