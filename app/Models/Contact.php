<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // protected $table = 'nama_tabel'; untuk mendefinisikan model tersebut mewakili tabel apa
    protected $guarded = [];
    use HasFactory;
}
