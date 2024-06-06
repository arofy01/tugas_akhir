@extends('layout.template')
@section('konten')
<div class="container">
    
    <form action='{{ url('siswa/' . $data->NIM) }}' method='post' class="mx-auto">
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
             <a href="{{ url('siswa') }}" class='btn btn-secondary'>KEMBALI</a>
             <div class="mb-3 row">
                <label for="NIM" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                   {{ $data->NIM }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="NAMA" class="col-sm-2 col-form-label">NAMA</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='NAMA' value="{{ $data->NAMA }}" id="NAMA">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="UMUR" class="col-sm-2 col-form-label">TANGGAL LAHIR</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name='TANGGALLAHIR' value="{{ $data->TANGGALLAHIR }}" id="TANGGALLAHIR">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="JURUSAN" class="col-sm-2 col-form-label">JURUSAN</label>
                <div class="col-sm-10">
                    <select name="JURUSAN" id="JURUSAN" class="form-control">
                        <option {{ $data->JURUSAN == 'RPL' ? 'selected' : '' }}>RPL</option>
                        <option {{ $data->JURUSAN == 'DKV' ? 'selected' : '' }}>DKV</option>
                        <option {{ $data->JURUSAN == 'MM' ? 'selected' : '' }}>MM</option>
                        <option {{ $data->JURUSAN == 'APHP' ? 'selected' : '' }}>APHP</option>
                        <option {{ $data->JURUSAN == 'APAT' ? 'selected' : '' }}>APAT</option>
                        <option {{ $data->JURUSAN == 'ATU' ? 'selected' : '' }}>ATU</option>
                        <option {{ $data->JURUSAN == 'APT' ? 'selected' : '' }}>APT</option>
                        <option {{ $data->JURUSAN == 'ATP' ? 'selected' : '' }}>ATP</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="ALAMAT" class="col-sm-2 col-form-label">ALAMAT</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='ALAMAT' value="{{ $data->ALAMAT }}" id="ALAMAT">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
