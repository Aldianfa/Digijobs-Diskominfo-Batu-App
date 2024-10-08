<?php

namespace App\Http\Controllers;

use App\Models\Urusan;
use App\Models\Bagian;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class BagianController extends Controller
{

   public function index()
   {
        //join jabata and bagian
        $bagian = Bagian::all();
        return view('bagian.bagian', compact('bagian'));


        // $bagian = Bagian::all();
        // return view('bagian.bagian', compact('bagian'));
   }

    public function show($id_bagian)
    {
         $bagian = Bagian::findOrFail($id_bagian);
         return view('bagian.detail', compact('bagian'));
    }

    public function create()
    {
        
        return view('bagian.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bagian' => 'required',
            // 'id_jabatan' => 'required',
            // 'deskripsi' => 'required',
        ]);

        Bagian::create($request->all());

        return redirect('/bagian')->with('success', 'Bagian berhasil ditambahkan!');
    }

    public function destroy(Request $request,$id_bagian)
    {
        $bagian = Bagian::destroy($id_bagian);
        return redirect('/bagian')->with('success', 'Bagian berhasil dihapus!');
    }

    public function edit(Request $request, $id_bagian)
    {
        // $jabatan = Jabatan::all();
        $bagian = Bagian::find($id_bagian);
        return view('bagian.edit', compact('bagian'));
    }

    public function update(Request $request, $id_bagian)
    {
        $request->validate([
            'nama_bagian' => 'required',
            // 'id_jabatan' => 'required',
            // 'deskripsi' => 'required',
        ]);

        $bagian = Bagian::find($id_bagian);
        $bagian->nama_bagian = $request->get('nama_bagian');
        // $bagian->id_jabatan = $request->get('id_jabatan');
        // $bagian->deskripsi = $request->get('deskripsi');
        $bagian->save();

        return redirect('/bagian')->with('success', 'Bagian berhasil diupdate!');
    }
}
