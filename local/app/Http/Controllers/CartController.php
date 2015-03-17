<?php namespace App\Http\Controllers;

use DB;
use App;

class CartController extends Controller {
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getIndex()
	{	$arr=\App::make('\App\Libs\Cookie')->get();
		$dbarr=\App::make('\App\Libs\Cookie')->get_db();
		//$dbarr=[];
		//$arr=[];
		//foreach($_COOKIE as $key=>$value){
			//$key=(int)$key;
			//if($key>0){
				//$arr[$key]=$value;
				//$dbarr[]=$key;
			//}
		//}
		$tovars=\App\Products::whereIn ('id', $dbarr)
								->get();
		return view('cart')	->with('tovars', $tovars)
							->with('arr', $arr);
	}
	public function postAdd($id=null) {
		//dd($_POST); //dd в Ларавел вместо print_r . после dd выполняется exit
		$colvo=$_POST['colvo'];
		setcookie($id, $colvo, time()+3600,'/'); //id - имя куки, colvo - значение, time - 1 час, / - путь для хранения куки
		return redirect('cart');
	}
	public function getDelete($id=null) {
		setcookie($id,'',time()-3600,'/');
		return redirect('cart');
	}

}
