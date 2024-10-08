<?php

namespace App\Http\Controllers;

use App\Charts\NilaiKegiatanChart;
use App\Models\Skpd;
use App\Models\BidangKegiatan;
use App\Models\Indikator;
use App\Models\Urusan;
use App\Models\Jabatan;
use App\Models\Program;
use App\Models\Subprogram;
use App\Models\Surat;
use App\Models\Kegiatan;
use App\Models\Klasifikasi;
use App\Models\LogKegiatan;
use App\Models\NewUser;
use App\Models\SubKlasifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NilaiKegiatanChart $nilaiKegiatanChart)
    {
        $surat = Surat::all();
        $kegiatan = Kegiatan::where('inisiator', auth()->user()->nama)->get();
        $logkegiatan = LogKegiatan::where('inisiator', auth()->user()->nama)->get();
        $allkegiatan = $kegiatan->merge($logkegiatan);

        $nilaikegiatanchart = $nilaiKegiatanChart->build();

        return view('kegiatan.kegiatan', compact('kegiatan', 'surat', 'logkegiatan', 'allkegiatan', 'nilaikegiatanchart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suratmu = Surat::where('id', auth()->user()->id)->get();

        $urusan = Urusan::all();
        $program = Program::all();
        $subprogram = Subprogram::all();
        $newusers  = NewUser::all();
        $surat = Surat::all();
        $kegiatan = Kegiatan::all();
        $bidangkegiatan = BidangKegiatan::all();
        $indikator = Indikator::all();

        $idjabatan = auth()->user()->id_jabatan;
        // $listJabatan = Jabatan::where('id_sub_bagian', $idjabatan)->get()->value('id_jabatan');
        $listJabatan = Jabatan::where('id_sub_bagian', $idjabatan)->pluck('id_jabatan');
        $listuser = NewUser::whereIn('id_jabatan', $listJabatan)->get();

        return view('kegiatan.add', compact('kegiatan', 'surat', 'newusers', 'suratmu', 'urusan', 'program', 'subprogram', 'listuser', 'bidangkegiatan', 'indikator'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kegiatan  = new Kegiatan;
        $kegiatan->id_surat = $request->id_surat;
        $kegiatan->id_indikator = $request->id_indikator;
        $kegiatan->id = $request->id;
        $kegiatan->nama_kegiatan = $request->nama_kegiatan;
        $kegiatan->inisiator = $request->inisiator;
        $kegiatan->bidang = $request->bidang;
        $kegiatan->id_bidang_kegiatan = $request->id_bidang_kegiatan;
        $kegiatan->tanggal = $request->tanggal;
        $kegiatan->narasi = $request->narasi;
        $kegiatan->keterangan = $request->keterangan;
        
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/image/', $filename);
            $kegiatan->dokumentasi_1 = $filename;
        } else {
            return $request;
            $kegiatan->dokumentasi_1 = '';
        }

        if($request->hasFile('filesurat')){
            $file = $request->file('filesurat');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/surat/', $filename);
            $kegiatan->dokumentasi_2 = $filename;
        } else {
            // return $request;
            // $kegiatan->dokumentasi_2 = '';
            $kegiatan->dokumentasi_2 = null;

        }

        $kegiatan->save();
        return redirect('/kegiatan')->with(['success' => 'Data Berhasil Disimpan'
        ]);

        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show($id_kegiatan)
    {
        $kegiatan = Kegiatan::find($id_kegiatan);
        $surat = Surat::all();
        $user  = NewUser::all();
        $indikator = Indikator::all();
        return view('kegiatan.detail', compact('kegiatan', 'surat', 'user', 'indikator'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id_kegiatan)
    {
        $kegiatan = Kegiatan::find($id_kegiatan);
        $surat = Surat::all();
        $user  = NewUser::all();
        $indikator = Indikator::all();
        $bidangkegiatan = BidangKegiatan::all();

        $idjabatan = auth()->user()->id_jabatan;
        // $listJabatan = Jabatan::where('id_sub_bagian', $idjabatan)->get()->value('id_jabatan');
        $listJabatan = Jabatan::where('id_sub_bagian', $idjabatan)->pluck('id_jabatan');
        $listuser = NewUser::whereIn('id_jabatan', $listJabatan)->get();

        return view('kegiatan.edit', compact('kegiatan', 'surat', 'user', 'indikator', 'bidangkegiatan', 'listuser'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kegiatan)
    {
        $kegiatan = Kegiatan::find($id_kegiatan);
        $kegiatan->id_surat = $request->id_surat;
        $kegiatan->id_indikator = $request->id_indikator;
        $kegiatan->id = $request->id;
        $kegiatan->nama_kegiatan = $request->nama_kegiatan;
        $kegiatan->inisiator = $request->inisiator;
        $kegiatan->bidang = $request->bidang;
        $kegiatan->id_bidang_kegiatan = $request->id_bidang_kegiatan;
        $kegiatan->tanggal = $request->tanggal;
        $kegiatan->narasi = $request->narasi;
        $kegiatan->keterangan = $request->keterangan;
        
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/image/', $filename);
            $kegiatan->dokumentasi_1 = $filename;
        } else {
            return $request;
            $kegiatan->dokumentasi_1 = '';
        }

        if($request->hasFile('filesurat')){
            $file = $request->file('filesurat');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/surat/', $filename);
            $kegiatan->dokumentasi_2 = $filename;
        } else {
            // return $request;
            // $kegiatan->dokumentasi_2 = '';
            $kegiatan->dokumentasi_2 = null;

        }

        $kegiatan->save();
        return redirect('/updatekegiatan')->with(['kegiatansuccess' => 'Data Berhasil Diupdate!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id_kegiatan)
    {
        $kegiatan = Kegiatan::find($id_kegiatan);
        $kegiatan->delete();
        return redirect('/kegiatan')->with(['success' => 'Data Berhasil Dihapus!'
        ]);
    }


    public function createSurat(Request $request,$id_surat){
        $kegiatan = Kegiatan::where('id_surat', $id_surat)->get();
        $surat = Surat::where('id_surat', $id_surat)->get();
        $id_surat = $id_surat;
        $user  = NewUser::all();
        $bidangkegiatan = BidangKegiatan::all();

        // var perihal value is perihal from surat selected
        $perihal = Surat::where('id_surat', $id_surat)->value('perihal');
        $inisiator = Surat::where('id_surat', $id_surat)->value('inisiator');

        $subklasifikasi = Surat::where('id_surat', $id_surat)->value('id_sub_klasifikasi');
        $kodesubklasifikasi = SubKlasifikasi::where('id_sub_klasifikasi', $subklasifikasi)->value('kode_sub_klasifikasi');
        //id klasifikasi yang didapat dari kodesubklasifikasi
        // $kodeklasifikasi = SubKlasifikasi::where('id_sub_klasifikasi', $subklasifikasi)->value('id_klasifikasi');

        $kodeklasifikasi = Klasifikasi::where('id_klasifikasi', $subklasifikasi)->value('kode_klasifikasi');
        

        $nomorsurat = Surat::where('id_surat', $id_surat)->value('nomor_surat');

        $skpd = Surat::where('id_surat', $id_surat)->value('id_skpd');
        $namaskpd = Skpd::where('id_skpd', $skpd)->value('nama_skpd');


        $tanggalterima = Surat::where('id_surat', $id_surat)->value('tanggal_terima');
        $file_surat = Surat::where('id_surat', $id_surat)->value('file_surat');

        $newusers = NewUser::all();
        $idjabatan = auth()->user()->id_jabatan;
        $listJabatan = Jabatan::where('id_sub_bagian', $idjabatan)->get()->pluck('id_jabatan');
        $listuser = NewUser::whereIn('id_jabatan', $listJabatan)->get();

        return view('kegiatan.suratadd', compact( 'kegiatan', 'surat', 'user', 'id_surat', 'perihal', 'listuser', 'bidangkegiatan', 'inisiator', 'kodesubklasifikasi','kodeklasifikasi', 'nomorsurat', 'skpd', 'tanggalterima', 'file_surat', 'namaskpd', 'newusers'));
    }

    public function storeSurat(Request $request){

        $kegiatan  = new Kegiatan;
        $kegiatan->id_surat = $request->id_surat;
        $kegiatan->id_indikator = $request->id_indikator;
        $kegiatan->id = $request->id;
        $kegiatan->nama_kegiatan = $request->nama_kegiatan;
        $kegiatan->inisiator = $request->inisiator;
        $kegiatan->bidang = $request->bidang;
        $kegiatan->id_bidang_kegiatan = $request->id_bidang_kegiatan;
        $kegiatan->tanggal = $request->tanggal;
        $kegiatan->narasi = $request->narasi;
        $kegiatan->keterangan = $request->keterangan;
        
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/image/', $filename);
            $kegiatan->dokumentasi_1 = $filename;
        } else {
            return $request;
            $kegiatan->dokumentasi_1 = '';
        }

        if($request->hasFile('filesurat')){
            $file = $request->file('filesurat');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/surat/', $filename);
            $kegiatan->dokumentasi_2 = $filename;
        } else {
            // return $request;
            // $kegiatan->dokumentasi_2 = '';
            $kegiatan->dokumentasi_2 = null;

        }


        $kegiatan->save();
        return redirect('/kegiatan')->with(['success' => 'Data Berhasil Disimpan'
        ]);
    }

    //function to track log_kegiatan by id_kegiatan
    public function track($id_kegiatan)
    {
        $kegiatan = Kegiatan::find($id_kegiatan);
        $logkegiatan = LogKegiatan::where('id_kegiatan', $id_kegiatan)->get();

        // $allkegiatan = $kegiatan->merge($logkegiatan);
        //var where merge table kegiatan and log kegiatan where id_kegiatan = id_kegiatan to tracking
        // $allkegiatanmasuk = $kegiatan->merge($logkegiatan);
        // dd($logkegiatan);

        $surat = Surat::all();
        $user  = NewUser::all();
        $indikator = Indikator::all();
        $bidangkegiatan = BidangKegiatan::all();

        $idjabatan = auth()->user()->id_jabatan;
        $listJabatan = Jabatan::where('id_sub_bagian', $idjabatan)->pluck('id_jabatan');
        $listuser = NewUser::whereIn('id_jabatan', $listJabatan)->get();

        return view('kegiatan.track', compact('kegiatan', 'surat', 'user', 'indikator', 'bidangkegiatan', 'listuser', 'logkegiatan'));
    }
    
    public function updatekegiatan(){
        $surat = Surat::all();
        $kegiatan = Kegiatan::where('inisiator', auth()->user()->nama)->get();
        $logkegiatan = LogKegiatan::where('inisiator', auth()->user()->nama)->get();
        $allkegiatan = $kegiatan->merge($logkegiatan);
        return view('kegiatan.setting', compact('kegiatan', 'surat', 'logkegiatan', 'allkegiatan'));
    }
}
