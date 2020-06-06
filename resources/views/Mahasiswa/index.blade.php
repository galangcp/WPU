@extends('layouts.master')

@section('content')

<div class="main-content">
    <div class="container-fluid">
        @if(session('sukses'))
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}
        </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Data Mahasiswa</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                    Tambah Data
                                </button>
                            </div>
                            <div class="col-md-4">
                                <form method="GET" action="/mahasiswa">
                                    <div class="input-group">
                                        <input name="cari" type="text" value="" class="form-control" placeholder="Cari data...">
                                        <span class="input-group-btn"><button name="cari" type="button" class="btn btn-primary">Go</button></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mahasiswa as $mhs)
                                <tr>
                                    <td>{{$mhs->id_mahasiswa}}</td>
                                    <td>{{$mhs->nama}}</td>
                                    <td>{{$mhs->alamat}}</td>
                                    <td>{{$mhs->no_hp}}</td>
                                    <td>
                                        <a href="/mahasiswa/{{$mhs->id_mahasiswa}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="/mahasiswa/{{$mhs->id_mahasiswa}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus ?')">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$mahasiswa->links()}}
                        <div class="">
                            <a href="/mahasiswa/export" class="btn btn-sm btn-primary">Export</a>
                            <a href="/mahasiswa/exportPDF" class="btn btn-sm btn-primary">PDF</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/mahasiswa/create" method="POST">
                    {{csrf_field()}}
                    <div class="form-group{{$errors->has('nama') ? ' has-error' : ''}}">
                        <label for="exampleInputEmail1">Nama</label>
                        <input name="nama" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama" value="{{old('nama')}}">
                        @if($errors->has('nama'))
                        <span class="help-block">{{$errors->first('nama')}}</span>
                        @endif
                    </div>
                    <div class="form-group{{$errors->has('alamat') ? ' has-error' : ''}}">
                        <label for="exampleInputEmail1">Alamat</label>
                        <input name="alamat" type="text" class="form-control" id="exampleInputEmail1" placeholder="Alamat" value="{{old('alamat')}}">
                        @if($errors->has('alamat'))
                        <span class="help-block">{{$errors->first('alamat')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">No_HP</label>
                        <input name="no_hp" type="text" class="form-control" id="exampleInputPassword1" placeholder="No_HP" value="{{old('no_hp')}}">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection