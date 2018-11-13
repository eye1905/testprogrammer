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
                  <a href="{{ url('User/create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
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
                        <a href="{{ url('User/show') }}/{{ $value->id }}" class="btn btn-sm btn-warning">Edit</a>
                        <button class="btn btn-sm btn-danger" onclick="hapus({{ $value->id }})">Hapus</button>
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
@endsection

<script type="text/javascript">
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