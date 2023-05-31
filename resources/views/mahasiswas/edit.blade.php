@extends('mahasiswas.layout')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Mahasiswa
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
                <form method="post" action="{{ route('mahasiswas.update', $Mahasiswa->Nim) }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="Nim" class="form-label">Nim</label>
                        <input type="text" name="Nim" class="form-control" id="Nim" value="{{ $Mahasiswa->Nim }}" ariadescribedby="Nim">
                    </div>
                    <div class="form-group">
                        <label for="Nama" class="form-label">Nama</label>
                        <input type="text" name="Nama" class="form-control" id="Nama" value="{{ $Mahasiswa->Nama }}" ariadescribedby="Nama">
                    </div>
                    <div class="form-group">
                        <label for="Kelas" class="form-label">Kelas</label>
                        {{-- <input type="Kelas" name="Kelas" class="formcontrol" id="Kelas" value="{{ $Mahasiswa->Kelas }}" ariadescribedby="Kelas"> --}}
                        <select name="Kelas" id="" class="form-control">
                            @foreach ($kelas as $kls)
                                <option value="{{ $kls->id }}"
                                    {{ $Mahasiswa->kelas_id == $kls->id ? 'selected' : '' }}>{{ $kls->nama_kelas }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Jurusan" class="form-label">Jurusan</label>
                        <input type="Jurusan" name="Jurusan" class="form-control" id="Jurusan" value="{{ $Mahasiswa->Jurusan }}" ariadescribedby="Jurusan">
                    </div>
                    <div class="form-group">
                        <label for="No_Handphone" class="form-label">No_Handphone</label>

                        <input type="No_Handphone" name="No_Handphone" class="form-control" id="No_Handphone" value="{{ $Mahasiswa->No_Handphone }}" ariadescribedby="No_Handphone">
                    </div>
                    <div class="form-group">
                        <label for="Email" class="form-label">Email</label>
                        <input type="email" name="Email" class="form-control" id="Email" value="{{ $Mahasiswa->Email }}" ariadescribedby="Email">
                    </div>
                    <div class="form-group">
                        <label for="TanggalLahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="TanggalLahir" class="form-control" id="TanggalLahir" value="{{ $Mahasiswa->TanggalLahir }}" ariadescribedby="TanggalLahir">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <a class="btn btn-success mt3" href="{{ route('mahasiswas.index') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection