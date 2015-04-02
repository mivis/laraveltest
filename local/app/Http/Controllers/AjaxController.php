<?php namespace App\Http\Controllers;

use DB;

class AjaxController extends Controller {

	public function getIndex()
	{
		$product = DB::table('products')->where('id','=',$_GET['id'])->first();
		echo 'Товар: '.$product->name.'<br>';
		echo '<img src="/media/images/'.$product->picturesmall.'">';
		
	}
	public function getBuy()
	{	
		setcookie($_GET['id'], $_GET['colvo'], time()+3600,'/');
		$cookies=\App::make('\App\Libs\Cookie')->get();
		$ids=\App::make('\App\Libs\Cookie')->get_db();
		$cookies[$_GET['id']] = $_GET['colvo'];
		$ids[] = $_GET['id'];
		$products=DB::table('products') -> whereIN('id',$ids) -> get();	
		return view('ajax') -> with('products',$products)
							-> with('cookies',$cookies);
		print_r($cookies);
	}

}
