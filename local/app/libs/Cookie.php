<?php namespace App\Libs;

class Cookie {//должно совпадать с именем файла
	public $arr=array();
	public $dbarr=array();
	public function get(){
		foreach($_COOKIE as $key=>$value){
			$key=(int)$key;
			if($key>0){
				$this->arr[$key]=$value;
			}
		}
		return $this->arr;
	}
	public function get_db(){
		$db=$this->get();
		foreach($this->arr as $key=>$value){
			$this->db_arr[]=$key;
		}
		return $this->db_arr;
	}
}
?>