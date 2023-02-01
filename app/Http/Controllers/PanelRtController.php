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

        // role 1 = admin
        // role 2 = ketua RW
        // role 3 = ketua RT
        // role 4 = sekretaris
        // role 5 = bendahara 
        // role 6 = warga
        $id = Auth::user()->role;
        $authuser = Auth::user()->id;
        $get_rt = DB::table('profil')->where('user_id', $authuser)->pluck('rt_id')->first(); //object
        $getall = Profil::where('rt_id', $get_rt)->get(); //array
        $getid = Profil::where('rt_id', $get_rt)->pluck('user_id'); //array
        $countid = count($getid);
        $arraynama = [];
        $count = 0;
        for ($count = 0; $count < $countid; $count++) {
            $getusername = User::where('id', $getid[$count])->pluck('name')->first();
            $arraynama[] = $getusername;
        }

        $role1 = DB::table('users')->where('role', 1)->get();
        $role2 = DB::table('users')->where('role', 2)->get();
        $role3 = DB::table('users')->where('role', 3)->get();
        $role4 = DB::table('users')->where('role', 4)->get();
        $role5 = DB::table('users')->where('role', 5)->get();
        $role6 = DB::table('users')->where('role', 6)->get();
        $notadmin = DB::table('users')->where('role', '>', 1)->get();


        $count1 = count($role1);
        $count2 = count($role2);
        $count3 = count($role3);
        $count4 = count($role4);
        $count5 = count($role5);
        $count6 = count($role6);


        return view('panelrt.index', [
            'tittle' => 'Setting Role',
            // 'active' => 'login'
            'role' => $id,
            'rt' => RT::all(),
            'users' => User::all(),
            'role2' => $role2,
            'role3' => $role3,
            'role4' => $role4,
            'role5' => $role5,
            'role6' => $role6,
            'role1' => $role1,
            'notadmin' => $notadmin,
            'getall' => $getall,
            'arraynama' => $arraynama,

            // count untuk ngitung ada tidakna role
            'count1' => $count1,
            'count2' => $count2,
            'count3' => $count3,
            'count4' => $count4,
            'count5' => $count5,
            'count6' => $count6
            // 'rw' => $rw
        ]);
    }

    public function updaterolebendahara()
    {
    }
}
