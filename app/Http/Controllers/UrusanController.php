<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Urusan;
use Illuminate\Http\Request;

class UrusanController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $urusan = Urusan::all();
        return view('urusan.urusan', compact('urusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('urusan.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedUrusan = $request->validate([
            'nama_urusan' => 'required',
            // 'deskripsi' => 'required',
        ]);
            Urusan::create($validatedUrusan);
            return redirect('/urusan')->with(['success' => 'Data Berhasil Disimpan'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Urusan  $urusan
     * @return \Illuminate\Http\Response
     */
    public function show(Urusan $urusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Urusan  $urusan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id_urusan)
    {
        $urusan = Urusan::find($id_urusan);
            return view('urusan.edit', compact('urusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Urusan  $urusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_urusan)
    {
        $validatedUrusan = $request->validate([
            'nama_urusan' => 'required',
            // 'deskripsi' => 'required',
        ]);
        Urusan::where('id_urusan', $id_urusan)
            ->update($validatedUrusan);
            return redirect('/urusan')->with('success', 'Urusan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Urusan  $urusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id_urusan)
    {
        $request = Urusan::destroy($id_urusan);
        return redirect('/urusan')->with('success', 'Jabatan berhasil dihapus!');
    }
}
