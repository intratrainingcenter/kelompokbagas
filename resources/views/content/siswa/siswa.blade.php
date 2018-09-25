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
                  {!! Form::open(array('route' => 'siswa.store','method'=>'POST','files' => 'true')) !!}
     								<div class="col-md-6">
     										<label for="kode" class="control-label">NIS Siswa</label>
     										<div class="form-group">
                            {!! Form::number('nis', null, array('placeholder' => 'Nis','class' => 'form-control','required' => '')) !!}
     										</div>
     								</div>
     								<div class="col-md-6">
     										<label for="kode" class="control-label">Nama Siswa</label>
     										<div class="form-group">
     												{!! Form::text('nama_siswa', null, array('placeholder' => 'Nama','class' => 'form-control','required' => '')) !!}
     										</div>
     								</div>
                    <div class="col-md-6">
                      <label for="kode" class="control-label">Absensi</label>
                      <div class="form-group">
                        {!!Form::select('presensi', ['Sakit' => 'Sakit', 'Ijin' => 'Ijin', 'Alfa' => 'Alfa'], null, array('class' => 'form-control','placeholder' => 'Mohon Masukan Presensi Siswa','required' => ''))!!}
                      </div>
                    </div>
     								<div class="col-md-6">
     										<label for="kode" class="control-label">Keterangan</label>
     										<div class="form-group">
     												{!! Form::textarea('keterangan', null, array('placeholder' => 'keterangan','class' => 'form-control','required' => '','style' => 'width:500px; height:100px;')) !!}
     										</div>
     								</div>
     								 <div class="ln_solid"></div>
     									<div class="form-group">
     										<div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="submit" value="Submit" class="btn btn-success">
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

    <div class="x_panel">
    <div class="x_title">
      <center>
    <h2> Data Absensi Siswa</h2>
      </center>
      <br>
    </div>
    <div class="x_content">
      <table id="tabel-print" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th class="column-title">No</th>
          <th class="column-title">Nis Siswa</th>
          <th class="column-title">Nama Siswa</th>
          <th class="column-title">Absensi</th>
          <th class="column-title">Keterangan</th>
          <th class="column-title">Action</th>
        </tr>
      </thead>
    	@php
    	$no= 1;
    	@endphp
    	<tbody>
        @foreach($absensi as $absensi)
    		<tr>
    			<td>{{$no++}}</td>
    			<td>{{$absensi->nis}}</td>
    			<td>{{$absensi->nama_siswa}}</td>
    			<td>{{$absensi->presensi}}</td>
    			<td>{{$absensi->keterangan}}</td>
          <td>
              <a href="{{ route('absen.edit',$absensi->id) }}" type="button" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
              {!! Form::open(['method' => 'DELETE','route' => ['absen.destroy', $absensi->id]]) !!}
              <a><button  onclick=" return confirm('Anda Yakin Menghapus Absensi')" type="submit" class="btn btn-danger"><i class="fa fa-close"></i></button></a>
              {!! Form::close() !!}
          </td>
    		</tr>
         @endforeach
    	</tbody>
     </table>
    </form>
</section>
<!-- /.content -->
@endsection
