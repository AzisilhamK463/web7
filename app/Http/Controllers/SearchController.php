<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $cari = $request->search;
        $posts = Mahasiswa::where('Nama', 'LIKE', '%' . $cari . '%')->paginate(5);
        return view('mahasiswas.index', ['posts' => $posts]);
    }
}
