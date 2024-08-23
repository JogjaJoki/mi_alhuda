@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Edit Data Guru</h3>
                        </div>
                        @if (session('nip-warn'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('nip-warn') }}
                            </div>
                        @endif
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.guru.update') }}" id="formAddGuruu" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $guru->id }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Photo Guru</label>
                                    <div>
                                        <img id="photoPreview" src="{{ asset($guru->detail->photo ? 'image/photo-guru/' . $guru->detail->photo : '') }}" alt="Your image" style="display: none; width: 200px; height: auto; margin-bottom: 10px;"/>
                                        <input type="file" name="photo" class="form-control" id="photoInput" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Induk Pegawai</label>
                                    <input type="text" value="{{ $guru->detail->NIP }}" name="nip" class="form-control" placeholder="NIP" required>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" value="{{ $guru->name }}" name="name" class="form-control" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" value="{{ $guru->email }}" name="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" value="{{ $guru->detail->phone }}" name="phone" class="form-control" placeholder="Phone" required>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" value="{{ $guru->detail->address }}" name="address" class="form-control" placeholder="Address" required>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.guru.index') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.getElementById('photoInput').addEventListener('change', function(event) {
            const [file] = event.target.files;
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById('photoPreview');
                    img.src = e.target.result;
                    img.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
