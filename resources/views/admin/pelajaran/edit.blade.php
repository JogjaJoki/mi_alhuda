@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Tambah Pelajaran</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.pelajaran.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="kode_pelajaran" value="<?= $pelajaran->kode_pelajaran ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Pelajaran</label>
                                    <input type="text" name="nama" value="<?= $pelajaran->nama ?>" class="form-control" placeholder="Nama Pelajaran" required>
                                </div>
                                <div class="form-group">
                                    <label>Bobot Pelajaran</label>
                                    <input type="number" step="0.1" value="<?= $pelajaran->bobot ?>" name="bobot" class="form-control" placeholder="Nama Pelajaran" required>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.pelajaran.index') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
