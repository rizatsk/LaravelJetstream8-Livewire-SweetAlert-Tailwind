<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SubCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $fillable = [
    // 	'idSubCategory', 'subCategory',
    // ];
    public static function kode()
    {
    	$kode = DB::table('sub_categories')->max('idSubCategory');
    	$addNol = '';
    	$kode = str_replace("SUB", "", $kode);
    	$kode = (int) $kode + 1;
        $incrementKode = $kode;

    	if (strlen($kode) == 1) {
    		$addNol = "000";
    	} elseif (strlen($kode) == 2) {
    		$addNol = "00";
    	} elseif (strlen($kode == 3)) {
    		$addNol = "0";
    	}

    	$kodeBaru = "SUB".$addNol.$incrementKode;
    	return $kodeBaru;
    }
    // protected $table = "jenis_potongan_gaji";
}
