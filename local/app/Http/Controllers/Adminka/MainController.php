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
		$tovars=DB::table('products') 	-> paginate(5);
	//или запрос через модели $tovars=\App\products::paginate(5);
		return view('adminka.main') -> with('tovars',$tovars); //adminka.main точкой показывается вложенность папки
	}
	public function getEdit($id=null) {
		$tovar=\App\products::find($id);
		return view ('adminka.edit')	->	with('tovar',$tovar);												
	}
	public function postEdit($id=null) {
		$data=Input::all();
		$tovar=\App\products::find($id);
		if (isset($data['showhide'])){
			$showhide='show';
		} else {
			$showhide='hide';
		};
		$tovar->name=$data['name']; //name- поле в таблице, $data['name'] - то что идет в POST
		$tovar->body=$data['body'];
		$tovar->showhide=$showhide;
		$tovar->price=$data['price'];
		$tovar->catid=$data['catid'];
		$tovar->vip=$data['vip'];
		$tovar->save();
		return redirect('/adminka/');
	}
	public function getDelete ($id=null) {
		$tovar=\App\products::find($id);
		$tovar->delete();
		return redirect('/adminka?page='.$_GET['page']);
	}
	public function getShow ($id=null){
		
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