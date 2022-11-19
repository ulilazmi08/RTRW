<?php
//Setting Role = Setting RW Role
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SettingRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SettingRoleController extends Controller
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

        // if ($id != "1") {
        //     abort(403);
        // }

        return view('setting-role-ketua-rw.index', [
            'tittle' => 'Setting Role',
            // 'active' => 'login'
            'ketua' => User::all(),
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function updaterole($id)
    {
        // $ubahrole = DB::table('users')->where('id', $id)->get();
        $ubahrole =  User::find($id);
        $rolelogin = Auth::user()->role;
        if ($rolelogin == 1) {
            $ubahrole->role = 2;
            $ubahrole->save();
        }

        //kalau yang lagi login == 1, bisa ubah role menjadi 2
        return redirect('/setting-ketuarw');
    }

    public function updaterole6($id)
    {
        // $ubahrole = DB::table('users')->where('id', $id)->get();
        $ubahrole =  User::find($id);
        $rolelogin = Auth::user()->role;
        if ($rolelogin == 1) {
            $ubahrole->role = 6;
            $ubahrole->save();
        }

        //kalau yang lagi login == 1, bisa ubah role menjadi 2
        return redirect('/setting-ketuarw');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
}
