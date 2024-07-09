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
                            <h3 class="card-title"> Pengujian Enkripsi Vigblow</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Blowfish Key</label>
                                <input type="text" id="vigblowBlowfishKeyEncrypt" name="vigblowBlowfishKeyEncrypt" class="form-control" placeholder="Blowfish Key" required>
                            </div>
                            <div class="form-group">
                                <label>Vigenere Key</label>
                                <input type="text" id="vigblowVigenereKeyEncrypt" name="vigblowVigenereKeyEncrypt" class="form-control" placeholder="Vigenere Key" required>
                            </div>
                            <div class="form-group">
                                <label>Plain Text</label>
                                <input type="text" id="vigblowPlainEncrypt" name="vigblowPlainEncrypt" class="form-control" placeholder="Plain Text" required>
                            </div>
                            <div class="form-group">
                                <label>Chiper Text</label>
                                <input type="text" readonly id="vigblowChiperTextEncrypt" name="vigblowChiperTextEncrypt" class="form-control" placeholder="Chiper Text" required>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="button" onclick="pengujianEnkripsiVigblow()" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Perhitungan Pengujian Enkripsi Vigblow</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Logging</label>
                                <textarea name="loggingEncrypt" readonly class="form-control" id="loggingEncrypt" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Pengujian Dekripsi Vigblow</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Blowfish Key</label>
                                <input type="text" id="vigblowBlowfishKeyDecrypt" name="vigblowBlowfishKeyDecrypt" class="form-control" placeholder="Blowfish Key" required>
                            </div>
                            <div class="form-group">
                                <label>Vigenere Key</label>
                                <input type="text" id="vigblowVigenereChiperTextDecrypt" name="vigblowVigenereChiperTextDecrypt" class="form-control" placeholder="Vigenere Key" required>
                            </div>
                            <div class="form-group">
                                <label>Chiper Text</label>
                                <input type="text" id="vigblowChiperTextDecrypt" name="vigblowChiperTextDecrypt" class="form-control" placeholder="Chiper Text" required>
                            </div>
                            <div class="form-group">
                                <label>Plain Text</label>
                                <input type="text" readonly id="vigblowPlainDecrypt" name="vigblowPlainDecrypt" class="form-control" placeholder="Plain Text" required>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="button" onclick="pengujianDekripsiVigblow()" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Perhitungan Pengujian Dekripsi Vigblow</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Logging</label>
                                <textarea name="loggingDecrypt" readonly class="form-control" id="loggingDecrypt" cols="30" rows="10"></textarea>
                            </div>
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
        const pengujianEnkripsiVigblow = () => {
            let vigblowBlowfishKeyEncrypt = document.getElementById("vigblowBlowfishKeyEncrypt");
            let vigblowVigenereKeyEncrypt = document.getElementById("vigblowVigenereKeyEncrypt");
            let vigblowPlainEncrypt = document.getElementById("vigblowPlainEncrypt");
            let vigblowChiperTextEncrypt = document.getElementById("vigblowChiperTextEncrypt");
            // console.log(vigblowKeyEncrypt.value);
            let vigblow = new Vigblow(vigblowBlowfishKeyEncrypt.value, vigblowVigenereKeyEncrypt.value, true);

            let vigblowResult = vigblow.encrypt(vigblowPlainEncrypt.value);
            vigblowChiperTextEncrypt.value = vigblowResult;
            // console.log(vigblow.decrypt(vigblow.encrypt("ini adalah kalimat yang akan di enkripsi menggunakan algoritma vigblow")));
            const sortedDataArray = Object.values(vigblow.getLogText()).sort((a, b) => a.id - b.id);
            // console.log(sortedDataArray);
            const loggingTextarea = document.getElementById('loggingEncrypt');

            // string untuk menyimpan data yang akan ditambahkan ke textarea
            let loggingText = '';

            // Loop melalui setiap objek dalam array dan tambahkan ke string
            sortedDataArray.forEach(data => {
                loggingText += `${data.id}. ${data.name}: \n${data.value}\n\n`;
            });

            // Setel nilai textarea dengan string yang sudah dibuat
            loggingTextarea.value = loggingText;
        }

        const pengujianDekripsiVigblow = () => {
            let vigblowBlowfishKeyDecrypt = document.getElementById("vigblowBlowfishKeyDecrypt");
            let vigblowVigenereChiperTextDecrypt = document.getElementById("vigblowVigenereChiperTextDecrypt");
            let vigblowPlainDecrypt = document.getElementById("vigblowPlainDecrypt");
            let vigblowChiperTextDecrypt = document.getElementById("vigblowChiperTextDecrypt");
            // console.log(vigblowKeyEncrypt.value);
            let vigblow = new Vigblow(vigblowBlowfishKeyDecrypt.value, vigblowVigenereChiperTextDecrypt.value, true);

            let vigblowResult = vigblow.decrypt(vigblowChiperTextDecrypt.value);
            vigblowPlainDecrypt.value = vigblowResult;
            // console.log(vigblow.decrypt(vigblow.encrypt("ini adalah kalimat yang akan di enkripsi menggunakan algoritma vigblow")));
            const sortedDataArray = Object.values(vigblow.getLogText()).sort((a, b) => a.id - b.id);
            // console.log(sortedDataArray);
            const loggingTextarea = document.getElementById('loggingDecrypt');

            // string untuk menyimpan data yang akan ditambahkan ke textarea
            let loggingText = '';

            // Loop melalui setiap objek dalam array dan tambahkan ke string
            sortedDataArray.forEach(data => {
                loggingText += `${data.id}. ${data.name}: \n${data.value}\n\n`;
            });

            // Setel nilai textarea dengan string yang sudah dibuat
            loggingTextarea.value = loggingText;
        }
    </script>
@endsection
