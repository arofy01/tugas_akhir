<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class siswacontroller extends Controller
{
    /*
    *
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->input('katakunci');
        $jumlahbaris = 4;
        if(strlen($katakunci)){
            $data = Siswa::where('NIM', 'like', '%' . $katakunci . '%')
                ->orWhere('NAMA', 'like', '%' . $katakunci . '%')
                ->orWhere('TANGGALLAHIR', 'like', '%' . $katakunci . '%')
                ->orWhere('JURUSAN', 'like', '%' . $katakunci . '%')
                ->orWhere('ALAMAT', 'like', '%' . $katakunci . '%')
                ->paginate($jumlahbaris);
        } else {
            $data = Siswa::orderBy('NIM', 'desc')->paginate($jumlahbaris);
        }
        return view('siswa.index', ['data' => $data]);
         // Misalnya, ambil data siswa dari database
         $siswa = \App\Models\Siswa::all();

         // Tampilkan view index siswa dengan data siswa
         return view('siswa.index', ['siswa' => $siswa]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
       Session::flash('nim', $request->nim);
       Session::flash('nama', $request->nama);
       Session::flash('TANGGALLAHIR', $request->TANGGALLAHIR);
       Session::flash('alamat', $request->alamat);

       $request->validate([
            'NIM'=> 'required|numeric|unique:siswa,NIM',
            'NAMA'=> 'required',
            'TANGGALLAHIR'=> 'required',
            'ALAMAT'=> 'required',
       ],
        [
            'NIM.required'=>'NIM wajib di isi',
            'NIM.numeric'=>'NIM wajib dalam angka',
            'NIM.unique'=>'NIM yang di isikan sudah dalam data base',
            'NAMA.required'=>'NAMA wajib di isi',
            'TANGGALLAHIR.required'=>'UMUR wajib di isi',
            'JURUSAN.required'=>'JURUSAN wajib di isi',
            'ALAMAT.required'=>'ALAMAT wajib di isi',
        ]);

        $data = [
            'NIM'=>$request->NIM,
            'NAMA'=>$request->NAMA,
            'TANGGALLAHIR'=>$request->TANGGALLAHIR,
            'JURUSAN'=>$request->JURUSAN,
            'ALAMAT'=>$request->ALAMAT,
        ];

        siswa::create ($data);
        return redirect()->route('siswa.index')->with('success', 'Berhasil menambahkan data');

    }
    
    /**
     * Display the specified resource.
     */
    public function show($NIM)
    {
        $siswa = Siswa::where('NIM', $NIM)->firstOrFail();
        return view('siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = siswa::where('NIM',$id)->first();
        return view('siswa.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'NAMA'=> 'required',
            'TANGGALLAHIR'=> 'required',
            'JURUSAN'=> 'required',
            'ALAMAT'=> 'required',
        ],[
            'NAMA.required'=>'NAMA wajib di isi',
            'TANGGALLAHIR.required'=>'TANGGAL LAHIR wajib di isi',
            'JURUSAN.required'=>'JURUSAN wajib di isi',
            'ALAMAT.required'=>'ALAMAT wajib di isi',
        ]);

        $data = [
            'NAMA'=>$request->NAMA,
            'TANGGALLAHIR'=>$request->TANGGALLAHIR,
            'JURUSAN'=>$request->JURUSAN,
            'ALAMAT'=>$request->ALAMAT,
        ];

        siswa::where('NIM', $id)->update($data);
        return redirect()->route('siswa.index')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        siswa::where('NIM', $id)->delete();
        return redirect()->to('siswa')->with('success', 'berhasil melakukan delete data');
    }
}
