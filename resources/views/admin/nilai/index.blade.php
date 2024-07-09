@extends('admin.layout.app')
@section('content')
    <div class="container-fluid my-3" style="padding-left: 1%;">
        <a href="{{ route('admin.nilai.add') }}" class="btn btn-primary">Tambah Data</a>
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
                        <div class="card-header d-flex flex-column">
                            <h3 class="card-title text-start h3">Data Nilai</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Siswa</th>
                                        <th>Kelas</th>
                                        <th>Nama Pelajaran</th>
                                        <th>Nilai Pelajaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($nilai as $index => $row)
                                        <tr>
                                            <td>{{ ++$index }}</td>
                                            <td>{{ $row->siswa->nama }}</td>
                                            <td>{{ $row->siswa->kelas->nama_kelas }}</td>
                                            <td>{{ $row->pelajaran->nama }}</td>
                                            <td class="nilaiRow">{{ $row->nilai }}</td>
                                            <td>
                                                <a href="{{ route('admin.nilai.edit', ['id' => $row->id]) }}"
                                                    class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('admin.nilai.delete', ['id' => $row->id]) }}"
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
    <script>
        let decryptNilaiBtn = document.getElementById('decryptNilai');
        decryptNilaiBtn.addEventListener('click', function (){
            const nilaiRows = document.querySelectorAll('.nilaiRow');

            nilaiRows.forEach(function (nilaiRow) {
                const plain = nilaiRow.textContent;
                const decryptedNilai = decryptWithVigblow(plain);
                nilaiRow.textContent = decryptedNilai;
            });


        })

        function decryptWithVigblow(data) {
                // const passUtama = localStorage.getItem('passUtama');
                const passUtama = document.getElementById('blowfishKey');
                // const passSekunder = localStorage.getItem('passSekunder');
                const passSekunder = document.getElementById('vigenereKey');
                // const vb = new Vigblow("Hello World !!!", "KEYKeY", false);
                const vb = new Vigblow(passUtama.value, passSekunder.value, false);
                let decrypted = vb.decrypt(data);
                return decrypted; 
        }
        
        document.addEventListener('DOMContentLoaded', function () {
            

            
        });
    </script>
@endsection
