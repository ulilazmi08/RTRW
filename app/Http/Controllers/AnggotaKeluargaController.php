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


class AnggotaKeluargaController extends Controller
{
    public function simpankeluarga(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:anggota_keluarga',
            'email' => 'required|min:6|max:255',
            'no_identitas' => 'required|max:16',
            'gender' => 'required|max:255', 
            'tgl_lahir' => 'required|max:255',
            'agama' => 'required|max:255',
            'no_kontak' => 'required|max:255',
            'pendidikan' => 'required|max:255',
            'pekerjaan' => 'required|max:255',
            'hubungan' => 'required|max:255',
            'no_keluarga' => 'required|max:255',
            // 'image' => 'required|max:255',
            'alamat' => 'required|max:255',
            'nama_rt' => 'required|max:8',
            'no_rumah' => 'required|max:255',   
        ]);

        $data = $request->all();
        $user = new AnggotaKeluarga;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->no_identitas = $data['no_identitas'];    
        $user->no_keluarga = $data['no_keluarga'];
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
    public function destroy($id)
    {
        AnggotaKeluarga::destroy($id);
        return redirect('/daftarwarga')->with('success', 'Anggota Keluarga Sudah Dihapus');
    }
}
