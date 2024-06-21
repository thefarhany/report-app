@extends('components.main')

@section('title')
<title>SIWAS | Data Rehab</title>
@endsection('title')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Data Rehab</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Data Rehab</li>
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
            <h3 class="card-title">Data Rehab</h3>
            <a href="{{ route('rehab.cetak') }}" class="btn btn-sm btn-secondary float-right">Export Laporan</a>
            <a href="#" class="btn btn-sm btn-primary float-right mr-3" data-toggle="modal" data-target="#add-rehab">Tambah Data Rehab</a>

            <!-- Modal Tambah Data -->
            <div class="modal fade" id="add-rehab">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title"><b>Tambah Data Rehab</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="{{ route('rehab.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="no_tgl_spmk">Nomor/Tanggal/SPMK</label>
                        <input type="text" class="form-control" id="no_tgl_spmk" name="no_tgl_spmk" placeholder="Nomor/Tanggal/SPMK">
                      </div>
                      <div class="form-group">
                        <label for="kotama">Kotama/Kesatuan</label>
                        <select class="form-control" id="kotama" name="kotama">
                          @foreach ($kotama as $k)
                          <option>{{ $k->kotama }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="nama_kegiatan">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Nama Kegiatan">
                      </div>
                      <div class="form-group">
                        <label for="nilai_kontrak">Nilai Kontrak</label>
                        <input type="text" class="form-control" id="nilai_kontrak" name="nilai_kontrak" placeholder="Nilai Kontrak">
                      </div>
                      <div class="form-group">
                        <label for="rekanan">Rekanan</label>
                        <input type="text" class="form-control" id="rekanan" name="rekanan" placeholder="Rekanan">
                      </div>
                      <div class="form-group">
                        <label for="jumlah_kk">Jumah Kepala Keluarga</label>
                        <input type="text" class="form-control" id="jumlah_kk" name="jumlah_kk" placeholder="Jumlah Kepala Keluarga">
                      </div>
                      <div class="form-group">
                        <label for="daya_serap">Daya Serap</label>
                        <input type="number" step="0.01" class="form-control" id="daya_serap" name="daya_serap" placeholder="Daya Serap">
                      </div>
                      <div class="form-group">
                        <label for="tgl_mulai">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" placeholder="Tanggal Mulai">
                      </div>
                      <div class="form-group">
                        <label for="tgl_selesai">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" placeholder="Tanggal Selesai">
                      </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-success">Tambah Data</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- End Modal Tambah Data -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr class="text-center">
                  <th class="align-middle" width="2">No</th>
                  <th class="align-middle" width="2">Nomor/Tanggal/ SPMK</th>
                  <th class="align-middle">Kotama/Kesatuan</th>
                  <th class="align-middle" width="2">Nama Kegiatan</th>
                  <th class="align-middle">Nilai Kontrak</th>
                  <th class="align-middle">Jumlah KK</th>
                  <th class="align-middle">Status Rehab</th>
                  <th class="align-middle">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $d)
                <tr class="text-center">
                  <td class="align-middle">{{ $loop->iteration}} </td>
                  <td class="align-middle">{{ $d->no_tgl_spmk}} </td>
                  <td class="align-middle">{{ $d->kotama}} </td>
                  <td class="align-middle">{{ $d->nama_kegiatan}} </td>
                  <td class="align-middle">Rp {{ $d->nilai_kontrak}} </td>
                  <td class="align-middle">{{ $d->jumlah_kk}} </td>
                  <td class="align-middle">
                    <a href="{{ route('rehab.show', ['id' => $d->id]) }}" data-toggle="modal" data-target="#show-rehab{{ $d->id }}">{{ $d->lapju_pelaksanaan}} %</a>
                  </td>
                  <td class="align-middle">
                    <a href="{{ route('rehab.edit', ['id' => $d->id]) }}" data-toggle="modal" data-target="#edit-rehab{{ $d->id }}"><i class="far fa-edit"></i></a>
                    <a href="{{ route('rehab.export', ['id' => $d->id]) }}" class="mx-2"><i class="fas fa-print"></i></a>
                    <a href="#" data-toggle="modal" data-target="#modal-hapus{{ $d->id }}"><i class=" far fa-trash-alt"></i></a>
                  </td>
                </tr>

                <!-- Modal Show Data -->
                <div class="modal fade" id="show-rehab{{ $d->id }}">
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
                              <label for="nama_kegiatan">Nama Kegiatan</label>
                              <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="{{ $d->nama_kegiatan }}" disabled>
                            </div>
                            <div class="form-group">
                              <label for="nilai_kontrak">Nilai Kontrak</label>
                              <input type="text" class="form-control" id="nilai_kontrak" name="nilai_kontrak" value="Rp {{ $d->nilai_kontrak }}" disabled>
                            </div>
                            <div class="form-group">
                              <label for="jumlah_kk">Jumlah KK</label>
                              <input type="text" class="form-control" id="jumlah_kk" name="jumlah_kk" value="{{ $d->jumlah_kk }}" disabled>
                            </div>
                            <div class="form-group">
                              <label for="rekanan">Rekanan</label>
                              <input type="text" class="form-control" id="rekanan" name="rekanan" value="{{ $d->rekanan }}" disabled>
                            </div>
                            <div class="form-group">
                              <label for="tgl_mulai">Tanggal Mulai</label>
                              <input type="text" class="form-control" id="tgl_mulai" name="tgl_mulai" value="{{ $d->tgl_mulai }}" disabled>
                            </div>
                            <div class="form-group">
                              <label for="tgl_selesai">Tanggal Selesai</label>
                              <input type="text" class="form-control" id="tgl_selesai" name="tgl_selesai" value="{{ $d->tgl_selesai }}" disabled>
                            </div>
                            <div class="form-group">
                              <label for="lapju_lalu">Lapju Lalu</label>
                              <input type="text" class="form-control" id="lapju_lalu" name="lapju_lalu" value="{{ $d->lapju_lalu }}" disabled>
                            </div>
                            <div class="form-group">
                              <label for="lapju_rencana">Lapju Rencana</label>
                              <input type="text" class="form-control" id="lapju_rencana" name="lapju_rencana" value="{{ $d->lapju_rencana }}" disabled>
                            </div>
                            <div class="form-group">
                              <label for="lapju_pelaksanaan">Lapju Pelaksanaan</label>
                              <input type="text" class="form-control" id="lapju_pelaksanaan" name="lapju_pelaksanaan" value="{{ $d->lapju_pelaksanaan }}" disabled>
                            </div>
                            <div class="form-group">
                              <label for="daya_serap">Daya Serap</label>
                              <input type="text" class="form-control" id="daya_serap" name="daya_serap" value="{{ $d->daya_serap }}" disabled>
                            </div>
                          </div>
                          <div class="modal-footer float-right justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Modal Show Data -->

                <!-- Modal Edit -->
                <div class="modal fade" id="edit-rehab{{ $d->id }}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"><b>Edit Data Rehab</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="{{ route('rehab.update', ['id' => $d->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="no_tgl_spmk">Nomor/Tanggal/SPMK</label>
                            <input type="text" class="form-control" id="no_tgl_spmk" name="no_tgl_spmk" value="{{ $d->no_tgl_spmk }}" disabled>
                          </div>
                          <div class="form-group">
                            <label for="kotama">Kotama</label>
                            <input type="text" class="form-control" id="kotama" name="kotama" value="{{ $d->kotama }}" disabled>
                          </div>
                          <div class="form-group">
                            <label for="nama_kegiatan">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="{{ $d->nama_kegiatan }}">
                          </div>
                          <div class="form-group">
                            <label for="nilai_kontrak">Nilai Kontrak</label>
                            <input type="text" class="form-control" id="nilai_kontrak" name="nilai_kontrak" value="{{ $d->nilai_kontrak }}" placeholder="Nilai Kontrak">
                          </div>
                          <div class="form-group">
                            <label for="jumlah_kk">Jumlah KK</label>
                            <input type="number" class="form-control" id="jumlah_kk" name="jumlah_kk" value="{{ $d->jumlah_kk }}" placeholder="Jumlah KK">
                          </div>
                          <div class="form-group">
                            <label for="daya_serap">Daya Serap</label>
                            <input type="number" step="0.01" class="form-control" id="daya_serap" name="daya_serap" value="{{ $d->daya_serap }}" placeholder="Status Rehab">
                          </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-success">Simpan Data</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- End Modal Edit -->

                <!-- Modal Delete -->
                <div class="modal fade" id="modal-hapus{{ $d->id }}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Hapus Data Rehab</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Apakah Anda Yakin Akan Hapus <b>{{ $d->no_tgl_spmk }}</b> ?</p>
                      </div>
                      <div class="modal-footer">
                        <form action="{{ route('rehab.delete', ['id' => $d->id]) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="button" class="btn btn-default float-left" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Modal Delete -->
                @endforeach
              </tbody>
            </table>
            <div class="mt-4">
              {{ $data->links() }}
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
</div>


@endsection