<?php

namespace App\Http\Controllers;

use App\Models\BidangKegiatan;
use App\Models\NewUser;
use App\Models\SubBagian;
use Illuminate\Http\Request;

class BidangKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = NewUser::all();
        $bidangkegiatan = BidangKegiatan::all();
        return view('bidangkegiatan.index', compact('bidangkegiatan', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = NewUser::all();
        $subbagians = SubBagian::all();
        return view('bidangkegiatan.add', compact('user', 'subbagians'));
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
            // 'nama_bidang_kegiatan' => 'required',
            'id_sub_bagian' => 'required',
            // 'deskripsi' => 'required',
            'id' => 'required',
        ]);
            BidangKegiatan::create($validatedData);
            return redirect('/bidangkegiatan')->with(['success' => 'Data Berhasil Disimpan'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BidangKegiatan  $bidangKegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(BidangKegiatan $bidangKegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BidangKegiatan  $bidangKegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id_bidang_kegiatan)
    {
        $bidangkegiatan = BidangKegiatan::find($id_bidang_kegiatan);
        $user = NewUser::all();
        return view('bidangkegiatan.edit', compact('bidangkegiatan', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BidangKegiatan  $bidangKegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_bidang_kegiatan)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'id_sub_bagian' => 'required',
            // 'nama_bidang_kegiatan' => 'required',
            // 'deskripsi' => 'required',
            
        ]);
            BidangKegiatan::where('id_bidang_kegiatan', $id_bidang_kegiatan)->update($validatedData);
            return redirect('/bidangkegiatan')->with(['success' => 'Data Berhasil Diupdate'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BidangKegiatan  $bidangKegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id_bidang_kegiatan)
    {
        BidangKegiatan::where('id_bidang_kegiatan', $id_bidang_kegiatan)->delete();
        return redirect('/bidangkegiatan')->with(['success' => 'Data Berhasil Dihapus'
    ]);
    }
}
