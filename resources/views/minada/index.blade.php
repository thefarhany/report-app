@extends('components.minada')

@section('title')
<title>MINADA | Homepage</title>
@endsection('title')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Selamat Datang</h1>
      </div>
    </div>
  </div>
</div>

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Lapjusik</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    {!! $lapjusikChart->container() !!}
  </div>
  <!-- /.card-body -->
</div>
<script src="{{ $lapjusikChart->cdn() }}"></script>
{{ $lapjusikChart->script() }}
@endsection