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
    Kelas
    <small>Daftar Kelas</small>
  </h1>
      <div class="clearfix"></div>
     				<div class="row">
     					<div class="col-md-12 col-sm-12 col-xs-12">
     								<div class="row clearfix">
     											<div class="container-fluid">
                  {!! Form::open(array('route' => 'kelas.store','method'=>'POST','files' => 'true')) !!}
     								<div class="col-md-12">
     										<label for="kode" class="control-label">Nama Kelas</label>
     										<div class="form-group">
                            {!! Form::text('nama_kelas', null, array('placeholder' => 'Nama Kelas','class' => 'form-control','required' => '')) !!}
     										</div>
     								</div>
     								<div class="col-md-12">
     										<label for="kode" class="control-label">Nama Wali Kelas</label>
     										<div class="form-group">
     												{!! Form::text('nama_wali_kelas', null, array('placeholder' => 'Nama Wali Kelas','class' => 'form-control','required' => '')) !!}
     										</div>
     								</div>
                    <div class="col-md-12">
                      <label for="kode" class="control-label">Nama Ketua Kelas</label>
                      <div class="form-group">
                            {!! Form::text('nama_ketua_kelas', null, array('placeholder' => 'Nama Ketua Kelas','class' => 'form-control','required' => '')) !!}
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
             <div class="x_panel">
    <div class="x_title">
      <center>
    <h2> Daftar Kelas</h2>
      </center>
      <br>
    </div>
    <div class="x_content">
      <table id="tabel-print" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th>#</th>
          <th class="column-title">Nama Kelas</th>
          <th class="column-title">Nama Wali Kelas </th>
          <th class="column-title">Ketua Kelas</th>
          <th> <center>Option </center> </th>
        </tr>
      </thead>
    	@php
    	$no= 1;
    	@endphp
    	<tbody>
        @foreach($kelas as $absensi)
    		<tr>
    			<td>{{$no++}}</td>
    			<td>{{$absensi->nama_kelas}}</td>
    			<td>{{$absensi->nama_wali_kelas}}</td>
    			<td>{{$absensi->ketua_kelas}}</td>
          <td>
              <a href="{{ route('kelas.edit',$kelas->id) }}" type="button" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
              {!! Form::open(['method' => 'DELETE','route' => ['kelas.destroy', $absensi->id]]) !!}
              <a><button  onclick=" return confirm('Anda Yakin Menghapus Kelas')" type="submit" class="btn btn-danger"><i class="fa fa-close"></i></button></a>
              {!! Form::close() !!}
          </td>
    		</tr>
         @endforeach
    	</tbody>
     </table>
    </form>
</section>
<!-- /.content -->
      </div>
    </div>
   
    

  
@endsection
