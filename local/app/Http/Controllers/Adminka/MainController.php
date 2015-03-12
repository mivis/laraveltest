<?php namespace App\Http\Controllers\Adminka;

use Input; //для перехвата post данных
use DB;
use App\Http\Controllers\Controller;
use Image;

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
		if ($_FILES['picture']['error']==UPLOAD_ERR_OK){ //picture это name из формы input где вставляется файл, UPLOAD_ERROK
			$tmp_name=$_FILES['picture']['tmp_name']; // присваиваем путь к временному файлу. _FILES отдает двухмерный массив Array ([picture] => Array([name] => doroga.jpg...))
			$name=$_FILES['picture']['name'];
			$picname=date('y_m_d_h_i_s').$name;
			$dir=$_SERVER['DOCUMENT_ROOT'].'/media/images/';
			if (is_uploaded_file($tmp_name)) {
				move_uploaded_file($tmp_name, $dir.$picname);
				$img=Image::make($dir.$picname);
				$img->resize(150,null,function($constraint){$constraint->aspectRatio();}); //150-width, null - height, function для соблюдения ратио
				$picsmall='s_'.$picname;
				$img->save($dir.$picsmall);
			}
		} else {
			echo 'no file';
		}
		$tovar->name=$data['name']; //name- поле в таблице, $data['name'] - то что идет в POST
		$tovar->body=$data['body'];
		$tovar->showhide=$showhide;
		$tovar->price=$data['price'];
		$tovar->catid=$data['catid'];
		$tovar->vip=$data['vip'];
		$tovar->picturesmall=$picsmall;
		$tovar->picture=$picname;
		$tovar->save();
		return redirect('/adminka/');
	}
	public function getDelete ($id=null) {
		$tovar=\App\products::find($id);
		if ($tovar->picturesmall){
			@unlink($_SERVER['DOCUMENT_ROOT'].'/media/images/'.$tovar->picturesmall);
		}
		if ($tovar->picture) {
			@unlink($_SERVER['DOCUMENT_ROOT'].'/media/images/'.$tovar->picture);
		}
		$tovar->delete();
		return redirect('/adminka/');
	}
	public function getShow ($id=null){
		$tovar=\App\products::find($id);
		$tovar->showhide='show';
		$tovar->save();
		return redirect('/adminka/');
	}
	public function getHide ($id=null){
		$tovar=\App\products::find($id);
		$tovar->showhide='hide';
		$tovar->save();
		return redirect('/adminka/');
	}
	public function postIndex () { //принимает post данные			
		$data=Input::all();
		if (isset($data['showhide'])) {
			$showhide='show';
		} else {
				$showhide='hide';
			}	
		if ($_FILES['picture']['error']==UPLOAD_ERR_OK){ //picture это name из формы input где вставляется файл, UPLOAD_ERROK
			$tmp_name=$_FILES['picture']['tmp_name']; // присваиваем путь к временному файлу. _FILES отдает двухмерный массив Array ([picture] => Array([name] => doroga.jpg...))
			$name=$_FILES['picture']['name'];
			$picname=date('y_m_d_h_i_s').$name;
			$dir=$_SERVER['DOCUMENT_ROOT'].'/media/images/';
			if (is_uploaded_file($tmp_name)) {
				move_uploaded_file($tmp_name, $dir.$picname);
				$img=Image::make($dir.$picname);
				$img->resize(150,null,function($constraint){$constraint->aspectRatio();}); //150-width, null - height, function для соблюдения ратио
				$picsmall='s_'.$picname;
				$img->save($dir.$picsmall);
			}
		} else {
			$picname='';
			$picsmall='';
		}		
		DB::table('products')->insert( array(	'name'=>$data['name'],
												'body'=>$data['body'],
												'showhide'=>$showhide,
												'price'=>$data['price'],
												'catid'=>$data['catid'],
												'vip'=>$data['vip'],
												'picture'=>$picname,
												'picturesmall'=>$picsmall)
									);
		return Redirect('/adminka');
	}
}