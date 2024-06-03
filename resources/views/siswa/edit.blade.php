@extends('layout.template')
@section('konten')
<div class="container">
    
    <form action='{{url('siswa/'.$data->NIM)}}' method='post' class="mx-auto">
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm ">
             <a href="{{url('siswa')}}" class='btn btn-secondary'><< KEMBALI</a>
             <div class="mb-3 row">
               
                <label for="NIM" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                   {{$data->NIM}}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="NAMA" class="col-sm-2 col-form-label">NAMA</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='NAMA'  value="{{ $data->NAMA}}" id="NAMA">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="JURUSAN" class="col-sm-2 col-form-label">JURUSAN</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='JURUSAN' value="{{ $data->JURUSAN}}" id =JURUSAN>
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
