<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BayarIuran extends Model
{
    protected $table = 'bayar_iuran';
    protected $guarded = ['id'];
    use HasFactory;
}
