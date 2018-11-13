<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class UserModel extends Model
{
   protected $table='users';
   protected $primaryKey = 'id';

   public static function index()
   {
   		$data = DB::table("users")->get();

   	 	return $data;
   }
}
