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
                  {!! Form::open(array('route' => 'siswa.store','method'=>'POST','files' => 'true')) !!}
     								<div class="col-md-6">
     										<label for="kode" class="control-label">NIS Siswa</label>
     										<div class="form-group">
                            {!! Form::text('nis', null, array('placeholder' => 'Nis','class' => 'form-control','required' => '')) !!}
     										</div>
     								</div>
     								<div class="col-md-6">
     										<label for="kode" class="control-label">Nama Siswa</label>
     										<div class="form-group">
     												{!! Form::text('nama_siswa', null, array('placeholder' => 'Nama','class' => 'form-control','required' => '')) !!}
     										</div>
     								</div>
                    <div class="col-md-6">
                      <label for="kode" class="control-label">Jenis Kelamin</label>
                      <div class="form-group">
                        {!!Form::select('jenis_klamin', ['Laki-Laki' => 'Laki-Laki', 'Perempuan' => 'Perempuan'], null, array('class' => 'form-control','placeholder' => 'Mohon Masukan Jenis Kelamin Siswa','required' => ''))!!}
                      </div>
                    </div>
     								<div class="col-md-6">
     										<label for="kode" class="control-label">Tanggal Lahir</label>
     										<div class="form-group">
     												{!! Form::date('tanggal_lahir', null, array('placeholder' => 'Nama','class' => 'form-control','required' => '')) !!}
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
                          @foreach($picket as $pickets)
                        <option value="{{$pickets->id}}">{{$pickets->hari}}</option>
                        @endforeach
                      </select>
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
      <table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th class="column-title">No</th>
          <th class="column-title">Nis Siswa</th>
          <th class="column-title">Nama Siswa</th>
          <th class="column-title">Jenis Kelamin</th>
          <th class="column-title">Tanggal lahir</th>
          <th class="column-title">Kelas</th>
          <th class="column-title">Jadwal Piket</th>
          <th class="column-title">Action</th>
        </tr>
      </thead>
    	@php
    	$no= 1;
    	@endphp
    	<tbody>
        @foreach($student as $students)
    		<tr>
    			<td>{{$no++}}</td>
    			<td>{{$students->nis}}</td>
    			<td>{{$students->nama_siswa}}</td>
    			<td>{{$students->jenis_klamin}}</td>
    			<td>{{$students->tempat_tanggal_lahir}}</td>
    			<td>{{$students->join_class['kode_kelas']}}</td>
    			<td>{{$students->join_to_picket['hari']}}</td>
          <td>
              <a href="{{ route('siswa.edit',$students->id) }}" type="button" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
              {!! Form::open(['method' => 'DELETE','route' => ['siswa.destroy', $students->id]]) !!}
              <a><button  onclick=" return confirm('Anda Yakin Menghapus Absensi')" type="submit" class="btn btn-danger"><i class="fa  fa-trash-o"></i></button></a>
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
