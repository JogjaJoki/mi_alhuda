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
                            <h3 class="card-title"> Pengujian Enkripsi Vigenere</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Key</label>
                                <input type="text" id="vigenereKeyEncrypt" name="vigenereKeyEncrypt" class="form-control" placeholder="Key" required>
                            </div>
                            <div class="form-group">
                                <label>Plain Text</label>
                                <input type="text" id="vigenerePlainEncrypt" name="vigenerePlainEncrypt" class="form-control" placeholder="Plain Text" required>
                            </div>
                            <div class="form-group">
                                <label>Chiper Text</label>
                                <input type="text" readonly id="vigenereChiperTextEncrypt" name="vigenereChiperTextEncrypt" class="form-control" placeholder="Chiper Text" required>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="button" onclick="pengujianEnkripsiVigenere()" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Perhitungan Pengujian Enkripsi Vigenere</h3>
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
                            <h3 class="card-title"> Pengujian Dekripsi Vigenere</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Key</label>
                                <input type="text" id="vigenereKeyDecrypt" name="vigenereKeyDecrypt" class="form-control" placeholder="Key" required>
                            </div>
                            <div class="form-group">
                                <label>Chiper Text</label>
                                <input type="text" id="vigenereChiperTextDecrypt" name="vigenereChiperTextDecrypt" class="form-control" placeholder="Chiper Text" required>
                            </div>
                            <div class="form-group">
                                <label>Plain Text</label>
                                <input type="text" readonly id="vigenerePlainDecrypt" name="vigenerePlainDecrypt" class="form-control" placeholder="Plain Text" required>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="button" onclick="pengujianDekripsiVigenere()" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Perhitungan Pengujian Dekripsi Vigenere</h3>
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
        const pengujianEnkripsiVigenere = () => {
            let vigenereKeyEncrypt = document.getElementById("vigenereKeyEncrypt");
            let vigenerePlainEncrypt = document.getElementById("vigenerePlainEncrypt");
            let vigenereChiperTextEncrypt = document.getElementById("vigenereChiperTextEncrypt");
            // console.log(vigenereKeyEncrypt.value);
            let vigenere = new Vigenere(vigenereKeyEncrypt.value, true);

            let vigenereResult = vigenere.encrypt(vigenerePlainEncrypt.value);
            vigenereChiperTextEncrypt.value = vigenereResult;
            // console.log(vigenere.decrypt(vigenere.encrypt("ini adalah kalimat yang akan di enkripsi menggunakan algoritma vigenere")));
            const sortedDataArray = Object.values(vigenere.getLogText()).sort((a, b) => a.id - b.id);
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

        const pengujianDekripsiVigenere = () => {
            let vigenereKeyDecrypt = document.getElementById("vigenereKeyDecrypt");
            let vigenerePlainDecrypt = document.getElementById("vigenerePlainDecrypt");
            let vigenereChiperTextDecrypt = document.getElementById("vigenereChiperTextDecrypt");
            // console.log(vigenereKeyEncrypt.value);
            let vigenere = new Vigenere(vigenereKeyEncrypt.value, true);

            let vigenereResult = vigenere.decrypt(vigenereChiperTextDecrypt.value);
            vigenerePlainDecrypt.value = vigenereResult;
            // console.log(vigenere.decrypt(vigenere.encrypt("ini adalah kalimat yang akan di enkripsi menggunakan algoritma vigenere")));
            const sortedDataArray = Object.values(vigenere.getLogText()).sort((a, b) => a.id - b.id);
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
