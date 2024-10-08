<?php

use App\Http\Controllers\ModalController;
use App\Http\Controllers\BidangKegiatanController;
use App\Http\Controllers\SubBagianController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\SubKlasifikasiController;
use App\Http\Controllers\KlasifikasiController;
use App\Http\Controllers\SubProgramController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminSuratController;
use App\Http\Controllers\BagianController;
use App\Http\Controllers\IndikatorDropdownController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\LogKegiatanController;
use App\Http\Controllers\NewUserController;
use App\Http\Controllers\PejabatController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProgramDropdownController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\SkpdController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UrusanController;
use App\Models\Bagian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/welcome', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('login');
// });
Route::get('/',[SesiController::class, 'awal']);

Route::get('/login',[SesiController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[SesiController::class, 'login']);
Route::post('/logout',[SesiController::class, 'logout']);


Route::get('/admin',[AdminController::class, 'index'])->name('admin');
Route::get('/user',[SesiController::class, 'userPage'])->name('user');
Route::get('/pejabat',[SesiController::class, 'pejabatPage'])->name('pejabat');
Route::get('/userdashboard',[SesiController::class, 'userdashboard'])->name('userdashboard');



Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store']);

Route::get('/pegawai',[NewUserController::class, 'index'])->name('user.index');
Route::get('/tambahpegawai',[NewUserController::class, 'create'])->name('user.create');
Route::post('/pegawai/tambah',[NewUserController::class, 'store'])->name('user.store');
Route::delete('/pegawai/hapus/{id}',[NewUserController::class, 'destroy'])->name('user.destroy');
Route::get('/pegawai/{id}/edit/',[NewUserController::class, 'edit'])->name('user.edit');
Route::put('/pegawai/{id}/update/',[NewUserController::class, 'update'])->name('user.update');
Route::get('/pegawai/{id}/show/',[NewUserController::class, 'show'])->name('user.show');

Route::get('/jabatan',[JabatanController::class, 'index']);
Route::get('/jabatan/tambah',[JabatanController::class, 'create'])->name('jabatan.create');
Route::post('/jabatan/tambah',[JabatanController::class, 'store'])->name('jabatan.store');
Route::delete('/jabatan/hapus/{id_jabatan}',[JabatanController::class, 'destroy'])->name('jabatan.destroy');
Route::get('/jabatan/edit/{id_jabatan}',[JabatanController::class, 'edit'])->name('jabatan.edit');
Route::put('/jabatan/update/{id_jabatan}',[JabatanController::class, 'update'])->name('jabatan.update');

Route::get('/bagian',[BagianController::class, 'index']);
Route::get('/bagian/show/{id_bagian}',[BagianController::class, 'show'])->name('bagian.show');
Route::get('/bagian/tambah',[BagianController::class, 'create'])->name('bagian.create');
Route::post('/bagian/tambah',[BagianController::class, 'store'])->name('bagian.store');
Route::delete ('/bagian/hapus/{id_bagian}',[BagianController::class, 'destroy'])->name('bagian.destroy');
Route::get('/bagian/edit/{id_bagian}',[BagianController::class, 'edit'])->name('bagian.edit');
Route::put('/bagian/update/{id_bagian}',[BagianController::class, 'update'])->name('bagian.update');

Route::get('/subbagian',[SubBagianController::class, 'index']);
Route::get('/subbagian/tambah',[SubBagianController::class, 'create'])->name('subbagian.create');
Route::post('/subbagian/tambah',[SubBagianController::class, 'store'])->name('subbagian.store');
Route::delete('/subbagian/hapus/{id_sub_bagian}',[SubBagianController::class, 'destroy'])->name('subbagian.destroy');
Route::get('/subbagian/edit/{id_sub_bagian}',[SubBagianController::class, 'edit'])->name('subbagian.edit');
Route::put('/subbagian/update/{id_sub_bagian}',[SubBagianController::class, 'update'])->name('subbagian.update');

Route::get('/urusan',[UrusanController::class, 'index']);
Route::get('/urusan/tambah',[UrusanController::class, 'create'])->name('urusan.create');
Route::post('/urusan/tambah',[UrusanController::class, 'store'])->name('urusan.store');
Route::delete('/urusan/hapus/{id_urusan}',[UrusanController::class, 'destroy'])->name('urusan.destroy');
Route::get('/urusan/edit/{id_urusan}',[UrusanController::class, 'edit'])->name('urusan.edit');
Route::put('/urusan/update/{id_urusan}',[UrusanController::class, 'update'])->name('urusan.update');

Route::get('/program',[ProgramController::class, 'index']);
Route::get('/program/tambah',[ProgramController::class, 'create'])->name('program.create');
Route::post('/program/tambah',[ProgramController::class, 'store'])->name('program.store');
Route::get('/program/edit/{id_program}',[ProgramController::class, 'edit'])->name('program.edit');
Route::put('/program/update/{id_program}',[ProgramController::class, 'update'])->name('program.update');
Route::delete('/program/hapus/{id_program}',[ProgramController::class, 'destroy'])->name('program.destroy');

Route::get('/subprogram',[SubProgramController::class, 'index']);
Route::get('/subprogram/tambah',[SubProgramController::class, 'create'])->name('subprogram.create');
Route::post('/subprogram/tambah',[SubProgramController::class, 'store'])->name('subprogram.store');
Route::get('/subprogram/edit/{id_sub_program}',[SubProgramController::class, 'edit'])->name('subprogram.edit');
Route::put('/subprogram/update/{id_sub_program}',[SubProgramController::class, 'update'])->name('subprogram.update');
Route::delete('/subprogram/hapus/{id_sub_program}',[SubProgramController::class, 'destroy'])->name('subprogram.destroy');

Route::get('/klasifikasi',[KlasifikasiController::class, 'index']);
Route::get('/klasifikasi/tambah',[KlasifikasiController::class, 'create'])->name('klasifikasi.create');
Route::post('/klasifikasi/tambah',[KlasifikasiController::class, 'store'])->name('klasifikasi.store');
Route::get('/klasifikasi/edit/{id_klasifikasi}',[KlasifikasiController::class, 'edit'])->name('klasifikasi.edit');
Route::put('/klasifikasi/update/{id_klasifikasi}',[KlasifikasiController::class, 'update'])->name('klasifikasi.update');
Route::delete('/klasifikasi/hapus/{id_klasifikasi}',[KlasifikasiController::class, 'destroy'])->name('klasifikasi.destroy');

Route::get('/subklasifikasi',[SubKlasifikasiController::class, 'index']);
Route::get('/subklasifikasi/tambah',[SubKlasifikasiController::class, 'create'])->name('subklasifikasi.create');
Route::post('/subklasifikasi/tambah',[SubKlasifikasiController::class, 'store'])->name('subklasifikasi.store');
Route::get('/subklasifikasi/edit/{id_sub_klasifikasi}',[SubKlasifikasiController::class, 'edit'])->name('subklasifikasi.edit');
Route::put('/subklasifikasi/update/{id_sub_klasifikasi}',[SubKlasifikasiController::class, 'update'])->name('subklasifikasi.update');
Route::delete('/subklasifikasi/hapus/{id_sub_klasifikasi}',[SubKlasifikasiController::class, 'destroy'])->name('subklasifikasi.destroy');

Route::get('/indikator',[IndikatorController::class, 'index']);
Route::get('/indikator/tambah',[IndikatorController::class, 'create'])->name('indikator.create');
Route::post('/indikator/tambah',[IndikatorController::class, 'store'])->name('indikator.store');
Route::get('/indikator/edit/{id_indikator}',[IndikatorController::class, 'edit'])->name('indikator.edit');
Route::put('/indikator/update/{id_indikator}',[IndikatorController::class, 'update'])->name('indikator.update');
Route::delete('/indikator/hapus/{id_indikator}',[IndikatorController::class, 'destroy'])->name('indikator.destroy');

Route::get('/adminDasarsurat',[AdminSuratController::class, 'index']);
Route::get('/adminDasarsurat/tambah',[AdminSuratController::class, 'create'])->name('adminSurat.create');
Route::post('/adminDasarsurat/tambah',[AdminSuratController::class, 'store'])->name('adminSurat.store');
Route::get('/adminDasarsurat/edit/{id_surat}',[AdminSuratController::class, 'edit'])->name('adminSurat.edit');
Route::put('/adminDasarsurat/update/{id_surat}',[AdminSuratController::class, 'update'])->name('adminSurat.update');
Route::delete('/adminDasarsurat/hapus/{id_surat}',[AdminSuratController::class, 'destroy'])->name('adminSurat.destroy');

Route::get('/bidangkegiatan',[BidangKegiatanController::class, 'index']);
Route::get('/bidangkegiatan/tambah',[BidangKegiatanController::class, 'create'])->name('bidangkegiatan.create');
Route::post('/bidangkegiatan/tambah',[BidangKegiatanController::class, 'store'])->name('bidangkegiatan.store');
Route::get('/bidangkegiatan/edit/{id_bidang_kegiatan}',[BidangKegiatanController::class, 'edit'])->name('bidangkegiatan.edit');
Route::put('/bidangkegiatan/update/{id_bidang_kegiatan}',[BidangKegiatanController::class, 'update'])->name('bidangkegiatan.update');
Route::delete('/bidangkegiatan/hapus/{id_bidang_kegiatan}',[BidangKegiatanController::class, 'destroy'])->name('bidangkegiatan.destroy');

Route::get('/skpd',[SkpdController::class, 'index']);
Route::get('/skpd/tambah',[SkpdController::class, 'create'])->name('skpd.create');
Route::post('/skpd/tambah',[SkpdController::class, 'store'])->name('skpd.store');
Route::get('/skpd/edit/{id_skpd}',[SkpdController::class, 'edit'])->name('skpd.edit');
Route::put('/skpd/update/{id_skpd}',[SkpdController::class, 'update'])->name('skpd.update');
Route::delete('/skpd/hapus/{id_skpd}',[SkpdController::class, 'destroy'])->name('skpd.destroy');

Route::get('/allkegiatan',[AdminController::class, 'allkegiatan']);
Route::get('/allkegiatan/track/{id_kegiatan}',[AdminController::class, 'track'])->name('admin.track');
Route::get('/adminkegiatan/show/{id_kegiatan}',[AdminController::class, 'kegiatanshow'])->name('adminkegiatan.show');
Route::get('/adminkegiatan/edit/{id_kegiatan}',[AdminController::class, 'kegiatanedit'])->name('adminkegiatan.edit');
Route::put('/adminkegiatan/update/{id_kegiatan}',[AdminController::class, 'kegiatanupdate'])->name('adminkegiatan.update');
Route::delete('/adminkegiatan/hapus/{id_kegiatan}',[AdminController::class, 'kegiatandestroy'])->name('adminkegiatan.destroy');

Route::get('/adminlog/show/{id_log}',[AdminController::class, 'logshow'])->name('adminlog.show');
Route::get('/adminlog/edit/{id_log}',[AdminController::class, 'logedit'])->name('adminlog.edit');
Route::put('/adminlog/update/{id_log}',[AdminController::class, 'logupdate'])->name('adminlog.update');
Route::delete('/adminlog/hapus/{id_log}',[AdminController::class, 'logdestroy'])->name('adminlog.destroy');


// HALAMAN USER
Route::get('/dataklasifikasi',[SubKlasifikasiController::class, 'userpage']);

Route::get('/dasarsurat',[SuratController::class, 'index']);
Route::get('/dasarsurat/tambah',[SuratController::class, 'create'])->name('surat.create');
Route::post('/dasarsurat/tambah',[SuratController::class, 'store'])->name('surat.store');
Route::get('/dasarsurat/edit/{id_surat}',[SuratController::class, 'edit'])->name('surat.edit');
Route::put('/dasarsurat/update/{id_surat}',[SuratController::class, 'update'])->name('surat.update');
Route::delete('/dasarsurat/hapus/{id_surat}',[SuratController::class, 'destroy'])->name('surat.destroy');
Route::get('/suratmasuk',[SuratController::class, 'suratmasuk']);


Route::get('/kegiatan',[KegiatanController::class, 'index']);
Route::get('/kegiatan/tambah',[KegiatanController::class, 'create'])->name('kegiatan.create');
Route::post('/kegiatan/tambah',[KegiatanController::class, 'store'])->name('kegiatan.store');
Route::get('/kegiatan/show/{id_kegiatan}',[KegiatanController::class, 'show'])->name('kegiatan.show');
Route::get('/kegiatan/edit/{id_kegiatan}',[KegiatanController::class, 'edit'])->name('kegiatan.edit');
Route::put('/kegiatan/update/{id_kegiatan}',[KegiatanController::class, 'update'])->name('kegiatan.update');
Route::delete('/kegiatan/hapus/{id_kegiatan}',[KegiatanController::class, 'destroy'])->name('kegiatan.destroy');
Route::get('/kegiatan/track/{id_kegiatan}',[KegiatanController::class, 'track'])->name('kegiatan.track');
Route::get('/updatekegiatan',[KegiatanController::class, 'updatekegiatan'])->name('logkegiatan.updatekegiatan');


Route::get('kegiatan/surat/{id_surat}',[KegiatanController::class, 'createSurat'])->name('kegiatan.createSurat');
Route::post('kegiatan/surat/{id_surat}',[KegiatanController::class, 'storeSurat'])->name('kegiatan.storeSurat');

Route::get('/logkegiatan',[LogKegiatanController::class, 'index']);
Route::get('/logkegiatan/tambah',[LogKegiatanController::class, 'create'])->name('logkegiatan.create');
Route::post('/logkegiatan/tambah',[LogKegiatanController::class, 'store'])->name('logkegiatan.store');
Route::get('/logkegiatan/show/{id_log}',[LogKegiatanController::class, 'show'])->name('logkegiatan.show');
Route::get('/logkegiatan/showlog/{id_log}',[LogKegiatanController::class, 'showlog'])->name('logkegiatan.showlog');
Route::get('/logkegiatan/edit/{id_log}',[LogKegiatanController::class, 'edit'])->name('logkegiatan.edit');
Route::put('/logkegiatan/update/{id_log}',[LogKegiatanController::class, 'update'])->name('logkegiatan.update');
Route::delete('/logkegiatan/hapus/{id_log}',[LogKegiatanController::class, 'destroy'])->name('logkegiatan.destroy');

Route::get('/penilaian',[PejabatController::class, 'index']);
Route::get('/penilaianstaff',[PejabatController::class, 'penilaianstaff']);
Route::put('/penilaian-kegiatan/{id_kegiatan}',[PejabatController::class, 'penilaiankegiatan'])->name('penilaiankegiatan.update');
Route::put('/penilaian-log/{id_log}',[PejabatController::class, 'penilaianlog'])->name('penilaianlog.update');



// Route::get('/coba',[AdminController::class, 'coba']);
//Dropdown Route
Route::get('modal-penyelesaian', [ModalController::class, 'modalpenyelesaian'])->name('modalpenyelesaian');
Route::get('modal-dispo', [ModalController::class, 'modaldispo'])->name('modaldispo');

Route::get('program-dropdown', [ProgramDropdownController::class, 'programdropdown'])->name('programdropdown');
Route::get('indikator-dropdown', [IndikatorDropdownController::class, 'indikatordropdown'])->name('indikatordropdown');
Route::get('program-dropdown-dispo', [ProgramDropdownController::class, 'programdropdowndispo'])->name('program-dropdown-dispo');
Route::get('indikator-dropdown-dispo', [IndikatorDropdownController::class, 'indikatordropdowndispo'])->name('indikator-dropdown-dispo');

Route::get('subbagian-dropdown',[RegisterController::class, 'subbagiandropdown'])->name('subbagiandropdown');
Route::get('jabatan-dropdown',[RegisterController::class, 'jabatandropdown'])->name('jabatandropdown');
