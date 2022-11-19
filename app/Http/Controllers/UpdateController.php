<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RT;
use App\Models\User;
use App\Models\Profil;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UpdateController extends Controller
{
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
        $updateprofil = Profil::findOrFail($updateuser->user_id);
        // $validatedData = $request->validate($rules);
        // $data = $validatedData;
        // $validatedData['id'] = Auth::user()->id;

        $data = $request->all();
        $updateuser->name = $data['name'];
        $updateuser->email = $data['email'];
        $updateuser->password = Hash::make($data['password']);
        $updateuser->no_ktp = $data['no_ktp'];
        $updateuser->save();

        $updateprofil->rt_id = $data['nama_rt'];
        $updateprofil->alamat = $data['alamat'];
        $updateprofil->status = $data['status'];
        $updateprofil->peran_keluarga = $data['peran_keluarga'];
        // $updateprofil->no_relasi_sebelum = $user->id;
        // $updateprofil->no_relasi_sesudah = $user->id;
        // $profil->image_ktp = $data['image_ktp'];
        $updateprofil->gender = $data['gender'];
        $updateprofil->tgl_lahir = $data['tgl_lahir'];
        $updateprofil->pendidikan = $data['pendidikan'];
        $updateprofil->agama = $data['agama'];
        $updateprofil->pekerjaan = $data['pekerjaan'];
        $updateprofil->no_kontak = $data['no_kontak'];
        $updateprofil->no_rumah = $data['no_rumah'];
        $updateprofil->save();
        return redirect('/profil')->with('success', 'Profil Sudah Diupdate');
    }
}
