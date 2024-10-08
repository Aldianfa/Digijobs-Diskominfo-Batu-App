<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Skpd;
use App\Models\Jabatan;
use App\Models\Klasifikasi;
use App\Models\NewUser;
use App\Models\Surat;
use App\Models\SubKlasifikasi;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $user = NewUser::all();
        $klasifikasi = Klasifikasi::all();
        $subklasifikasi = SubKlasifikasi::all();
        $surat = Surat::all();

        //if status surat = null, show span badge warning

        // surat where id = auth()->user()->id and order by time
        $suratkeluar = Surat::where('inisiator', auth()->user()->nama)->orderBy('created_at', 'desc')->get();

        // $suratmu = Surat::where('id', auth()->user()->id)->get();
        return view('surat.surat', compact('surat', 'subklasifikasi', 'user', 'klasifikasi', 'suratkeluar'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = NewUser::all();
        $klasifikasi = Klasifikasi::all();
        $subklasifikasi = SubKlasifikasi::all();
        $surat = Surat::all();
        $skpd = Skpd::all();

        $idjabatan = auth()->user()->id_jabatan;
        $listJabatan = Jabatan::where('id_sub_bagian', $idjabatan)->get()->pluck('id_jabatan');
        $listuser = NewUser::whereIn('id_jabatan', $listJabatan)->get();

        return view('surat.add', compact('surat', 'subklasifikasi', 'user', 'klasifikasi', 'idjabatan', 'listuser', 'skpd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $surat = new Surat;
        $surat->id_sub_klasifikasi = $request->id_sub_klasifikasi;
        $surat->nomor_surat = $request->nomor_surat;
        $surat->id_skpd = $request->id_skpd;
        $surat->inisiator = $request->inisiator;
        $surat->status_surat = $request->status_surat;
        $surat->id = $request->id;
        $surat->tanggal_terima = $request->tanggal_terima;
        $surat->perihal = $request->perihal;

        if ($request->hasFile('filesurat')) {
            $file = $request->file('filesurat');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/surat/', $filename);
            $surat->file_surat = $filename;
        } else {
            return $request;
            $surat->file_surat = '';
        }

        $surat->save();
        return redirect('/dasarsurat')->with('success', 'Data Surat Berhasil Ditambahkan!');

        // return $request -> file('filesurat')->store('surat');

        // $validatedSurat = $request->validate([
        //     'id_sub_klasifikasi' => 'required',
        //     'id' => 'required',
        //     'tanggal_terima' => 'required',
        //     'perihal' => 'required',
        //     'file_surat' => 'required',
        // ]);
        // Surat::create($validatedSurat);
        // return redirect('/dasarsurat/tambah')->with(['success' => 'Data Berhasil Disimpan'
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function show(Surat $surat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id_surat)
    {
        $surat = Surat::find($id_surat);
        $user = NewUser::all();
        $klasifikasi = Klasifikasi::all();
        $skpd = Skpd::all();
        $subklasifikasi = SubKlasifikasi::all();
        return view('surat.edit', compact('surat', 'subklasifikasi', 'user', 'klasifikasi', 'skpd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_surat)
    {
        //update data surat
        $surat = Surat::find($id_surat);
        $surat->id_sub_klasifikasi = $request->id_sub_klasifikasi;
        $surat->nomor_surat = $request->nomor_surat;
        $surat->id_skpd = $request->id_skpd;
        $surat->inisiator = $request->inisiator;
        $surat -> status_surat = $request->status_surat;
        $surat->id = $request->id;
        $surat->tanggal_terima = $request->tanggal_terima;
        $surat->perihal = $request->perihal;

        if ($request->hasFile('filesurat')) {
            $file = $request->file('filesurat');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/surat/', $filename);
            $surat->file_surat = $filename;
        } else {
            return $request;
            $surat->file_surat = '';
        }

        $surat->save();
        return redirect('/dasarsurat')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id_surat)
    {
        $surat = Surat::find($id_surat);
        $surat->delete();
        return redirect('/dasarsurat')->with('success', 'Data Berhasil Dihapus');
    }

    public function suratmasuk()
    {
        //kegiatan where id_surat not null
        $kegiatan = Kegiatan::whereNotNull('id_surat')->get();

        $user = NewUser::all();
        $klasifikasi = Klasifikasi::all();
        $subklasifikasi = SubKlasifikasi::all();
        $surat = Surat::all()->sortByDesc('created_at');

        // surat where id = auth()->user()->id and order by time
        $suratmu = Surat::where('id', auth()->user()->id)->orderBy('created_at', 'desc')->get();

        // $suratmu = Surat::where('id', auth()->user()->id)->get();
        return view('surat.suratmasuk', compact('surat', 'subklasifikasi', 'user', 'klasifikasi', 'suratmu', 'kegiatan'));
    }

}
