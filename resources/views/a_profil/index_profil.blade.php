@extends('layout.app')

@section('content')
    <div class="container" id="container-wrapper">
        <div class="card p-3">
            @if ($errors->any())
                <div class="alert alert-warning">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row d-flex justify-content-between p-3">
                <!-- Form di kiri -->
                <div class="col-sm-4 mb-4">
                    <h2 class="">Informasi Biodata</h2>
                    <div class="card" style="height:250px;width:200px;">
                        <img src="@if (auth()->user()->foto) {{ asset('images/' . auth()->user()->foto) }}@else https://via.placeholder.com/400 @endif"
                            class="img-fluid   d-block" style="max-height: 100%; max-width: 100%;" alt="Gambar">
                    </div>

                    <div class="d-flex mb-1 mt-2">
                        <div class="mr-2">
                            <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal"
                                data-target="#modalGantiFoto">
                                <i class="fa fa-camera" aria-hidden="true"></i>
                                Ganti Foto
                            </button>

                            <!-- Modal Ganti Foto -->
                            <div class="modal fade" id="modalGantiFoto" tabindex="-1" role="dialog"
                                aria-labelledby="modalGantiFotoLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalGantiFotoLabel">Ganti Foto Profil</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Upload foto profil baru anda di sini.</p>
                                            <form action="{{ route('ganti_foto', [Auth::user()->id_alumni]) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <input type="file" name="foto" class="form-control-file">
                                                </div>

                                                <div class="d-flex justify-content-end mt-2">
                                                    <button type="button" class="btn btn-sm btn-outline-danger mr-2"
                                                        data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal"
                            data-target="#modalGantiPassword">
                            <i class="fa fa-key" aria-hidden="true"></i>
                            Ganti Password
                        </button>
                        <!-- Modal Ganti Password -->
                        <div class="modal fade" id="modalGantiPassword" tabindex="-1" role="dialog"
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
                                        <form action="{{ route('ganti_password', [Auth::user()->id_alumni]) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="old_password" class="form-label">Password Lama</label>
                                                <input type="password" class="form-control" id="old_password"
                                                    name="old_password">
                                            </div>

                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password Baru</label>
                                                <input type="password" class="form-control" id="password" name="password">
                                            </div>

                                            <div class="mb-3">
                                                <label for="password_confirmation" class="form-label">Konfirmasi Password
                                                    Baru</label>
                                                <input type="password" class="form-control" id="password_confirmation"
                                                    name="password_confirmation">
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-danger"
                                                    data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form di kanan -->
                {{-- <div class="col-lg-6 align-items-center p-3">

                </div> --}}
            </div>

            <div class="row d-flex me-2">
                <div class="col-lg-6 align-items-center p-3">
                    <div class="form-group">
                        <label for="exampleInputPhone1">NISN</label>
                        <input type="text" class="form-control" id="exampleInputPhone1"
                            value="{{ Auth::user()->nisn }}" placeholder="NISN" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                            value="{{ Auth::user()->name }}" placeholder="Nama" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Jenis kelamin</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                            value="{{ Auth::user()->j_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}"
                            placeholder="Jenis Kelamin" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Alamat</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                            value="{{ Auth::user()->alamat == '' ? '-' : Auth::user()->alamat }}"
                            placeholder="Jenis Kelamin" readonly>
                    </div>
                </div>
                <div class="col-lg-6 align-items-center p-3">
                    <div class="form-group">
                        <label for="exampleInputPhone1">Tahun</label>
                        <input type="text" class="form-control" id="exampleInputPhone1"
                            value="{{ Auth::user()->id_tahun }}" placeholder="Tahun" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tempat Lahir</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                            value="{{ Auth::user()->tmpt_lahir == '' ? '-' : Auth::user()->tmpt_lahir }}"
                            placeholder="Tempat Lahir" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Lahir</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                            value="{{ Auth::user()->tgl_lahir == '' ? '-' : Auth::user()->tgl_lahir }}"
                            placeholder="Tanggal Lahir" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nomor Telepon</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                            value="{{ Auth::user()->phone_num }}" placeholder="Nama Sekolah" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Sekolah Jenjang Berikutnya</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                            value="{{ Auth::user()->lnjt_sklh == '' ? '-' : Auth::user()->lnjt_sklh }}"
                            placeholder="Nama Sekolah" readonly>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#editProfilModal">
                            <i class="fas fa-edit mr-2"></i>
                            Edit Biodata
                        </button>
                    </div>
                    {{-- Modal Edit Profil --}}
                    <div class="modal fade" id="editProfilModal" tabindex="-1" role="dialog"
                        aria-labelledby="editProfilModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editProfilModalLabel">Edit Biodata</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('ganti_biodata', [Auth::user()]) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nisn">NISN</label>
                                                    <input type="text" class="form-control" name="nisn"
                                                        id="nisn" value="{{ Auth::user()->nisn }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Nama</label>
                                                    <input type="text" class="form-control" name="name"
                                                        id="name" value="{{ Auth::user()->name }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="j_kelamin">Jenis Kelamin</label>
                                                    <select name="j_kelamin" id="j_kelamin" class="form-control"
                                                        required>
                                                        <option value="L"
                                                            {{ Auth::user()->j_kelamin == 'L' ? 'selected' : '' }}>
                                                            Laki-laki</option>
                                                        <option value="P"
                                                            {{ Auth::user()->j_kelamin == 'P' ? 'selected' : '' }}>
                                                            Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="alamat">Alamat</label>
                                                    <input type="text" class="form-control" name="alamat"
                                                        id="alamat" value="{{ Auth::user()->alamat }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id_tahun">Tahun</label>
                                                    <select name="id_tahun" id="id_tahun" class="form-control">
                                                        @foreach ($tahuns as $t)
                                                            <option value="{{ $t->tahun }}"
                                                                {{ $t->tahun == Auth::user()->id_tahun ? 'selected' : '' }}>
                                                                {{ $t->tahun }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tmpt_lahir">Tempat Lahir</label>
                                                    <input name="tmpt_lahir" id="tmpt_lahir" class="form-control"
                                                        value="{{ Auth::user()->tmpt_lahir }}"></input>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                                    <input type="date" name="tgl_lahir" id="tgl_lahir"
                                                        class="form-control"
                                                        value="{{ Auth::user()->tgl_lahir }}"></input>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone_num">Nomor Telepon</label>
                                                    <input type="text" class="form-control" name="phone_num"
                                                        id="phone_num" value="{{ Auth::user()->phone_num }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="lnjt_sklh">Sekolah Jenjang Berikutnya</label>
                                                    <input type="text" class="form-control" name="lnjt_sklh"
                                                        id="lnjt_sklh" value="{{ Auth::user()->lnjt_sklh }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="button" class="btn btn-outline-danger mr-2"
                                                data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-success mr-2">Simpan</button>
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
@endsection
