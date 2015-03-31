<?php namespace App\Http\Controllers;

use DB;

class AjaxController extends Controller {

	public function getIndex()
	{
		$product = DB::table('products')->where('id','=',$_GET['id'])->first();
		echo 'Товар: '.$product->name.'<br>';
		echo '<img src="/media/images/'.$product->picturesmall.'">';
		
	}

}
