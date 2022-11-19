<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    //nama tabel kalau custom
    protected $table = 'profil';
    protected $guarded = ['id'];
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rt()
    {
        return $this->hasMany(RT::class);
    }
}
