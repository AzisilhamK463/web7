<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\kelas;
use Illuminate\Foundation\Mix;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //fungsi eloquent menampilkan data menggunakan pagination
        $mahasiswas = Mahasiswa::with('kelas')->get(); // Mengambil semua isi tabel
        $posts = Mahasiswa::with('kelas')->orderBy('Nim', 'desc')->paginate(10);
        return view('mahasiswas.index', compact('posts'));
        //->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('mahasiswas.create', ['kelas' => $kelas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'No_Handphone' => 'required',
            'Email' => 'required',
            'TanggalLahir' => 'required',
        ]);

        $request->validate();

        $mahasiswa = Mahasiswa::create($request->all());

        // $kelas = new Kelas;
        // $kelas->id = $request->get('Kelas');

        //fungsi eloquent untuk menambah data belongsTo
        // $mahasiswa->kelas()->associate($kelas);
        // $mahasiswa->save();
        //fungsi eloquent untuk menambah data
        // Mahasiswa::create($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($Nim)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        // $Mahasiswa = Mahasiswa::find($Nim);
        $Mahasiswa = Mahasiswa::with('kelas')->where('Nim', $Nim)->first();
        // dd($Mahasiswa);
        return view('mahasiswas.detail', compact('Mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($Nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        // $Mahasiswa = Mahasiswa::where('Nim', $Nim)->first();
        $Mahasiswa = Mahasiswa::with('kelas')->where('Nim', $Nim)->first();
        $kelas = Kelas::all();
        return view('mahasiswas.edit', compact('Mahasiswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $Nim)
    {
        //melakukan validasi data
        $validatedData = $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'No_Handphone' => 'required',
            'Email' => 'required',
            'TanggalLahir' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        // Mahasiswa::where('Nim', $Nim)->update($validatedData);
        $mhs = Mahasiswa::find($Nim);

        Mahasiswa::where('Nim', $Nim)->update([
            'Nim' => $request->get('Nim'),
            'Nama' => $request->get('Nama'),
            // 'foto' => $nama_foto,
            'Jurusan' => $request->get('Jurusan'),
            'No_Handphone' => $request->get('No_Handphone'),
            'Email' => $request->get('Email'),
            'TanggalLahir' => $request->get('TanggalLahir'),
            'kelas_id' => $request->get('Kelas'),
        ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($Nim)
    {
        //fungsi eloquent untuk menghapus data
        Mahasiswa::find($Nim)->delete();
        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa Berhasil Dihapus');
    }
}
