@extends('layout.template')
<!-- START FORM -->
@section('konten')

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="{{url('siswa')}}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>
    
    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">
        <a href="{{url('siswa/create')}}" class="btn btn-primary">+ Tambah Data</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="text-center col-md-1" style="white-space: nowrap;">NO</th>
                <th class="text-center col-md-2" style="white-space: nowrap;">NIM</th>
                <th class="text-center col-md-3" style="white-space: nowrap;">NAMA</th>
                <th class="text-center col-md-1" style="white-space: nowrap;">TANGGAL LAHIR</th>
                <th class="text-center col-md-2" style="white-space: nowrap;">JURUSAN</th>
                <th class="text-center col-md-2" style="white-space: nowrap;">ALAMAT</th>
                <th class="text-center col-md-1" style="white-space: nowrap;">AKSI</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{$item->NIM}}</td>
                    <td>{{$item->NAMA}}</td>
                    <td class="text-center">{{$item->TANGGALLAHIR}}</td>
                    <td>{{$item->JURUSAN}}</td>
                    <td>{{$item->ALAMAT}}</td>
                    <td class="text-center">
                        <a href="{{ url('siswa/'.$item->NIM.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                        <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{url('siswa/'.$item->NIM)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                        </form>
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>   
    {{$data->links()}}
</div>

@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
