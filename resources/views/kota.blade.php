@extends('layout')

@section('content')
  <section class="content-header">
        <h1>
          
          <small></small>
        </h1> <br>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
          <li class="active">Master Kota</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header" style="margin-left: 10pt;">
                <h3 class="box-title"><center><b>Data Master Kota</b></center></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive">
                <div class="col-xs-2">
                  <form action="{{ url('Kota/filter') }}" method="post" id="formfilter" name="formfilter">
                      {!! csrf_field() !!}
                  <select class="form-control" name="filterprovinsi" id="filterprovinsi" onchange="filter()">
                    <option>-- Filter Provinsi --</option>
                    @foreach($data2 as $key => $value)
                    <option value="{{ $value->idprovinsi }}">{{ $value->namaprovinsi }}</option>
                    @endforeach
                  </select>
                  </form>
                </div>

                <div class="pull-right" style="margin-right: 20pt; margin-bottom: 5pt">
                      <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal" onclick="setinput()">Tambah Data</button>
                </div>
                <table id="tableku" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Kota</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $value)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $value->namakota }}</td>
                      <td>
                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModal" onclick="edit({{ $value->idkota }})">Edit</button>
                        <button class="btn btn-sm btn-danger" onclick="hapus({{ $value->idkota }})">Hapus</button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
  </section>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><center><b>Tambah Data Kota</b></center></h4>
      </div>
      <div class="modal-body">
          <table class="table table-bordered">
           <tbody>
              <tr>
            <form action="{{ url('Kota/store') }}" method="post" id="formku" name="formku">
            {!! csrf_field() !!}
              <div class="form-group">
                <td>
                  <input type="hidden" class="form-control" id="idkota" name="idkota">
                  <select class="form-control" name="idprovinsi" id="idprovinsi">
                    <option>-- Pilih Provinsi --</option>
                    @foreach($data2 as $key => $value)
                    <option value="{{ $value->idprovinsi }}">{{ $value->namaprovinsi }}</option>
                    @endforeach
                  </select>
                </td>
                <td>
                  <input type="text" class="form-control" id="namakota" name="namakota" placeholder="Masukan Nama Kota">
                </td>
                <td>
                  <button class="btn btn-sm btn-success" type="submit">Simpan</button>
                  <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal" onclick="setinput()">Close</button>
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
@endsection


<script type="text/javascript">
  function edit(id) {
      $('#formku').attr('action', '{{ url('Kota/update') }}');
      $.ajax({
        url : "{{ url('Kota/edit') }}/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $("#idkota").val(data.idkota);
            $("#namakota").val(data.namakota);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('error'+textStatus);
        }
      });
  }

  function hapus(id) {
      $.ajax({
        url : "{{ url('Kota/destroy') }}/" + id,
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

  function filter() {
      $("#formfilter").submit();
  }

  function setinput() {
      $('#formku').attr('action', '{{ url('Kota/store') }}');
  }
</script>