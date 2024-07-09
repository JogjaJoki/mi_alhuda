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
                            <h3 class="card-title"> Pengujian Enkripsi Blowfish</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Key</label>
                                <input type="text" id="blowfishKeyEncrypt" name="blowfishKeyEncrypt" class="form-control" placeholder="Key" required>
                            </div>
                            <div class="form-group">
                                <label>Plain Text</label>
                                <input type="text" id="blowfishPlainEncrypt" name="blowfishPlainEncrypt" class="form-control" placeholder="Plain Text" required>
                            </div>
                            <div class="form-group">
                                <label>Chiper Text</label>
                                <input type="text" readonly id="blowfishChiperTextEncrypt" name="blowfishChiperTextEncrypt" class="form-control" placeholder="Chiper Text" required>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="button" onclick="pengujianEnkripsiBlowfish()" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Perhitungan Pengujian Enkripsi Blowfish</h3>
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
                            <h3 class="card-title"> Pengujian Dekripsi Blowfish</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Key</label>
                                <input type="text" id="blowfishKeyDecrypt" name="blowfishKeyDecrypt" class="form-control" placeholder="Key" required>
                            </div>
                            <div class="form-group">
                                <label>Chiper Text</label>
                                <input type="text" id="blowfishChiperTextDecrypt" name="blowfishChiperTextDecrypt" class="form-control" placeholder="Chiper Text" required>
                            </div>
                            <div class="form-group">
                                <label>Plain Text</label>
                                <input type="text" readonly id="blowfishPlainDecrypt" name="blowfishPlainDecrypt" class="form-control" placeholder="Plain Text" required>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="button" onclick="pengujianDekripsiBlowfish()" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Perhitungan Pengujian Dekripsi Blowfish</h3>
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
        const pengujianEnkripsiBlowfish = () => {
            let blowfishKeyEncrypt = document.getElementById("blowfishKeyEncrypt");
            let blowfishPlainEncrypt = document.getElementById("blowfishPlainEncrypt");
            let blowfishChiperTextEncrypt = document.getElementById("blowfishChiperTextEncrypt");
            // console.log(blowfishKeyEncrypt.value);
            let blowfish = new Blowfish(blowfishKeyEncrypt.value, true);

            let blowfishResult = blowfish.encrypt(blowfishPlainEncrypt.value);
            blowfishChiperTextEncrypt.value = blowfishResult;
            // console.log(blowfish.decrypt(blowfish.encrypt("ini adalah kalimat yang akan di enkripsi menggunakan algoritma blowfish")));
            const sortedDataArray = Object.values(blowfish.getLogText()).sort((a, b) => a.id - b.id);
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

        const pengujianDekripsiBlowfish = () => {
            let blowfishKeyDecrypt = document.getElementById("blowfishKeyDecrypt");
            let blowfishPlainDecrypt = document.getElementById("blowfishPlainDecrypt");
            let blowfishChiperTextDecrypt = document.getElementById("blowfishChiperTextDecrypt");
            // console.log(blowfishKeyEncrypt.value);
            let blowfish = new Blowfish(blowfishKeyEncrypt.value, true);

            let blowfishResult = blowfish.decrypt(blowfishChiperTextDecrypt.value);
            blowfishPlainDecrypt.value = blowfishResult;
            // console.log(blowfish.decrypt(blowfish.encrypt("ini adalah kalimat yang akan di enkripsi menggunakan algoritma blowfish")));
            const sortedDataArray = Object.values(blowfish.getLogText()).sort((a, b) => a.id - b.id);
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
