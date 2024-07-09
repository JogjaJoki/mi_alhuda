@extends('admin.layout.app')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Password Data</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Password Pertama</label>
                                <input type="text" id="passUtama" name="pass_utama" class="form-control" placeholder="Password Utama" required>
                            </div>
                            <div class="form-group">
                                <label>Password Kedua</label>
                                <input type="text" id="passSekunder" name="pass_sekunder" class="form-control" placeholder="Password Sekunder" required>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="button" onclick="saveToLocalStorage()" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
    <script>
        function saveToLocalStorage() {
            // Ambil nilai dari input
            const passUtamaValue = document.getElementById('passUtama').value;
            const passSekunderValue = document.getElementById('passSekunder').value;

            // Simpan ke local storage
            localStorage.setItem('passUtama', passUtamaValue);
            localStorage.setItem('passSekunder', passSekunderValue);

            document.getElementById('passUtama').value = '';
            document.getElementById('passSekunder').value = '';

            // Tambahan log atau tindakan lain yang Anda inginkan
            console.log('Data disimpan di local storage.');
        }
    </script>
@endsection
