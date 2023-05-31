@extends('mahasiswas.layout')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Tambah Mahasiswa
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your i
                    nput.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('mahasiswas.store') }}" id="myForm">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="Nim" class="form-label">Nim</label>
                        <input type="text" name="Nim" class="form-control" id="Nim" aria-describedby="Nim">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Nama" class="form-label">Nama</label>
                        <input type="Nama" name="Nama" class="form-control" id="Nama" aria-describedby="Nama">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Kelas" class="form-label">Kelas</label>
                        <select name="Kelas" id="" class=" form-control">
                            @foreach ($kelas as $kls)
                                <option value="{{ $kls->id }}">{{ $kls->nama_kelas }}</option>
                            @endforeach
                        </select>
                        {{-- <input type="Kelas" name="Kelas" class="formcontrol" id="Kelas" aria-describedby="password"> --}}
                    </div>
                    <div class="form-group mb-3">
                        <label for="Jurusan" class="form-label">Jurusan</label>
                        <input type="Jurusan" name="Jurusan" class="form-control" id="Jurusan" aria-describedby="Jurusan">
                    </div>
                    <div class="form-group mb-3">
                        <label for="No_Handphone" class="form-label">No_Handphone</label>

                        <input type="No_Handphone" name="No_Handphone" class="form-control" id="No_Handphone" aria-describedby="No_Handphone">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Email" class="form-label">Email</label>

                        <input type="email" name="Email" class="form-control" id="Email" aria-describedby="Email">
                    </div>
                    <div class="form-group mb-3">
                        <label for="TanggalLahir" class="form-label">Tanggal Lahir</label>

                        <input type="date" name="TanggalLahir" class="form-control" id="TanggalLahir" aria-describedby="TanggalLahir">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <a class="btn btn-success mt3" href="{{ route('mahasiswas.index') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection