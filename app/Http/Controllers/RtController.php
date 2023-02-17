<?php

namespace App\Http\Controllers;

use App\Models\RT;

use Carbon\Carbon;
use App\Models\Iuran;
use App\Models\BayarIuran;
use App\Models\User;
use App\Models\Keuangan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Http\Request;

class RtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Auth::user()->role;
        $rts =  DB::table('rt')->get();
        return view('dashboard.setting-rt', [
            'tittle' => 'Setting RT',
            'rt' => $rts,
            'role'=>$role,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_rt' => 'required|max:10',

        ]);
        RT::create($validatedData);
        return redirect('/setting-rt')->with('success', 'RT Telah Ditambah');
    }
     public function uploadparaf(Request $request, $id)
    {
        $request->validate([
            'image_paraf' => 'image|mimes:jpg,png|max:2048',
        ]);
        $data = $request->all();
        if ($request->file('image')) {
            if ($request->oldParaf) {
                Storage::disk('public')->delete($request->oldParaf);
            }
            $file = $request->file('image');
            $filename = \Carbon\Carbon::now()->format('d-m-Y') . '-' . $file->getClientOriginalName();
            $file->move(public_path('public/Parafrt'), $filename);
            $data['image'] = $filename;
           
            $rt = RT::where('id', $id)->firstOrFail();
            $rt->paraf_rt = $filename;
            $rt->save();
        }
        return redirect('/setting-rt')->with('success', 'KK Sudah Diupload');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
