<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $fillable = [
    // 	'idSubCategory', 'subCategory',
    // ];
    public static function idProduct()
    {
    	$kode = DB::table('products')->max('idProduct');
    	$addNol = '';
    	$kode = str_replace("PDC", "", $kode);
    	$kode = (int) $kode + 1;
        $incrementKode = $kode;

    	if (strlen($kode) == 1) {
    		$addNol = "000";
    	} elseif (strlen($kode) == 2) {
    		$addNol = "00";
    	} elseif (strlen($kode == 3)) {
    		$addNol = "0";
    	}

    	$kodeBaru = "PDC".$addNol.$incrementKode;
    	return $kodeBaru;
    }
    // protected $table = "jenis_potongan_gaji";
}
