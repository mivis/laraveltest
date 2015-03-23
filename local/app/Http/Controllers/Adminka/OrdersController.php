<?php namespace App\Http\Controllers\Adminka;

use Input; //для перехвата post данных
use DB;
use App\Http\Controllers\Controller;

class OrdersController extends Controller {
	public function __construct() {
		parent::__construct();
		$this->middleware('admin');
	}
	
	public function getIndex() {
		$products = DB::table('products')->select('name', 'price')->get();
		foreach ($products as $product){
			echo $product->name.'<br>';		
		}
		$orders=DB::table('zakazs') 	-> paginate(5);		
		return view('adminka.orders') -> with('orders',$orders);
	}
	public function postStatus($id=null) {
		$data=Input::all();
		$tovar=\App\zakazs::find($id);	
		$tovar->status=$data['status'];		
		$tovar->save();	
		//$data=Input::all();
		//DB::update('update zakazs set status="'.$data['status'].'" where id='.$id);
		return redirect('/adminka/orders');
	}
	public function getDelete ($id=null) {
		$tovar=\App\zakazs::find($id);		
		$tovar->delete();
		return redirect('/adminka/orders');
	}
}