<?php

namespace App\Http\Controllers;

use App\Models\Klasifikasi;
use App\Models\NewUser;
use Illuminate\Http\Request;

class KlasifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = NewUser::all();
        $klasifikasi = Klasifikasi::all();
        return view('klasifikasi.klasifikasi', compact('klasifikasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('klasifikasi.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedKlasifikasi = $request->validate([
            'kode_klasifikasi' => 'required',
            'nama_klasifikasi' => 'required',
        ]);
            Klasifikasi::create($validatedKlasifikasi);
            return redirect('/klasifikasi')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Klasifikasi  $klasifikasi
     * @return \Illuminate\Http\Response
     */
    public function show(Klasifikasi $klasifikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Klasifikasi  $klasifikasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id_klasifikasi)
    {
        $klasifikasi = Klasifikasi::find($id_klasifikasi);
        return view('klasifikasi.edit', compact('klasifikasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Klasifikasi  $klasifikasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_klasifikasi)
    {
        $validatedKlasifikasi = $request->validate([
            'kode_klasifikasi' => 'required',
            'nama_klasifikasi' => 'required',
        ]);
        Klasifikasi::where('id_klasifikasi', $id_klasifikasi)->update($validatedKlasifikasi);
        return redirect('/klasifikasi')->with(['success' => 'Data Berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Klasifikasi  $klasifikasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id_klasifikasi)
    {
        $klasifikasi = Klasifikasi::find($id_klasifikasi);
        $klasifikasi->delete();
        return redirect('/klasifikasi')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
