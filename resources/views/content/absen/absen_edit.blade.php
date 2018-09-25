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
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Absen
    <small>Data Absensi Siswa</small>
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
@endif


      <div class="clearfix"></div>
     				<div class="row">
     					<div class="col-md-12 col-sm-12 col-xs-12">
     								<div class="row clearfix">
     											<div class="container-fluid">
                  {!! Form::model($attendance, ['method' => 'PATCH', 'files' => 'true', 'route' =>['absen.update', $attendance->id]]) !!}
     								<div class="col-md-6">
     										<label for="kode" class="control-label">NIS Siswa</label>
     										<div class="form-group">
                            {!! Form::text('nis', $attendance->join_to_siswa->nis, array('class' => 'form-control','required' => '')) !!}
     										</div>
     								</div>
     								<div class="col-md-6">
     										<label for="kode" class="control-label">Nama Siswa</label>
     										<div class="form-group">
     												{!! Form::text('nama_siswa', $attendance->join_to_siswa->nama_siswa, array('placeholder' => 'Nama','class' => 'form-control','required' => '')) !!}
     										</div>
     								</div>
                    <div class="col-md-6">
                      <label for="kode" class="control-label">Absensi</label>
                      <div class="form-group">
                        {!!Form::select('presensi', ["$attendance->presensi" => "$attendance->presensi" ,'Sakit' => 'Sakit', 'Ijin' => 'Ijin', 'Alfa' => 'Alfa'], null, array('class' => 'form-control','required' => ''))!!}
                      </div>
                    </div>
     								<div class="col-md-6">
     										<label for="kode" class="control-label">Keterangan</label>
     										<div class="form-group">
     												{!! Form::textarea('keterangan', $attendance->keterangan, array('class' => 'form-control','required' => '','style' => 'width:500px; height:100px;')) !!}
     										</div>
     								</div>
     								 <div class="ln_solid"></div>
     									<div class="form-group">
     										<div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="submit" value="Edit" class="btn btn-warning">
     										<div class="col-md-6 col-sm-6 col-xs-12">
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <a href="{{ route('absen.index')}}"><button class="btn btn-default" type="button">Back</button></a>
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
