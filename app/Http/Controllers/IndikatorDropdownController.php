<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class IndikatorDropdownController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function __invoke(Request $request)
    // {
    //     //
    // }

    public function indikatordropdown(Request $request)
    {
        $program = Program::findOrFail($request -> id_program);
        $indikatorFiltered = $program->indikators->pluck('nama_indikator', 'id_indikator');
        return response()->json($indikatorFiltered);
    }

    public function indikatordropdowndispo(Request $request)
    {
        $program = Program::findOrFail($request -> id_program);
        $indikatorFiltered = $program->indikators->pluck('nama_indikator', 'id_indikator');
        return response()->json($indikatorFiltered);
    }

}
