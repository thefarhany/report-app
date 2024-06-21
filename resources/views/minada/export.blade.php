@extends('components.minada')

@section('title')
<title>MINADA | Export Data</title>
@endsection('title')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Export Data</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Export Data</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title"></h3>
            <a href="{{ route('minada.print', ['start_date' => request('start_date'), 'end_date' => request('end_date')]) }}" style="margin-top: 31px;" class="btn btn-warning float-right">Export</a>
            <form class="d-flex float-right mr-3" action="{{ route('minada.export') }}" method="GET">
              <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date" class="form-control">
              </div>
              <div class="form-group mx-3">
                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date" class="form-control">
              </div>
              <button style="height: 38px; margin-top: 31px;" type="submit" class="btn btn-primary">Filter</button>
            </form>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped table-responsive">
              <thead>
                <tr class="text-center">
                  <th class="align-middle" width="2">No</th>
                  <th class="align-middle">Nomor/Tanggal/ SPMK</th>
                  <th class="align-middle">Nilai Kontrak</th>
                  <th class="align-middle">Jumlah KK</th>
                  <th class="align-middle">Rekanan</th>
                  <th class="align-middle">Tanggal Mulai</th>
                  <th class="align-middle">Tanggal Selesai</th>
                  <th class="align-middle">Laporan Lalu</th>
                  <th class="align-middle">Laporan Rencana</th>
                  <th class="align-middle">Laporan Pelaksanaan</th>
                  <th class="align-middle">Daya Serap</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $d)
                <tr class="text-center">
                  <td class="align-middle">{{ $loop->iteration}} </td>
                  <td class="align-middle">{{ $d->no_tgl_spmk}} </td>
                  <td class="align-middle">Rp {{ $d->nilai_kontrak}} </td>
                  <td class="align-middle">{{ $d->jumlah_kk}} </td>
                  <td class="align-middle">{{ $d->rekanan}} </td>
                  <td class="align-middle">{{ $d->tgl_mulai}} </td>
                  <td class="align-middle">{{ $d->tgl_selesai}} </td>
                  <td class="align-middle">{{ $d->lapju_lalu}} </td>
                  <td class="align-middle">{{ $d->lapju_rencana}} </td>
                  <td class="align-middle">{{ $d->lapju_pelaksanaan}} </td>
                  <td class="align-middle">{{ $d->daya_serap}} </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>


@endsection