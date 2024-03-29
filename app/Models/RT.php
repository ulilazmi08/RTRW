<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RT extends Model
{
    use HasFactory;
    protected $table = 'rt';
    protected $guarded = ['id'];


    public function profil()
    {
        return $this->belongsTo(Profil::class);
    }
}
