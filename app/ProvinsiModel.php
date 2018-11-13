<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class ProvinsiModel extends Model
{
   protected $table='provinsi';
   protected $primaryKey = 'idprovinsi';

   public static function index()
   {
   		$data = DB::table("provinsi")->get()->toArray();

   	 	return $data;
   }
}
