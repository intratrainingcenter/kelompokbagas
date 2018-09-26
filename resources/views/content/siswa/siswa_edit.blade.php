@extends('index')

@section('title', 'AdminLTE')
@section('someCSS')
<link href="{{ asset('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('someJS')
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script>
$(function() {
  $('#example').DataTable();
  // $('#example2').DataTable({
  //   ''
  // });
});
</script>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Siswa
    <small>Data Siswa</small>
  </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">
  <div class="x_panel">
    <div class="x_content">
@if ($message = Session::get('success'))
    <div class="alert alert-success alert alert-success alert-dismissible fade in" role="alert" >
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
      </button>
        <p>{{ $message }}</p>
    </div>
    @elseif ($message = Session::get('edit'))
    <div class="alert alert-warning alert alert-warning alert-dismissible fade in" role="alert" >
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
      </button>
        <p>{{ $message }}</p>
    </div>
    @elseif ($message = Session::get('delete'))
    <div class="alert alert-danger alert alert-danger alert-dismissible fade in" role="alert" >
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
      </button>
        <p>{{ $message }}</p>
    </div>
@endif


      <div class="clearfix"></div>
     				<div class="row">
     					<div class="col-md-12 col-sm-12 col-xs-12">
     								<div class="row clearfix">
     											<div class="container-fluid">
                    {!! Form::model($student, ['method' => 'PATCH', 'files' => 'true', 'route' =>['siswa.update', $student->id]]) !!}
     								<div class="col-md-6">
     										<label for="kode" class="control-label">NIS Siswa</label>
     										<div class="form-group">
                            {!! Form::number('nis', $student->nis, array('class' => 'form-control','required' => '')) !!}
     										</div>
     								</div>
     								<div class="col-md-6">
     										<label for="kode" class="control-label">Nama Siswa</label>
     										<div class="form-group">
     												{!! Form::text('nama_siswa', $student->nama_siswa, array('placeholder' => 'Nama','class' => 'form-control','required' => '')) !!}
     										</div>
     								</div>
                    <div class="col-md-6">
                      <label for="kode" class="control-label">Jenis Kelamin</label>
                      <div class="form-group">
                        <select class="form-control" name="jenis_klamin">
                          <option value="{{$student->jenis_klamin}}">{{$student->jenis_klamin}}</option>
                          <option value="">========================================</option>
                          <option value="Laki-Laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                    </div>
     								<div class="col-md-6">
     										<label for="kode" class="control-label">Tanggal Lahir</label>
     										<div class="form-group">
                          <input class="form-control" type="text" name="" placeholder="{{$student->tempat_tanggal_lahir}}" disabled>
     												{!! Form::date('tanggal_lahir', null, array('class' => 'form-control','required' => '')) !!}
     										</div>
     								</div>
                    <div class="col-md-6">
                      <label for="kode" class="control-label">Kelas</label>
                      <div class="form-group">
                      <select class="form-control" name="kelas">
                        @foreach($class as $classs)
                      <option value="{{$classs->id}}">{{$classs->kode_kelas}}</option>
                      @endforeach
                      </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="kode" class="control-label">Jadwal Piket</label>
                      <div class="form-group">
                      <select class="form-control" name="jadwalpiket">
                        <option value="{{$student->id}}">{{$student->join_to_picket['hari']}}</option>
                        <option value="" disabled>======================================</option>
                        @foreach($picket as $pickets)
                      <option value="{{$pickets->id}}">{{$pickets->hari}}</option>
                      @endforeach
                      </select>
                      </div>
                    </div>
     								 <div class="ln_solid"></div>
     									<div class="form-group">
     										<div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="submit" value="Edit" class="btn btn-warning">
     										<div class="col-md-6 col-sm-6 col-xs-12">
                          <button class="btn btn-primary" type="reset">Reset</button>
     										</div>
     									</div>
     								 </div>
                      {!! Form::close() !!}
     							</div>
     						</div>
     				</div>
      </div>
    </div>
    </div>
</section>
<!-- /.content -->
@endsection
