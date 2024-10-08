<?php

namespace App\Http\Controllers;

use App\Models\Klasifikasi;
use App\Models\SubKlasifikasi;
use Illuminate\Http\Request;

class SubKlasifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $subklasifikasi = SubKlasifikasi::all();
        return view('subklasifikasi.subklasifikasi', compact('subklasifikasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $klasifikasi = Klasifikasi::all();
        return view('subklasifikasi.add', compact('klasifikasi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedSubKlasifikasi = $request->validate([
            'id_klasifikasi' => 'required',
            'kode_sub_klasifikasi' => 'required',
            'nama_sub_klasifikasi' => 'required',
        ]);
        SubKlasifikasi::create($validatedSubKlasifikasi);
        return redirect('/subklasifikasi')->with(['success' => 'Data Berhasil Disimpan'
        ]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubKlasifikasi  $subKlasifikasi
     * @return \Illuminate\Http\Response
     */
    public function show(SubKlasifikasi $subKlasifikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubKlasifikasi  $subKlasifikasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id_sub_klasifikasi)
    {
        $subklasifikasi = SubKlasifikasi::find($id_sub_klasifikasi);
        $klasifikasi = Klasifikasi::all();
        return view('subklasifikasi.edit', compact('subklasifikasi', 'klasifikasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubKlasifikasi  $subKlasifikasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_sub_Klasifikasi)
    {
        $validatedSubKlasifikasi = $request->validate([
            'id_klasifikasi' => 'required',
            'kode_sub_klasifikasi' => 'required',
            'nama_sub_klasifikasi' => 'required',
        ]);
        SubKlasifikasi::where('id_sub_klasifikasi',$id_sub_Klasifikasi)->update($validatedSubKlasifikasi);
        return redirect('/subklasifikasi')->with(['success' => 'Data Berhasil Disimpan'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubKlasifikasi  $subKlasifikasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id_sub_Klasifikasi)
    {
        SubKlasifikasi::where('id_sub_klasifikasi',$id_sub_Klasifikasi)->delete();
        return redirect('/subklasifikasi')->with(['success' => 'Data Berhasil Dihapus'
        ]);
    }

    public function userpage (){
        $subklasifikasi = SubKlasifikasi::all();
        return view('pengguna.dataklasifikasi', compact('subklasifikasi'));
    }
}
