<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\NewUser;
use App\Models\Indikator;
use App\Models\BidangKegiatan;
use App\Models\Jabatan;
use App\Models\Kegiatan;
use App\Models\LogKegiatan;
use Illuminate\Http\Request;

class LogKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //var where show table kegiatan and log kegiatan where id = id auth
        $kegiatan = Kegiatan::where('id', auth()->user()->id)->get();
        $logkegiatan = LogKegiatan::where('id', auth()->user()->id)->get();
        $allkegiatanmasuk = $kegiatan->merge($logkegiatan);

        // $track = LogKegiatan::where('id_kegiatan', $kegiatan->pluck('id_kegiatan'))->get();

        // $kegiatanlog = $allkegiatanmasuk->where('status', 'Belum Dibuka');
        return view('logkegiatan.index', compact('logkegiatan', 'kegiatan', 'allkegiatanmasuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $logKegiatan = new LogKegiatan;
        $logKegiatan->id_kegiatan = $request->id_kegiatan;
        $logKegiatan->id_surat = $request->id_surat;
        $logKegiatan->id = $request->id;
        $logKegiatan->inisiator = $request->inisiator;
        $logKegiatan->bidang = $request->bidang;
        $logKegiatan->tanggal_kegiatan = $request->tanggal_kegiatan;
        $logKegiatan->status = $request->status;
        $logKegiatan->keterangan = $request->keterangan;
        $logKegiatan->narasi = $request->narasi;
        $logKegiatan->id_indikator = $request->id_indikator;
        $logKegiatan->id_bidang_kegiatan = $request->id_bidang_kegiatan;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/image/', $filename);
            $logKegiatan->dokumentasi_1 = $filename;
        } else {
            return $request;
            $logKegiatan->dokumentasi_1 = '';
        }

        if($request->hasFile('filesurat')){
            $file = $request->file('filesurat');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/surat/', $filename);
            $logKegiatan->dokumentasi_2 = $filename;
        } else {
            // return $request;
            // $logKegiatan->dokumentasi_2 = '';
            $logKegiatan->dokumentasi_2 = null;
        }

        // dd($logKegiatan);


        $logKegiatan->save();
        return redirect('/kegiatan')->with(['success' => 'Data Berhasil Disimpan'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LogKegiatan  $logKegiatan
     * @return \Illuminate\Http\Response
     */
    public function show($id_kegiatan)
    {
        $kegiatan = Kegiatan::find($id_kegiatan);
        $logkegiatan = LogKegiatan::find($id_kegiatan);
        // $allkegiatan = $kegiatan->merge($logkegiatan);
        //var where merge table kegiatan and log kegiatan where id_kegiatan = id_kegiatan to tracking
        // $allkegiatanmasuk = $kegiatan->merge($logkegiatan);

        $surat = Surat::all();
        $user  = NewUser::all();
        $indikator = Indikator::all();
        $bidangkegiatan = BidangKegiatan::all();

        $idjabatan = auth()->user()->id_jabatan;
        $listJabatan = Jabatan::where('id_sub_bagian', $idjabatan)->pluck('id_jabatan');
        $listuser = NewUser::whereIn('id_jabatan', $listJabatan)->get();

        // $kegiatan = Kegiatan::where('id_kegiatan', $id_kegiatan)->get();
        // $logkegiatan = LogKegiatan::where('id_kegiatan', $id_kegiatan)->get();
        return view('logkegiatan.detail', compact('logkegiatan', 'kegiatan', 'surat', 'user','indikator', 'bidangkegiatan', 'listuser'));
    }

    public function showlog($id_log){
        $logkegiatan = LogKegiatan::find($id_log);
        $kegiatan = Kegiatan::find($id_log);
        $surat = Surat::all();
        $user  = NewUser::all();
        $indikator = Indikator::all();
        $bidangkegiatan = BidangKegiatan::all();

        $idjabatan = auth()->user()->id_jabatan;
        $listJabatan = Jabatan::where('id_sub_bagian', $idjabatan)->pluck('id_jabatan');
        $listuser = NewUser::whereIn('id_jabatan', $listJabatan)->get();

        return view('logkegiatan.show', compact('logkegiatan', 'kegiatan', 'surat', 'user','indikator', 'bidangkegiatan', 'listuser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LogKegiatan  $logKegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id_log)
    {
        $logkegiatan = LogKegiatan::find($id_log);
        $kegiatan = Kegiatan::find($id_log);
        $surat = Surat::all();
        $user  = NewUser::all();
        $indikator = Indikator::all();
        $bidangkegiatan = BidangKegiatan::all();

        $idjabatan = auth()->user()->id_jabatan;
        $listJabatan = Jabatan::where('id_sub_bagian', $idjabatan)->pluck('id_jabatan');
        $listuser = NewUser::whereIn('id_jabatan', $listJabatan)->get();

        return view('logkegiatan.edit', compact('logkegiatan', 'kegiatan', 'surat', 'user','indikator', 'bidangkegiatan', 'listuser'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LogKegiatan  $logKegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_log)
    {
        $logkegiatan = LogKegiatan::find($id_log);
        $logkegiatan->id_kegiatan = $request->id_kegiatan;
        $logkegiatan->id_surat = $request->id_surat;
        $logkegiatan->id = $request->id;
        $logkegiatan->inisiator = $request->inisiator;
        $logkegiatan->bidang = $request->bidang;
        $logkegiatan->tanggal_kegiatan = $request->tanggal_kegiatan;
        $logkegiatan->status = $request->status;
        $logkegiatan->keterangan = $request->keterangan;
        $logkegiatan->narasi = $request->narasi;
        $logkegiatan->id_indikator = $request->id_indikator;
        $logkegiatan->id_bidang_kegiatan = $request->id_bidang_kegiatan;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/image/', $filename);
            $logkegiatan->dokumentasi_1 = $filename;
        } else {
            return $request;
            $logkegiatan->dokumentasi_1 = '';
        }

        if($request->hasFile('filesurat')){
            $file = $request->file('filesurat');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/surat/', $filename);
            $logkegiatan->dokumentasi_2 = $filename;
        } else {
            // return $request;
            // $logkegiatan->dokumentasi_2 = '';
            $logkegiatan->dokumentasi_2 = null;

        }

        // dd($logkegiatan);
        $logkegiatan->save();
        return redirect('/updatekegiatan')->with(['success' => 'Data Berhasil Diupdate'
        ]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LogKegiatan  $logKegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(LogKegiatan $logKegiatan)
    {
        //
    }
}
