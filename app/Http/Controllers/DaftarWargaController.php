<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RT;
use App\Models\User;
use App\Models\Profil;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DaftarWargaController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $role = Auth::user()->role;
        $no_rt = Profil::where('user_id', $id)->pluck('rt_id');
        $warga = DB::table('users')->where('rt_id', $no_rt)->where('role', '=', 6)->orWhere('role', '=', 5)->orWhere('role', '=', 4)->get();
        // $rtsama = DB::table('profil')->where('rt_id', $no_rt)->pluck('user_id');
        // $warga = collect();
        // for ($i=0; $i < count($rtsama) ; $i++) { 
        //     $wargart = DB::table('profil')->where('user_id', $roleswarga[$i])->get();
        //     $warga->push($wargart[0]);            
        // }
        // $warga1 = $warga->where($warga[0]->rt_id , $no_rt)->pluck('user_id');
        // dd($warga1);
        // if ($id != "3") {
        //     abort(403);
        // }

        return view('daftarwargas.index', [
            'tittle' => 'Daftar Warga',
            'role' => $role,
            'rt' => RT::all(),
            'no_rt' => $no_rt,
            'wargas'=> $warga,
        
        ]);
    }

    public function admins()
    {
        $id = Auth::user()->id;
        $role = Auth::user()->role;
        $no_rt = Profil::where('user_id', $id)->pluck('rt_id');
        $warga = DB::table('users')->where('role', '=', 6)->orWhere('role', '=', 5)->orWhere('role', '=', 4)->get();

        return view('daftarwargas.admins', [
            'tittle' => 'Daftar Warga',
            'role' => $role,
            'rt' => RT::all(),
            'no_rt' => $no_rt,
            'wargas'=> $warga,
        
        ]);
    }

    public function updatebendahara($id)
    {
        // $ubahrole = DB::table('users')->where('id', $id)->get();
        $ubahrole =  User::find($id);
        $rolelogin = Auth::user()->role;
        if ($rolelogin == 3 || $rolelogin == 1) {
            $ubahrole->role = 4;
            $ubahrole->save();
        }
        

        //kalau yang lagi login == 1, bisa ubah role menjadi 2
        return redirect('/daftarwarga');
    }

    public function updatesekretaris($id)
    {
        // $ubahrole = DB::table('users')->where('id', $id)->get();
        $ubahrole =  User::find($id);
        $rolelogin = Auth::user()->role;
        if ($rolelogin == 3) {
            $ubahrole->role = 5;
            $ubahrole->save();
        }

        //kalau yang lagi login == 1, bisa ubah role menjadi 2
        return redirect('/daftarwarga');
    }
    public function reset($id)
    {
        $ubahrole =  User::find($id);        
        $ubahrole->role = 6;
        $ubahrole->save();
    
        //kalau yang lagi login == 1, bisa ubah role menjadi 2
        return redirect('/daftarwarga');
    }
}
