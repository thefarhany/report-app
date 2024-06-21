@extends('components.second')

@section('title')
<title>DENZIBANG | Lapjusik</title>
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
                  <th class="align-middle" width="3">No/Tanggal/SPMK</th>
                  <th class="align-middle" width="6">Nama Kegiatan</th>
                  <th class="align-middle" width="2">Laporan Lalu</th>
                  <th class="align-middle" width="2">Laporan Rencana</th>
                  <th class="align-middle" width="2">Laporan Pelaksanaan</th>
                  <th class="align-middle" width="2">Terakhir Update</th>
                  <th class="align-middle" width="4">Aksi</th>
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
                  <td class="align-middle">{{ $d->updated_at->format('d M Y H:i:s') }} </td>
                  <td class="align-middle">
                    <a href="{{ route('denzibang.edit', ['id' => $d->id]) }}" class="mr-2" data-toggle="modal" data-target="#input-lapju{{ $d->id }}"><i class="far fa-edit"></i></a>
                    <a href="{{ route('denzibang.edit', ['id' => $d->id]) }}" data-toggle="modal" data-target="#input-gambar{{ $d->id }}"><i class="far fa-images"></i></a>
                  </td>
                </tr>

                <!-- Modal Input Data -->
                <div class="modal fade" id="input-lapju{{ $d->id }}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"><b>Input Lapju</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="{{ route('denzibang.update', ['id' => $d->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="no_tgl_spmk">No/Tanggal/SPMK</label>
                            <input type="text" class="form-control" id="no_tgl_spmk" name="no_tgl_spmk" value="{{ $d->no_tgl_spmk }}" disabled>
                          </div>
                          <div class="form-group">
                            <label for="nama_kegiatan">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="{{ $d->nama_kegiatan }}" disabled>
                          </div>
                          <div class="form-group">
                            <label for="lapju_lalu">Laporan Lalu</label>
                            <input type="number" step="0.01" class="form-control" id="lapju_lalu" name="lapju_lalu" value="{{ $d->lapju_lalu }}">
                            <small><b>dalam satuan persen(%)</b></small>
                          </div>
                          <div class="form-group">
                            <label for="lapju_rencana">Laporan Rencana</label>
                            <input type="number" step="0.01" class="form-control" id="lapju_rencana" name="lapju_rencana" value="{{ $d->lapju_rencana }}">
                          </div>

                          <div class="form-group">
                            <label for="lapju_pelaksanaan">Laporan Pelaksanaan</label>
                            <input type="number" step="0.01" class="form-control" id="lapju_pelaksanaan" name="lapju_pelaksanaan" value="{{ $d->lapju_pelaksanaan }}">
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
                <!-- Modal Input Data -->

                <!-- Modal Upload Gambar -->
                <div class="modal fade" id="input-gambar{{ $d->id }}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"><b>Input Gambar</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="{{ route('denzibang.gambar', ['id' => $d->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="no_tgl_spmk">No/Tanggal/SPMK</label>
                            <input type="text" class="form-control" id="no_tgl_spmk" name="no_tgl_spmk" value="{{ $d->no_tgl_spmk }}" disabled>
                          </div>
                          <div class="form-group">
                            <label for="nama_kegiatan">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="{{ $d->nama_kegiatan }}" disabled>
                          </div>
                          <label>Upload Gambar</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="img_awal_{{ $d->id }}" name="img_awal" placeholder="Kondisi Awal">
                            <label class="custom-file-label" for="img_awal_{{ $d->id }}">
                              @if (!$d->img_awal)
                              Kondisi Awal
                              @else
                              {{ $d->img_awal }}
                              @endif
                            </label>
                          </div>
                          <div class="custom-file mt-3">
                            <input type="file" class="custom-file-input" id="img_saat_ini_{{ $d->id }}" name="img_saat_ini" placeholder="Kondisi Saat Ini">
                            <label class="custom-file-label" for="img_saat_ini_{{ $d->id }}">
                              @if (!$d->img_saat_ini)
                              Kondisi Saat Ini
                              @else
                              {{ $d->img_saat_ini }}
                              @endif
                            </label>
                          </div>
                          <div class="custom-file mt-3">
                            <input type="file" class="custom-file-input" id="img_detail_{{ $d->id }}" name="img_detail" placeholder="Detail Pekerjaan">
                            <label class="custom-file-label" for="img_detail_{{ $d->id }}">
                              @if (!$d->img_bukti)
                              Detail Pekerjaan
                              @else
                              {{ $d->img_bukti }}
                              @endif
                            </label>
                          </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-success">Simpan Gambar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Modal Upload Gambar -->
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

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Ambil semua input file dengan class "custom-file-input"
    const fileInputs = document.querySelectorAll('.custom-file-input');

    // Iterasi setiap input file
    fileInputs.forEach(input => {
      // Tambahkan event listener untuk setiap input file
      input.addEventListener('change', function() {
        // Ambil label yang sesuai dengan input file saat ini
        const label = document.querySelector(`label[for='${input.id}']`);

        // Jika file dipilih, perbarui teks label dengan nama file
        if (input.files.length > 0) {
          label.innerText = input.files[0].name;
        }
      });
    });
  });
</script>

@endsection