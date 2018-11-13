<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ModelUtama extends Model
{
   protected $table;
   protected $primaryKey;

   public static function index()
   {
   	 $data = DB::table($table)->get();

   	 return $data;
   }
}
