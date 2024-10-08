<?php

namespace App\Http\Controllers;

use App\Models\Skpd;
use Illuminate\Http\Request;

class SkpdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skpd = Skpd::all();
        return view('skpd.skpd', compact('skpd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skpd.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_skpd' => 'required',
        ]);

        Skpd::create($request->all());

        return redirect('/skpd')->with('success', 'Bagian berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skpd  $skpd
     * @return \Illuminate\Http\Response
     */
    public function show($id_skpd)
    {
        $skpd = Skpd::findOrFail($id_skpd);
        return view('skpd.detail', compact('skpd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skpd  $skpd
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id_skpd)
    {
        $skpd = Skpd::find($id_skpd);
        return view('skpd.edit', compact('skpd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skpd  $skpd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_skpd)
    {
        $request->validate([
            'nama_skpd' => 'required',
        ]);

        Skpd::where('id_skpd', $id_skpd)
            ->update([
                'nama_skpd' => $request->nama_skpd,
            ]);
        return redirect('/skpd')->with('success', 'SKPD berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skpd  $skpd
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id_skpd)
    {
        $skpd = Skpd::destroy($id_skpd);
        return redirect('/skpd')->with('success', 'SKPD berhasil dihapus!');
    }
    
}
