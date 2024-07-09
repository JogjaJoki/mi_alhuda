@extends('admin.layout.app')
@section('content')
    <div class="container-fluid my-3" style="padding-left: 1%;">
        <a href="{{ route('admin.pelajaran.add') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    <br>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {!! implode('', $errors->all('<li>:message</li>')) !!}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Pelajaran</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Pelajaran</th>
                                        <th>Nama Pelajaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pelajaran as $index => $row)
                                        <tr>
                                            <td>{{ ++$index }}</td>
                                            <td>{{ $row->kode_pelajaran }}</td>
                                            <td>{{ $row->nama }}</td>
                                            <td>
                                                <a href="{{ route('admin.pelajaran.edit', ['id' => $row->kode_pelajaran]) }}"
                                                    class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('admin.pelajaran.delete', ['id' => $row->kode_pelajaran]) }}"
                                                    onclick="return confirm('Are you sure?'); return false;"
                                                    class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
