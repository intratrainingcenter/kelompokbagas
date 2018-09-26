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
    MataPelajaran
    <small>Data Mata Pelajaran</small>
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
                  {!! Form::model($subjects, ['method' => 'PATCH', 'files' => 'true', 'route' =>['mapel.update', $subjects->id]]) !!}
     								<div class="col-md-6">
     										<label for="kode" class="control-label">Kode Pelajaran</label>
     										<div class="form-group">
                            {!! Form::text('kode_pelajaran', $subjects->kode_pelajaran, array('class' => 'form-control','required' => '')) !!}
     										</div>
     								</div>
     								<div class="col-md-6">
     										<label for="kode" class="control-label">Nama Pelajaran</label>
     										<div class="form-group">
     												{!! Form::text('nama_pelajaran', $subjects->nama_pelajaran, array('class' => 'form-control','required' => '')) !!}
     										</div>
     								</div>
                    <div class="col-md-6">
                      <label for="kode" class="control-label">Jam Pelajaran</label>
                      <div class="form-group">
                        {!! Form::text('jam', $subjects->jam, array('class' => 'form-control','required' => '')) !!}
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
