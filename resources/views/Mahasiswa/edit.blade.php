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
            <div class="col-md-8">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Mahasiswa</h3>
                    </div>
                    <div class="panel-body">

                        <form action="/mahasiswa/{{$mahasiswa->id_mahasiswa}}/update" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input name="nama" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama" value="{{$mahasiswa->nama}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <input name="alamat" type="text" class="form-control" id="exampleInputEmail1" placeholder="Alamat" value="{{$mahasiswa->alamat}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">No_HP</label>
                                <input name="no_hp" type="text" class="form-control" id="exampleInputPassword1" placeholder="No_HP" value="{{$mahasiswa->no_hp}}">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-warning">Update</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection