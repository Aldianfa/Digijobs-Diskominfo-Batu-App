<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\SubProgram;
use Illuminate\Http\Request;

class SubProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //join program and subprogram
        $subprogram = SubProgram::all();
        // $program = Program::all();
        // $subprogram = SubProgram::join('programs', 'sub_programs.id_program', '=', 'programs.id_program')->get();

        // $count = $subprogram->count();
    
        return view('subprogram.subprogram', compact('subprogram'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $program = Program::all();
        $subprogram = SubProgram::all();
        return view('subprogram.add', compact('subprogram', 'program'));
        // return view('subprogram.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedSubProgram = $request->validate([
            'id_program' => 'required',
            'kode_sub_program' => 'required',
            'nama_sub_program' => 'required',
        ]);
        SubProgram::create($validatedSubProgram);
        return redirect('/subprogram')->with(['success' => 'Data Berhasil Disimpan'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubProgram  $subProgram
     * @return \Illuminate\Http\Response
     */
    public function show(SubProgram $subProgram)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubProgram  $subProgram
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id_sub_program)
    {
        $subprogram = SubProgram::find($id_sub_program);
        $program = Program::all();
        return view('subprogram.edit', compact('subprogram', 'program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubProgram  $subProgram
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_sub_program)
    {
        $validatedSubProgram = $request->validate([
            'id_program' => 'required',
            'kode_sub_program' => 'required',
            'nama_sub_program' => 'required',
        ]);
        SubProgram::where('id_sub_program', $id_sub_program)->update($validatedSubProgram);
        return redirect('/subprogram')->with(['success' => 'Data Berhasil Disimpan'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubProgram  $subProgram
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id_sub_program)
    {
        SubProgram::where('id_sub_program', $id_sub_program)->delete();
        return redirect('/subprogram')->with(['success' => 'Data Berhasil Dihapus'
        ]);
    }
}
