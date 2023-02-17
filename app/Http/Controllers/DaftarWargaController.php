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
        $warga = DB::table('users')->where('rt_id', $no_rt)->where('role', '=', 6)->orWhere('role', '=', 5)->orWhere('role', '=', 4)->paginate(5);
       
        if ($role != "3" && $role != "5") {
            abort(403);
        }

        return view('daftarwargas.index', [
            'tittle' => 'Daftar Warga',
            'role' => $role,
            'rt' => RT::all(),
            'no_rt' => $no_rt,
            'wargas'=> $warga,
        
        ]);
    }
    public function cariwarga(Request $request)
    {
        $id = Auth::user()->id;
        $role = Auth::user()->role;
        $no_rt = Profil::where('user_id', $id)->pluck('rt_id');
        $warga = DB::table('users')->where('rt_id', $no_rt)->where('role', '=', 6)->orWhere('role', '=', 5)->orWhere('role', '=', 4)->get();
        $cari = $request->searchwarga;
        $searchwargas = DB::table('users')->where('rt_id', $no_rt)->where('name','like',"%".$cari."%")->where('role', '=', 6)->orWhere('role', '=', 5)->orWhere('role', '=', 4)->paginate(5);
        $warga =  $searchwargas;
            // mengirim data pegawai ke view index
        return view('daftarwargas.index',[ 
            'tittle' => 'Daftar Warga',
            'role' => $role,
            'rt' => RT::all(),
            'no_rt' => $no_rt,
            'wargas'=> $warga,
    ]);
    }
    public function cariwargarw(Request $request)
    {
        $id = Auth::user()->id;
        $role = Auth::user()->role;
        $no_rt = Profil::where('user_id', $id)->pluck('rt_id');
        $warga = DB::table('users')->where('role', '!=', 2)->paginate(5);
        $cari = $request->searchwarga;
        $searchwargas = DB::table('users')->where('name','like',"%".$cari."%")->where('role', '=', 6)->orWhere('role', '=', 5)->orWhere('role', '=', 4)->where('rt_id', $no_rt)->paginate(5);
        $warga =  $searchwargas;
            // mengirim data pegawai ke view index
        return view('daftarwargas.admins',[ 
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
        $warga = DB::table('users')->where('role', '!=', 2)->paginate(5);
       
        if ($role != "1"  && $role != "2") {
            abort(403);
        }

        return view('daftarwargas.admins', [
            'tittle' => 'Daftar Warga RW',
            'role' => $role,
            'rt' => RT::all(),
            'wargas'=> $warga,
        
        ]);
    }

    public function updatebendahara($id)
    {
        $ubahrole =  User::find($id);
        $rolelogin = Auth::user()->role;
        if ($rolelogin == 3 || $rolelogin == 1 || $rolelogin == 2) {
            $ubahrole->role = 4;
            $ubahrole->role_keluarga = 2;
            $ubahrole->save();
        }

        //kalau yang lagi login == 1, bisa ubah role menjadi 2
        return redirect('/daftarwarga')->with('success', 'Warga Sudah Menjadi Bendahara');
    }
    public function updatebendahararw($id)
    {
        $ubahrole =  User::find($id);
        $rolelogin = Auth::user()->role;
        if ($rolelogin == 3 || $rolelogin == 1 || $rolelogin == 2) {
            $ubahrole->role = 7;
            $ubahrole->role_keluarga = 2;
            $ubahrole->save();
        }

        //kalau yang lagi login == 1, bisa ubah role menjadi 2
        return redirect('/daftarwargaadmin')->with('success', 'Warga Sudah Menjadi Bendahara');
    }

    public function updatesekretaris($id)
    {
        $ubahrole =  User::find($id);
        $rolelogin = Auth::user()->role;
        if ($rolelogin == 3 || $rolelogin == 1 || $rolelogin == 2) {
            $ubahrole->role = 5;
            $ubahrole->role_keluarga = 2;
            $ubahrole->save();
        }

        //kalau yang lagi login == 1, bisa ubah role menjadi 2
        return redirect('/daftarwarga')->with('success', 'Warga Sudah Menjadi Sekretaris');
    }
    public function updatesekretarisrw($id)
    {
        $ubahrole =  User::find($id);
        $rolelogin = Auth::user()->role;
        if ($rolelogin == 3 || $rolelogin == 1 || $rolelogin == 2) {
            $ubahrole->role = 8;
            $ubahrole->role_keluarga = 2;
            $ubahrole->save();
        }

        return redirect('/daftarwargaadmin')->with('success', 'Warga Sudah Menjadi Sekretaris');
    }
    public function reset($id)
    {
        $ubahrole =  User::find($id);        
        $ubahrole->role = 6;
        $ubahrole->role_keluarga = 1;
        $ubahrole->save();
    
        return redirect('/daftarwarga')->with('success', 'Role diubah menjadi warga');
    }
    public function resetwargarw($id)
    {
        $ubahrole =  User::find($id);        
        $ubahrole->role = 6;
        $ubahrole->role_keluarga = 1;
        $ubahrole->save();
    
        //kalau yang lagi login == 1, bisa ubah role menjadi 2
        return redirect('/daftarwargaadmin')->with('success', 'Role diubah menjadi warga');
    }
    public function destroy($id)
    {
        // $suratid = Surat::find($id);
        User::destroy($id);
        DB::table('profil')->where('user_id', $id)->delete();
        return redirect('/daftarwarga')->with('success', 'Warga Sudah Dihapus');
    }
    public function destroyasrw($id)
    {
        // $suratid = Surat::find($id);
        User::destroy($id);
        DB::table('profil')->where('user_id', $id)->delete();
        return redirect('/daftarwargaadmin')->with('success', 'Warga Sudah Dihapus');
    }
}
