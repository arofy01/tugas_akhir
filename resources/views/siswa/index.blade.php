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
                  <a href='{{url('siswa/create')}}' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">NO</th>
                            <th class="col-md-3">NIM</th>
                            <th class="col-md-4">NAMA</th>
                            <th class="col-md-2">JURUSAN</th>
                            <th class="col-md-2">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                         <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$item->NIM}}</td>
                            <td>{{$item->NAMA}}</td>
                            <td>{{$item->JURUSAN}}</td>
                            <td>
                                <a href='{{ url('siswa/'.$item->NIM.'/edit') }}' class="btn 
                                btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('yakin akan menghapus data?')" class="d-inline" action="{{url('siswa/'.$item->NIM)}}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger
                                     btn-sm" >Del</button>
                                </form>
                            </td>
                        </tr> 
                        @endforeach
                    </tbody>
                </table>   
              {{$data->links()}}
            </div>
                       
        </div>
                        
               
          </div>
          <!-- AKHIR DATA -->
           @endsection
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>