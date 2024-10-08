<?php

namespace App\Http\Controllers;

use App\Models\SubProgram;
use App\Models\Urusan;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function indexx()
    {
        $subprogram = SubProgram::all();
        return view('subprogram.subprogram', compact('subprogram'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $program = Program::all();
        return view('program.program', compact('program'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $urusan = Urusan::all();
        return view('program.add', compact('urusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedProgram = $request->validate([
            'id_urusan' => 'required',
            // 'kode_program' => 'required',
            'nama_program' => 'required',
        ]);
        Program::create($validatedProgram);
        return redirect('/program')->with(['success' => 'Data Berhasil Disimpan'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id_program)
    {
            
            $urusan = Urusan::all();
            $program = Program::find($id_program);
            return view('program.edit', compact('program', 'urusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_program)
    {
        $validatedProgram = $request->validate([
            'id_urusan' => 'required',
            // 'kode_program' => 'required',
            'nama_program' => 'required',
        ]);
        Program::where('id_program', $id_program)->update($validatedProgram);
        return redirect('/program')->with(['success' => 'Data Berhasil Diupdate'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id_program)
    {
        Program::destroy($id_program);
        return redirect('/program')->with(['success' => 'Data Berhasil Dihapus'
        ]);
    }
}