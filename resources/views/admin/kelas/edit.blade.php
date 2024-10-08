@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Edit Kelas</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.kelas.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $kelas->id }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Kelas</label>
                                    <input type="text" value="{{ $kelas->nama_kelas }}" name="nama_kelas" class="form-control" placeholder="Nama Kelas" required>
                                </div>
                                <div class="form-group">
                                    <label>Wali Kelas </label>
                                    <select name="wali_kelas" id="wali_kelas" class="form-control" required>
                                        <option value="#">-- Pilih Wali Kelas --</option>
                                        @foreach($guru as $g)
                                            <option value="{{ $g->id }}" <?= $g->id == $kelas->user_id ? 'selected' : '' ?>>{{ $g->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.kelas.index') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
