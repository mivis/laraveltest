<?php namespace App\Http\Controllers;

use DB;

class BaseController extends Controller {
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
	{
		$tovars=DB::table('products') 	-> where ('vip','=',1)
										-> paginate(2);	//-> get()получить все, -> first () //-> first()получить текущую запись, ->paginate()
		return view('home')	->with('tovars',$tovars) //1ый 'tovars' - имя в вьюшке
							->with('vip','1');
		
	}
	public function addProducts()
	{
		DB::table('products')->insert (array(	'name'=>'Товар',
												'body'=>'Описание',
												'picture'=>'',
												'picturesmall'=>'',
												'showhide'=>'show',
												'price'=>'1000р',
												'catid'=>'1',
												'vip'=>'1',
												'created_at'=>date('y-m-d h:i:s'),
												'updated_at'=>date('y-m-d h:i:s')
											)
										);
		return redirect('/');
	}

}
