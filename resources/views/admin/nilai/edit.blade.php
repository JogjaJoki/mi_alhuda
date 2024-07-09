@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Edit Nilai</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.nilai.update') }}" method="POST" id="formEditNilai">
                            @csrf
                            <input type="hidden" name="id" value="{{ $nilai->id }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Mata Pelajaran</label>
                                    <select name="kode_pelajaran" class="form-control" id="">
                                        <?php
                                            foreach($pelajaran as $p){
                                        ?>
                                            <option value="<?= $p->kode_pelajaran ?>" <?= $nilai->kode_pelajaran == $p->kode_pelajaran ? 'selected' : '' ?>>{{ $p->kode_pelajaran . " - " . $p->nama }}</option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Siswa</label>
                                    <select name="NIS" class="form-control" id="">
                                        <?php
                                            foreach($siswa as $s){
                                        ?>
                                            <option value="<?= $s->NIS ?>" <?= $nilai->NIS == $s->NIS ? 'selected' : '' ?>>{{ $s->nama . " - " . $s->NIS }}</option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nilai Pelajaran</label>
                                    <input type="text" id="nilai" name="nilai" value="{{ $nilai->nilai }}" class="form-control" placeholder="Nilai Pelajaran" required>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.nilai.index') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
