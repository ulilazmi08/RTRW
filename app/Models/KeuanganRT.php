<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeuanganRT extends Model
{
    protected $table = 'keuangan_rt';
    protected $guarded = ['id'];    
    use HasFactory;
}
