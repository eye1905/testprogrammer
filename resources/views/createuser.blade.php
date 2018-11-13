@extends('layout')

@section('content')
  <section class="content-header">
        <h1>
          
      <small></small>
        </h1> <br>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
          <li class="active">Data User</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><b>Input Data User</b></h3>
            </div>
            <form action="{{ url('User/store') }}" method="post" id="formku" name="formku">
              {!! csrf_field() !!}
              <div class="box-body" style="margin-right: 10pt; margin-left: 10pt">
                <div class="row">
                  <div class="col-xs-6">
                    <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Email">
                  </div>
                  <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
                  </div>
                  <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email">
                  </div>
                  <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama">
                  </div>
                  <div class="form-group">
                      <label for="nama">No Telp</label>
                      <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Masukan No Telp">
                  </div>
                  </div>

                  <div class="col-xs-6">
                    <div class="form-group">
                    <label for="tgllahir">Tanggal Lahir</label>
                    <input type="text" class="form-control" id="tgllahir" name="tgllahir" placeholder="Masukan Tanggal Lahir">
                  </div>
                  <div class="form-group">
                      <label for="kota">Kota</label>
                      <select class="form-control" name="idkota" id="idkota" >
                      <option>-- Pilih Kota --</option>
                      @foreach($data2 as $key => $value)
                      <option value="{{ $value->idkota }}">{{ $value->namakota }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <textarea class="form-control" id="alamat" name="alamat"></textarea>
                    </div>
                  </div>

                </div>
              </div>
              <div class="box-footer" style="margin-left: 10pt; margin-right: 10pt ">
                <button type="submit" class="btn btn-sm btn-primary pull-right">Simpan Data</button>
              </div>
              <br>
            </form>
          </div>
            </div>
            </div>
          </div>
  </section>
@endsection