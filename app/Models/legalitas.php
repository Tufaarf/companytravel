<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class legalitas extends Model
{
    protected $table = 'legalitas';
    protected $fillable = ['nama_legalitas', 'image'];
}
