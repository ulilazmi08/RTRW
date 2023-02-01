<?php

namespace App\Http\Controllers;


use App\Models\RT;
use App\Models\User;
use App\Models\Profil;

use App\Models\SettingRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PanelRtController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        $id = Auth::user()->id;
        $role = Auth::user()->role;
        $no_rt = Profil::where('user_id', $id)->pluck('rt_id');
        if ($role != "1" && $role != "2" && $role != "3" && $role != "4" && $role != "5" && $role != "7" && $role != "8") {
            abort(403);
        }
        return view('panelrt.index', [
            'tittle' => 'Panel Pengurus RW',
            // 'active' => 'login'
            'rt' => RT::all(),
            'users' => User::all(),
            'userrole' => $role,
        ]);
    }
}
