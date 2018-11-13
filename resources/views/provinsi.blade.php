@extends('layout')

@section('content')
  <section class="content-header">
        <h1>
          
          <small></small>
        </h1> <br>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
          <li class="active">Master Provinsi</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header" style="margin-left: 10pt;">
                <h3 class="box-title"><center><b>Data Master Provinsi</b></center></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive">
                <div class="pull-right" style="margin-right: 20pt; margin-bottom: 5pt">
                      <button class="btn btn-sm btn-primary" onclick="getinput()">Tambah Data</button>
                </div>
                <table id="tableku" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Provinsi</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $value)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $value->namaprovinsi }}</td>
                      <td>
                        <button class="btn btn-sm btn-warning" onclick="edit({{ $value->idprovinsi }})">Edit</button>
                        <button class="btn btn-sm btn-danger" onclick="hapus({{ $value->idprovinsi }})">Hapus</button>
                      </td>
                    </tr>
                    @endforeach

                    <tr id="trinsert" class="trinsert">
                      <form action="{{ url('Provinsi/store') }}" method="post" id="formku" name="formku">
                    {!! csrf_field() !!}
                      <div class="form-group">
                        <td>
                          <input type="hidden" class="form-control" id="idprovinsi" name="idprovinsi">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="namaprovinsi" name="namaprovinsi" placeholder="Masukan Nama">
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
      $('#formku').attr('action', '{{ url('Provinsi/update') }}');
      $.ajax({
        url : "{{ url('Provinsi/edit') }}/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
            $("#idprovinsi").val(data.idprovinsi);
            $("#namaprovinsi").val(data.namaprovinsi);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('error'+textStatus);
        }
      });
  }

  function hapus(id) {
      $.ajax({
        url : "{{ url('Provinsi/destroy') }}/" + id,
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