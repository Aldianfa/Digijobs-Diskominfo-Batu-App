<?php

namespace App\Http\Controllers;

use App\Models\Urusan;
use Illuminate\Http\Request;

class ProgramDropdownController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function __invoke(Request $request)
    // {
    //     $urusan = Urusan::findOrFail($request->id_urusan);
    //     $programFiltered = $urusan->programs->pluck('nama_program', 'id_program');
    //     return response()->json($programFiltered);
    // }

    public function programdropdown(Request $request)
    {
        $urusan = Urusan::findOrFail($request->id_urusan);
        $programFiltered = $urusan->programs->pluck('nama_program', 'id_program');
        return response()->json($programFiltered);
    }

    public function programdropdowndispo(Request $request)
    {
        $urusan = Urusan::findOrFail($request->id_urusan);
        $programFiltered = $urusan->programs->pluck('nama_program', 'id_program');
        return response()->json($programFiltered);
    }
}
