@extends('components.main')

@section('title')
<title>SIWAS | Data Kesatuan</title>
@endsection('title')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Data Kesatuan</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Kesatuan</li>
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
            <h3 class="card-title align-middle">Data Kesatuan</h3>
            <a href="#" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#add-kotama">Tambah Kesatuan</a>

            <!-- Modal -->
            <div class="modal fade" id="add-kotama">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title"><b>Tambah Data Kotama</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="{{ route('kesatuan.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="kotama">Kotama</label>
                        <input type="text" class="form-control" id="kotama" name="kotama" placeholder="Kotama">
                      </div>
                      <div class="form-group">
                        <label for="kesatuan">Kesatuan</label>
                        <input type="text" class="form-control" id="kesatuan" name="kesatuan" placeholder="Kesatuan">
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
            <!-- Modal -->

          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr class="text-center">
                  <th class="align-middle" width="2">No</th>
                  <th class="align-middle">Kotama</th>
                  <th class="align-middle">Kesatuan</th>
                  <th class="align-middle">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $d)
                <tr class="text-center">
                  <td class="align-middle">{{ $loop->iteration}} </td>
                  <td class="align-middle">{{ $d->kotama }}</td>
                  <td class="align-middle">{{ $d->kesatuan }}</td>
                  <td class="align-middle">
                    <a href="{{ route('kesatuan.edit', ['id' => $d->id]) }}" data-toggle="modal" data-target="#edit-kotama{{ $d->id }}"><i class="far fa-edit"></i></a>
                    <a href="#" class="ml-2" data-toggle="modal" data-target="#modal-hapus{{ $d->id }}"><i class=" far fa-trash-alt"></i></a>
                  </td>
                </tr>

                <!-- Modal Edit -->
                <div class="modal fade" id="edit-kotama{{ $d->id }}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title"><b>Edit Data Kotama</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="{{ route('kesatuan.update', ['id' => $d->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="kotama">Kotama</label>
                            <input type="text" class="form-control" id="kotama" name="kotama" value="{{ $d->kotama }}" placeholder="Kotama">
                          </div>
                          <div class="form-group">
                            <label for="kesatuan">Kesatuan</label>
                            <input type="text" class="form-control" id="kesatuan" name="kesatuan" value="{{ $d->kesatuan }}" placeholder="Kesatuan">
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
                        <h4 class="modal-title">Hapus User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Apakah Anda Yakin Akan Hapus <b>{{ $d->kotama }}</b> ?</p>
                      </div>
                      <div class="modal-footer">
                        <form action="{{ route('kesatuan.delete', ['id' => $d->id]) }}" method="POST">
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