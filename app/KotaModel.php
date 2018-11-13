<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class KotaModel extends Model
{
   protected $table='kota';
   protected $primaryKey = 'idkota';

   public static function index()
   {
   		$data = DB::table("kota")->get();

   	 	return $data;
   }

   public function getIdProvinsi($id)
    {
        $data = DB::table("kota")->where("idprovinsi", $id)->get();
        
        return $data;
    }
}
