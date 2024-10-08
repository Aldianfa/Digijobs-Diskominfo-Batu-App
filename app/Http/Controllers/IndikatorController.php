<?php

namespace App\Http\Controllers;

use App\Models\Urusan;
use App\Models\Program;
use App\Models\Indikator;
use Illuminate\Http\Request;

class IndikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indikator = Indikator::all();
        return view("indikator.indikator",compact('indikator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $urusan=Urusan::all();
        $program=Program::all();

        return view('indikator.add',compact('urusan','program'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedIndikator = $request->validate([
            'id_program' => 'required',
            'nama_indikator' => 'required',
            
        ]);
        Indikator::create($validatedIndikator);
        return redirect('/indikator')->with(['success' => 'Data Berhasil Disimpan'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Indikator  $indikator
     * @return \Illuminate\Http\Response
     */
    public function show(Indikator $indikator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Indikator  $indikator
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id_indikator)
    {
        $indikator = Indikator::find($id_indikator);
        $urusan=Urusan::all();
        $program=Program::all();
        return view('indikator.edit', compact('indikator','urusan','program'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Indikator  $indikator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_indikator)
    {
        $validatedIndikator = $request->validate([
            'id_program' => 'required',
            'nama_indikator' => 'required',
            
        ]);
        Indikator::where('id_indikator',$id_indikator)->update($validatedIndikator);
        return redirect('/indikator')->with(['success' => 'Data Berhasil Disimpan'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Indikator  $indikator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id_indikator)
    {
        Indikator::where('id_indikator',$id_indikator)->delete();
        return redirect('/indikator')->with(['success' => 'Data Berhasil Dihapus'
        ]);
    }

}
