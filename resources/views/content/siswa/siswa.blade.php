@extends('index')

@section('title', 'AdminLTE')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Siswa cxfdecgfde
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
    <li class="active">Here</li>
  </ol>
</section>


<!-- Main content -->
<section class="content container-fluid">
<div class="x_panel">
  <div class="x-content">
    <div class="clearfix"></div>
          <div clas="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row clearfix">
                  <form action="#" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  <div class="container-fluid">
     											@csrf
     												<input type="hidden" name="id_ruangan" class="form-control"/>

     								<div class="col-md-6">
     										<label for="kode" class="control-label">NIS Siswa</label>
     										<div class=HEADER"form-group">
     												<input HEADERtype="text" name="nama_ruangan" value="" class="form-control" required=""/>
     										</div>HEADER
     								</div>
     								<div class="col-md-6">
     										<label for="kode" class="control-label">Nama Siswa</label>
     										<div class="form-group">
     												<input type="number" name="harga" value="" class="form-control" required=""/>
     										</div>
     								</div>
                    <div class="col-md-6">
                      <label for="kode" class="control-label">Absensi</label>
                      <div class="form-group">
                        <select class="form-control" name="status" required="">
                          <option value="Tersedia">Sakit</option>
                          <option value="Full">Ijin</option>
                          <option value="Rusak">Alfa</option>
                        </select>
                      </div>
                    </div>
     								<div class="col-md-6">
     										<label for="kode" class="control-label">Keterangan</label>
     										<div class="form-group">
     												<input type="text" name="no_kamar" value="" class="form-control" required=""/>
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
     								</form>
     							</div>
     						</div>
     				</div>
      </div>
    </div>
    </div>

    <div class="x_panel">
    <div class="x_title">
    <h2> Data Absensi Siswa</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
    </ul>
    <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <table id="tabel-print" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th class="column-title">No</th>
          <th class="column-title">Nama kelas</th>
          <th class="column-title">Jumlah Siswa</th>
          <th class="column-title">Absensi
          </th>
          <th class="column-title">Keterangan</th>
          <th class="column-title">Action</th>
        </tr>
      </thead>
    	@php
    	$no=1;
    	@endphp
    	<tbody>
        @foreach($absensi as $absensi)
    		<tr>
    			<td>{{$no}}</td>
    			<td>{{$absensi->nis}}</td>
    			<td>{{$absensi->nama_siswa}}</td>
    			<td>{{$absensi->presensi}}</td>
    			<td>{{$absensi->keterangan}}</td>
          <td>
              <form method="post" action="">
                <a href="" type="button" class="btn btn-info"><i class="fa fa-info"></i></a>
                <a href="" type="button" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
              </form>
          </td>
    		</tr>
         @endforeach
    	</tbody>
     </table>
    </form>
</section>
<!-- /.content -->
@endsection
