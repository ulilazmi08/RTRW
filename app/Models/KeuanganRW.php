<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeuanganRW extends Model
{
    protected $table = 'keuangan_rw';
    protected $guarded = ['id'];    
    use HasFactory;
}
