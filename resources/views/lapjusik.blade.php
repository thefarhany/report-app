@extends('components.main')

@section('title')
<title>SIWAS | Lapjusik</title>
@endsection('title')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Lapjusik</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Lapjusik</li>
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
            <h3 class="card-title">Lapjusik</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr class="text-center">
                  <th class="align-middle" width="2">No</th>
                  <th class="align-middle">No/Tanggal SPMK</th>
                  <th class="align-middle">Nama Kegiatan</th>
                  <th class="align-middle">Laporan Lalu</th>
                  <th class="align-middle">Laporan Rencana</th>
                  <th class="align-middle">Laporan Pelaksanaan</th>
                  <th class="align-middle">Bukti Gambar</th>
                  <th class="align-middle">Terakhir Update</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $d)
                <tr class="text-center">
                  <td class="align-middle">{{ $loop->iteration}} </td>
                  <td class="align-middle">{{ $d->no_tgl_spmk}} </td>
                  <td class="align-middle">{{ $d->nama_kegiatan}} </td>
                  <td class="align-middle">{{ $d->lapju_lalu}} %</td>
                  <td class="align-middle">{{ $d->lapju_rencana}} %</td>
                  <td class="align-middle">{{ $d->lapju_pelaksanaan}} %</td>
                  <td class="align-middle">
                    <a href="{{ route('rehab.show', ['id' => $d->id]) }}" data-toggle="modal" data-target="#show-image{{ $d->id }}">
                      <i class="far fa-image"></i>
                    </a>
                  </td>
                  <td class="align-middle">{{ $d->updated_at}} </td>
                </tr>

                <div class="modal fade" id="show-image{{ $d->id }}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"><b>Data Rehab</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <!-- Data Table -->
                        <form action="">
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="no_tgl_spmk">Nomor/Tanggal/SPMK</label>
                              <input type="text" class="form-control" id="no_tgl_spmk" name="no_tgl_spmk" value="{{ $d->no_tgl_spmk }}" disabled>
                            </div>
                            <div class="form-group">
                              <label for="kotama">Kotama/Kesatuan</label>
                              <input type="text" class="form-control" id="kotama" name="kotama" value="{{ $d->kotama }}" disabled>
                            </div>
                            <div class="form-group">
                              <label for="tgl_mulai">Tanggal Mulai</label>
                              <input type="text" class="form-control" id="tgl_mulai" name="tgl_mulai" value="{{ $d->tgl_mulai }}" disabled>
                            </div>
                            <div class="form-group">
                              <label for="img_awal">Gambar Kondisi Awal</label>
                              <img src="{{ asset('storage/' . $d->img_awal) }}" alt="Gambar Kondisi Awal" class="img-fluid">
                            </div>
                            <div class="form-group">
                              <label for="img_saat_ini">Gambar Saat Ini</label>
                              <img src="{{ asset('storage/' . $d->img_saat_ini) }}" alt="Gambar Saat Ini" class="img-fluid">
                            </div>
                            <div class="form-group">
                              <label for="img_detail">Gambar Detail Pekerjaan</label>
                              <img src="{{ asset('storage/' . $d->img_bukti) }}" alt="Gambar Detail Pekerjaan" class="img-fluid">
                            </div>
                          </div>
                          <div class="modal-footer float-right justify-content-between">
                            <a href="{{ route('lapjusik.download', $d->id) }}" class="btn btn-primary">Unduh Semua Gambar</a>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </tbody>
            </table>

            <div class="mt-4">
              {{ $data->links() }}
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
</div>


@endsection