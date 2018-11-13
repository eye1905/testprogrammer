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
              <div class="box-header" style="margin-left: 10pt;">
                <h3 class="box-title"><center><b>Data User</b></center></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive">
                <div class="pull-right" style="margin-right: 20pt; margin-bottom: 5pt">
                      <button class="btn btn-sm btn-primary" onclick="getinput()">Tambah Data</button>
                </div>
                <table id="tableku" class="table table-bordered table-hover ">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>No Hp</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $value)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->email }}</td>
                      <td>********</td>
                      <td>{{ $value->nohp }}</td>
                      <td>{{ $value->alamat }}</td>
                      <td>
                        <button class="btn btn-sm btn-warning" onclick="edit({{ $value->id }})">Edit</button>
                        <button class="btn btn-sm btn-danger" onclick="hapus({{ $value->id }})">Hapus</button>
                      </td>
                    </tr>
                    @endforeach
                    <tr id="trinsert">
                      <form action="{{ url('User/store') }}" method="post" id="formku" name="formku">
                      {!! csrf_field() !!}
                      <div class="form-group">
                        <td>
                          <input type="hidden" class="form-control" id="iduser" name="iduser">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="namauser" name="namauser" placeholder="Masukan Nama">
                        </td>
                        <td>
                          <input type="email" class="form-control" id="emailuser" name="emailuser" placeholder="Masukan Email">
                        </td>
                        <td>
                          <input type="password" class="form-control" id="passworduser" name="passworduser" placeholder="Masukan Password">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Masukan No Hp">
                        </td>
                        <td>
                          <textarea class="form-control" id="alamat" name="alamat"></textarea>
                        </td>
                        <td>
                          <button class="btn btn-sm btn-success">Simpan</button>
                        </td>
                      </div>
                      </form>
                    </tr>                    
                  </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
  </section>
@endsection
<script type="text/javascript">
  function edit(id) {
      $('#formku').attr('action', '{{ url('User/update') }}');
      $.ajax({
        url : "{{ url('User/edit') }}/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $("#iduser").val(data.id);
            $("#namauser").val(data.name);
            $("#emailuser").val(data.email);
            $("#passworduser").val(data.password);
            $("#nohp").val(data.nohp);
            $("#alamat").val(data.alamat);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('error'+textStatus);
        }
      });
  }

  function hapus(id) {
      $.ajax({
        url : "{{ url('User/destroy') }}/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            window.location = "<?php echo URL::current(); ?>";
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('error'+textStatus);
        }
    });
  }
</script>