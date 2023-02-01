<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iuran extends Model
{
    //nama tabel kalau custom
    protected $table = 'iuran';
    protected $guarded = ['id'];
    use HasFactory;
}
