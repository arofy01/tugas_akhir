@extends('layout.template')
@section('konten')
<div class="container">
    <form action='{{ url('siswa') }}' method='post' class="mx-auto">
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('siswa') }}" class='btn btn-secondary'>KEMBALI</a>
            <div class="mb-3 row">
                <label for="NIM" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='NIM' value="{{ Session::get('NIM') }}" id="NIM">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="NAMA" class="col-sm-2 col-form-label">NAMA</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='NAMA' value="{{ Session::get('NAMA') }}" id="NAMA">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="TANGGAL LAHIR" class="col-sm-2 col-form-label">TANGGAL LAHIR</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name='TANGGALLAHIR' value="{{ Session::get('TANGGALLAHIR') }}" id="TANGGALLAHIR">
                </div>
            </div>
            <div class="mb-2 row">
                <label for="JURUSAN" class="col-sm-2 col-form-label">JURUSAN</label>
                <div class="col-sm-10">
                   
                <select name="JURUSAN" id=""> 
                <option value="RPL">RPL</option>
                <option value="DKV">DKV</option>
                <option value="MM">MM</option>
                <option value="APHP">APHP</option>
                <option value="APAT">APAT</option>
                <option value="ATU">ATU</option>
                <option value="APT">APT</option>
                <option value="ATP">ATP</option>
                </div>
            </select>
               
            </div>
            <div class="mb-3 row">
                <label for="ALAMAT" class="col-sm-2 col-form-label">ALAMAT</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='ALAMAT' value="{{ Session::get('ALAMAT') }}" id="ALAMAT">
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
