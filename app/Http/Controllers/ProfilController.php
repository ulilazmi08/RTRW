<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKeluarga;
use App\Models\RT;
use App\Models\User;
use App\Models\Profil;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;




class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $user = DB::table('users')->where('id', $id)->get();
        $profil = DB::table('profil')->where('user_id', $id)->get();
        return view('profil.index', [
            'tittle' => 'Profil',
            'users' => $user,
            'profils' => $profil
            // 'active' => 'login'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $id = DB::table('users')->get('id');
        $countid = count($id) + 1;  
        $rt = DB::table('rt')->get();
        return view('profil.create', [
            'tittle' => 'Buat Profil',
            'rt' => $rt,
            'no_keluargas' => $countid,
            // 'active' => 'login'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'no_keluarga' =>'required',
            'no_ktp' => 'required|min:16|unique:users',
            'email' => 'required|email| unique:users',
            'password' => 'required|min:6|max:255',
            'gender' => 'required|max:255',
            'alamat' => 'required|max:255',
            'status' => 'required|max:255',
            'nama_rt' => 'required|max:255',
            'tgl_lahir' => 'required',
            // 'nama_rt' => 'required',
            'pendidikan' => 'required|max:255',
            'agama' => 'required|max:255',
            'pekerjaan' => 'required|max:255',
            'no_kontak' => 'required|max:255',
            'no_rumah' => 'required|max:2'
        ]);

        $data = $request->all();
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->no_keluarga = $data['no_keluarga'];
        $user->rt_id = $data['nama_rt'];
        $user->role_keluarga = 1;
        $user->password = Hash::make($data['password']);
        $user->no_ktp = $data['no_ktp'];
        $user->role = 6;
        $user->save();

        $profil = new Profil;
        $profil->user_id = $user->id;
        $profil->rt_id = $data['nama_rt'];
        $profil->alamat = $data['alamat'];
        $profil->status = $data['status'];
        $profil->peran_keluarga = $data['peran_keluarga'];
        $profil->no_relasi_sebelum = $user->id;
        $profil->no_relasi_sesudah = $user->id;
        // $profil->image_ktp = $data['image_ktp'];
        $profil->gender = $data['gender'];
        $profil->tgl_lahir = $data['tgl_lahir'];
        $profil->pendidikan = $data['pendidikan'];
        $profil->agama = $data['agama'];
        $profil->pekerjaan = $data['pekerjaan'];
        $profil->no_kontak = $data['no_kontak'];
        $profil->no_rumah = $data['no_rumah'];
        $profil->save();
        return redirect('/profil')->with('success', 'Profil Sudah Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function uploadgambar(Request $request)
    {
        $request->validate([
            'image_ktp' => 'image|mimes:jpg,png|max:2048',
        ]);
        $data = $request->all();
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = \Carbon\Carbon::now()->format('d-m-Y') . '-' . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $data['image'] = $filename;

            $id = Auth::user()->id;
            $profil = Profil::where('user_id', $id)->firstOrFail();
            $profil->image_ktp = $filename;
            $profil->save();
        }
        return redirect('/profil')->with('success', 'Ktp Sudah Diupload');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editprofil()
    {
        $id = Auth::user()->id;
        $user = DB::table('users')->where('id', $id)->get();
        $profil = DB::table('profil')->where('user_id', $id)->get();
        $rt = DB::table('rt')->get();
        return view('profil.edit', [
            'tittle' => 'Edit Profil',
            'users' => $user,
            'profils' => $profil,
            'rt' => $rt
            // 'active' => 'login'
        ]);
    }
    public function show($id)
    {
        $user = DB::table('users')->where('id', $id)->get();
        $keluargauser = DB::table('users')->where('id', $id)->pluck('no_keluarga');
        $nokeluarga = DB::table('users')->where('id', $id)->pluck('no_keluarga')->first();
        $profil = DB::table('profil')->where('user_id', $id)->get();
        $rt = DB::table('rt')->get();
        $anggotakeluarga = DB::table('anggota_keluarga')->where('no_keluarga', $keluargauser)->get();
        $anggota = DB::table('rt')->get();
        return view('profil.show', [
            'tittle' => 'Profil User',
            'users' => $user,
            'profils' => $profil,
            'rt' => $rt,
            'nokeluarga' => $nokeluarga,
            'anggotakeluargas' => $anggotakeluarga,
            // 'active' => 'login'
        ]);
    }
    public function simpankeluarga(Request $request)
    {
        $request->validate([
            'no_keluarga' => 'required|max:255',
            'no_identitas' => 'required|max:16',
            'name' => 'required|min:16|unique:anggota_keluarga',
            'email' => 'required|min:6|max:255',
            // 'image' => 'required|max:255',
            'alamat' => 'required|max:255',
            'tgl_lahir' => 'required|max:255',
            'hubungan' => 'required|max:255',
            'pendidikan' => 'required|max:255',
            'nama_rt' => 'required|max:8',
            'gender' => 'required|max:255',
            'agama' => 'required|max:255',
            'pekerjaan' => 'required|max:255',
            'no_rumah' => 'required|max:255',
            'no_kontak' => 'required|max:255',
        ]);

        $data = $request->all();
        $user = new AnggotaKeluarga;
        $user->nama = $data['name'];
        $user->email = $data['email'];
        $user->no_identitas = $data['no_identitas'];    
        $user->role_keluarga = $data['no_keluarga'];
        // $user->image = $data['image'];
        $user->alamat = $data['alamat'];
        $user->tgl_lahir = $data['tgl_lahir'];
        $user->hubungan = $data['hubungan'];
        $user->gender = $data['gender'];
        $user->rt = $data['nama_rt'];
        $user->pendidikan = $data['pendidikan'];
        $user->agama = $data['agama'];
        $user->pekerjaan = $data['pekerjaan'];
        $user->no_rumah = $data['no_rumah'];
        $user->no_kontak = $data['no_kontak'];
        $user->save();
        return redirect('/daftarwarga')->with('success');

       
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateprofiluser(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'no_ktp' => 'required|min:16',
            'email' => 'required|email',
            'password' => 'required|min:6|max:255',
            'gender' => 'required|max:255',
            'alamat' => 'required|max:255',
            'status' => 'required|max:255',
            'nama_rt' => 'required|max:255',
            'tgl_lahir' => 'required',
            // 'nama_rt' => 'required',
            'pendidikan' => 'required|max:255',
            'agama' => 'required|max:255',
            'pekerjaan' => 'required|max:255',
            'no_kontak' => 'required|max:255',
            'no_rumah' => 'required|max:2'
        ]);
        $updateuser = User::find($id);
        $updateprofil = Profil::where('user_id', $id)->firstOrFail();
        $data = $request->all();
        $updateuser->name = $data['name'];
        $updateuser->email = $data['email'];
        $updateuser->password = Hash::make($data['password']);
        $updateuser->no_ktp = $data['no_ktp'];
        $updateprofil->rt_id = $data['nama_rt'];
        $updateprofil->alamat = $data['alamat'];
        $updateprofil->status = $data['status'];
        $updateprofil->peran_keluarga = $data['peran_keluarga'];
        $updateprofil->gender = $data['gender'];
        $updateprofil->tgl_lahir = $data['tgl_lahir'];
        $updateprofil->pendidikan = $data['pendidikan'];
        $updateprofil->agama = $data['agama'];
        $updateprofil->pekerjaan = $data['pekerjaan'];
        $updateprofil->no_kontak = $data['no_kontak'];
        $updateprofil->no_rumah = $data['no_rumah'];
        $updateuser->save();
        $updateprofil->save();
        return redirect('/profil')->with('success', 'Profil Sudah Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
