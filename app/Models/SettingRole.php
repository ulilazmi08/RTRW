<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingRole extends Model
{
    protected $table = 'ketua';
    protected $guarded = ['id'];
    use HasFactory;
}
