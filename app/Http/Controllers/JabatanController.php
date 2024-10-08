<?php

namespace App\Http\Controllers;

use App\Models\SubBagian;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan=Jabatan::all();
        return view('jabatan.jabatan',compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subbagian = SubBagian::all();
        return view('jabatan.add', compact('subbagian'));
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
            'jenis_jabatan' => 'required',
            'id_sub_bagian' => 'required',
            'nama_jabatan' => 'required',
            // 'deskripsi' => 'required',
        ]);
            Jabatan::create($validatedData);
            return redirect('/jabatan')->with(['success' => 'Data Berhasil Disimpan'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id_jabatan)
    {
            $subbagian = SubBagian::all();
            $jabatan = Jabatan::find($id_jabatan);
            return view('jabatan.edit', compact('jabatan', 'subbagian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_jabatan)
    {
            $validatedData = $request->validate([
                'jenis_jabatan' => 'required',
                'id_sub_bagian' => 'required',
                'nama_jabatan' => 'required',
                // 'deskripsi' => 'required',
            ]);
            Jabatan::where('id_jabatan', $id_jabatan)
            ->update($validatedData);
            return redirect('/jabatan')->with(['success' => 'Data Berhasil Disimpan'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id_jabatan)
    {
        // dd($id_jabatan);
        $request = Jabatan::destroy($id_jabatan);
        return redirect('/jabatan')->with('success', 'Jabatan berhasil dihapus!');
    }
}
