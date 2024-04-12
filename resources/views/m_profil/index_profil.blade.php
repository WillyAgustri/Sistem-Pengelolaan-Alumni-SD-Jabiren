@extends('layout.app')

@section('content')
    <div class="container" id="container-wrapper">
        <div class="card p-3">
            @if ($errors->any())
                <div class="alert alert-warning">
                    <p>Gagal Mengubah Data</p>
                    <ul>

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row
                    d-flex justify-content-between p-3">
                <!-- Form di kiri -->
                <div class="col-sm-4 mb-4">
                    <h2 class="">Informasi Profil</h2>
                    <div class="card" style='height:200px;width:200px'>
                        <img src="{{ asset('images/' . Auth::user()->foto) }}" class="img-fluid" alt="Gambar">
                    </div>

                    <div class="d-flex mb-1 mt-2">
                        <div class="mr-2">
                            <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal"
                                data-target="#gantiFoto">
                                Ganti Foto
                            </button>
                        </div>

                        <!-- Modal Ganti Foto -->
                        <div class="modal fade" id="gantiFoto" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ganti Foto Profil</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('setting-profil.ganti_foto', ['id' => Auth::user()->id]) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group">
                                                <input type="file" class="form-control-file" name="foto"
                                                    onchange="previewImage(this)">
                                                <img src="" class="img-thumbnail img-preview mt-3"
                                                    style="display:none">
                                            </div>
                                    </div>
                                    <script>
                                        function previewImage(input) {
                                            var file = $("input[type=file]").get(0).files[0];
                                            if (file) {
                                                var reader = new FileReader();
                                                reader.onload = function() {
                                                    $('.img-preview').attr('src', reader.result);
                                                }
                                                reader.readAsDataURL(file);
                                                $('.img-preview').show();
                                            }
                                        }
                                    </script>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal"
                            data-target="#gantiPassword">
                            Ganti Password
                        </button>
                        <!-- Modal Ganti Password -->
                        <div class="modal fade" id="gantiPassword" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form
                                            action="{{ route('setting-profil.ganti_password', ['id' => Auth::user()->id]) }}"
                                            method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group">
                                                <label for="old_password">Password Lama</label>
                                                <input type="password" class="form-control" id="old_password"
                                                    name="old_password" aria-describedby="passwordHelp"
                                                    placeholder="Masukkan password lama" value="{{ old('old_password') }}">
                                                <small id="passwordHelp" class="form-text text-muted">Masukkan password
                                                    lama
                                                    anda dengan benar.</small>
                                                @error('old_password')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password Baru</label>
                                                <input type="password" class="form-control" id="password" name="password"
                                                    aria-describedby="passwordHelp" placeholder="Masukkan password baru"
                                                    value="{{ old('password') }}">
                                                <small id="passwordHelp" class="form-text text-muted">Masukkan password
                                                    baru anda.</small>
                                                @error('password')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="passwordConfirm">Konfirmasi Password</label>
                                                <input type="password" class="form-control" id="passwordConfirm"
                                                    name="password_confirmation" aria-describedby="passwordConfirmHelp"
                                                    placeholder="Konfirmasi password baru">
                                                <small id="passwordConfirmHelp" class="form-text text-muted">Masukkan
                                                    ulang
                                                    password baru anda.</small>
                                                @error('password_confirmation')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form di kanan -->

                <div class="col-lg-6 align-items-center p-3">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="exampleInputPhone1"
                            value="{{ Auth::user()->id }}" placeholder="NISN">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhone1">Nama</label>
                        <input type="text" class="form-control" id="exampleInputPhone1"
                            value="{{ Auth::user()->name }}" placeholder="Name" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Username (Untuk Login)</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                            value="{{ Auth::user()->username }}" placeholder="Username" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Telepon (Aktif)</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                            value="{{ Auth::user()->phone_num }}" placeholder="Telepon" disabled>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#editProfilModal">
                            Edit Profil
                        </button>
                        <!-- Modal Update Profile -->
                        <div class="modal fade" id="editProfilModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form
                                            action="{{ route('setting-profil.update', ['setting_profil' => Auth::user()->id]) }}"
                                            method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Nama</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Nama" value="{{ Auth::user()->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" id="username"
                                                    name="username" placeholder="Username"
                                                    value="{{ Auth::user()->username }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="phone_num">Telepon</label>
                                                <input type="text" class="form-control" id="phone_num"
                                                    name="phone_num" placeholder="Telepon"
                                                    value="{{ Auth::user()->phone_num }}">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    </div>
    @include('sweetalert::alert')
@endsection
