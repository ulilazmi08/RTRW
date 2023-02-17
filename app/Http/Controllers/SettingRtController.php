<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RT;
use App\Models\SettingRole;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Image;


class SettingRtController extends Controller
{
    public function index()
    {

    
        $id = Auth::user()->role;
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


        return view('ketua-rt.index', [
            'tittle' => 'Setting Role Ketua RT',
            // 'active' => 'login'
            'rt' => RT::all(),
            'role' => $id,
            'role2' => $role2,
            'role3' => $role3,
            'role4' => $role4,
            'role5' => $role5,
            'role6' => $role6,
            'role1' => $role1,
            'notadmin' => $notadmin,

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
    public function updaterolert($id, $rt_id)
    {
        // $ubahrole = DB::table('users')->where('id', $id)->get();
        $ubahrole =  User::find($id);
        $rolelogin = Auth::user()->role;
        $table_rt = RT::where('nama_rt', $rt_id)->pluck('id')->first();
        $tablert1 = RT::find($table_rt);
        if ($rolelogin == 1 || $rolelogin == 2) {
            $ubahrole->role = 3;
            $ubahrole->save();
        }
        $tablert1->ketua_id = $ubahrole->name;
        $tablert1->save();
        //kalau yang lagi login == 1, bisa ubah role menjadi 2
        return redirect('/setting-ketuart');
    }


    public function resetketua($id, $rt_id)
    {
        $tablert = RT::find($id);
        //mencari idnya dengan compare rt_id (ketua_id) dengan nama
        $ambilid = DB::table('users')->where('name', $rt_id)->pluck('id')->first();
        $resetketua = User::find($ambilid);
        $resetketua->role = 6;
        $tablert->ketua_id = null;
        $resetketua->save();
        $tablert->save();
        return redirect('/setting-ketuart');
    }
}
