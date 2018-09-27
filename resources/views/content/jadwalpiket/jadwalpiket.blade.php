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
    Jadwal Piket
    <small>Data Jadwal Piket Siswa</small>
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
    </div>
    </div>

    <div class="x_panel">
    <div class="x_title">
      <center>
    <h2> Data Jadwal Piket Siswa </h2>
      </center>
      <br>
    </div>
    <div class="x_content">
      <table id="tabel-print" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th class="column-title">No</th>
          <th class="column-title">Jadwal Piket</th>
        </tr>
      </thead>
    	   @php
    	   $no= 1;
    	   @endphp
    	<tbody>
        @foreach($picket as $pickets)
    		 <tr>
    			<td>{{$no++}}</td>
    			<td>{{$pickets->hari}}</td>
       	</tr>
         @endforeach
    	</tbody>
     </table>
    </form>
</section>
<!-- /.content -->
@endsection
