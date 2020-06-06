<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Exports\MahasiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $Mahasiswa = Mahasiswa::where('nama', 'LIKE', '%' . $request->cari . '%')->get();
        } else {
            $Mahasiswa = Mahasiswa::paginate(6);
        }
        return view('Mahasiswa.index', ['mahasiswa' => $Mahasiswa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:3',
            'alamat' => 'required'
        ]);
        Mahasiswa::create($request->all());
        return redirect('/mahasiswa')->with('sukses', 'data berhasil diinput');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_mahasiswa)
    {
        $Mahasiswa = Mahasiswa::find($id_mahasiswa);
        return view('mahasiswa.edit', ['mahasiswa' => $Mahasiswa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_mahasiswa)
    {
        $Mahasiswa = Mahasiswa::find($id_mahasiswa);
        $Mahasiswa->update($request->all());
        return redirect('/mahasiswa')->with('sukses', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_mahasiswa)
    {
        $mahasiswa = Mahasiswa::find($id_mahasiswa);
        $mahasiswa->delete($mahasiswa);
        return redirect('/mahasiswa')->with('sukses', 'Data berhasil dihapus');
    }

    public function export()
    {
        return Excel::download(new MahasiswaExport, 'mahasiswa.xlsx');
    }

    public function exportPDF()
    {
        $Mahasiswa = Mahasiswa::all();
        $pdf = PDF::loadview('mahasiswa.mahasiswapdf', ['mahasiswa' => $Mahasiswa]);
        return $pdf->download('mahasiswa.pdf');
    }
}
