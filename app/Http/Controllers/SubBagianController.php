<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use App\Models\SubBagian;
use Illuminate\Http\Request;

class SubBagianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subbagian = SubBagian::all();
        return view('subbagian.subbagian', compact('subbagian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bagian = Bagian::all();
        return view('subbagian.add', compact('bagian'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedSubBagian = $request->validate([
            'id_bagian' => 'required',
            'nama_sub_bagian' => 'required',
        ]);
        SubBagian::create($validatedSubBagian);
        return redirect('/subbagian')->with(['success' => 'Data Berhasil Disimpan'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubBagian  $subBagian
     * @return \Illuminate\Http\Response
     */
    public function show(SubBagian $subBagian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubBagian  $subBagian
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id_sub_bagian)
    {
        $bagian = Bagian::all();
        $subbagian = SubBagian::find($id_sub_bagian);
        return view('subbagian.edit', compact('subbagian', 'bagian')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubBagian  $subBagian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_sub_bagian)
    {
        $validatedSubBagian = $request->validate([
            'id_bagian' => 'required',
            'nama_sub_bagian' => 'required',
        ]);
        SubBagian::where('id_sub_bagian', $id_sub_bagian)->update($validatedSubBagian);
        return redirect('/subbagian')->with(['success' => 'Data Berhasil Disimpan'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubBagian  $subBagian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id_sub_bagian)
    {
        SubBagian::where('id_sub_bagian', $id_sub_bagian)->delete();
        return redirect('/subbagian')->with(['success' => 'Data Berhasil Dihapus'
        ]);
    }
}
