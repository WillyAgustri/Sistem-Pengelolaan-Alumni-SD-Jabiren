@extends('layout.app')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kelola Alumni</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="./">Home</a>
                </li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active" aria-current="page">
                    Kelola Alumni
                </li>
            </ol>
        </div>

        <!-- Row -->
        <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <button class="btn btn-info" data-toggle="modal" data-target="#modalTambahAlumni">
                                Tambah Data
                            </button>
                        </h6>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Foto</th>
                                    <th>Nisn</th>
                                    <th>Name</th>
                                    <th>Tahun</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Foto</th>
                                    <th>Nisn</th>
                                    <th>Name</th>
                                    <th>Tahun</th>

                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($alumnis as $alumni)
                                    <tr>
                                        <td>{{ $alumni->id_alumni }}</td>
                                        <td><img src="{{ asset('images/' . $alumni->foto) }}" width="200px"
                                                alt="Foto Alumni"></td>
                                        <td>{{ $alumni->nisn }}</td>
                                        <td>{{ $alumni->nama }}</td>
                                        <td>{{ $alumni->tahun }}</td>

                                        <td>
                                            <div class="btn-group dropleft align-items-center">
                                                <button type="button" class="btn btn-primary dropdown-toggle "
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <i class="fas fa-cogs"></i>
                                                </button>
                                                <div class="dropdown-menu shadow-lg">
                                                    <div class="text-center">
                                                        <p>
                                                            Menu
                                                            Aksi
                                                        </p>
                                                        <p>
                                                            ID Data
                                                            :1
                                                        </p>
                                                    </div>
                                                    <hr class="solid" />
                                                    <div class="text-center ">
                                                        <div class="btn btn-secondary" data-toggle="modal"
                                                            data-target="#modalLihatAlumni{{ $alumni->id_alumni }}">
                                                            Lihat Data
                                                        </div>
                                                        <div class="btn btn-warning mt-2" data-toggle="modal"
                                                            data-target="#modalUbahAlumni{{ $alumni->id_alumni }}">
                                                            Ubah
                                                            Data
                                                        </div>
                                                        <div class="btn btn-danger mt-2" data-toggle="modal"
                                                            data-target="#modalResetPassword{{ $alumni->id_alumni }}">
                                                            Reset Password
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- Modal Lihat Data --}}
                                    <div class="modal fade" id="modalLihatAlumni{{ $alumni->id_alumni }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Lihat Data Alumni</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>ID Data: {{ $alumni->id_alumni }}</p>
                                                    <p>Nama: {{ $alumni->nama }}</p>
                                                    <p>NISN: {{ $alumni->nisn }}</p>
                                                    <p>Tahun: {{ $alumni->tahun }}</p>
                                                    <p>Jenis Kelamin: {{ $alumni->j_kelamin }}</p>
                                                    <p>Tempat Lahir: {{ $alumni->tmpt_lahir }}</p>
                                                    <p>Tanggal Lahir: {{ $alumni->tgl_lahir }}</p>
                                                    <p>Nomor Telepon: {{ $alumni->phone_num }}</p>
                                                    <p>Alamat: {{ $alumni->alamat }}</p>
                                                    <img src="{{ asset('storage/' . $alumni->foto) }}" width="100px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Modal Ubah Data --}}
                                    <div class="modal fade" id="modalUbahAlumni{{ $alumni->id_alumni }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Alumni</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST"
                                                    action="{{ route('alumnis.update', $alumni->id_alumni) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="form-row">
                                                            <div class="form-group form-sm col">
                                                                <label for="name" class="col-form-label">Nama</label>
                                                                <input type="text" class="form-control" name="name"
                                                                    id="name" value="{{ $alumni->name }}">
                                                            </div>
                                                            <div class="form-group form-sm col">
                                                                <label for="nisn" class="col-form-label">NISN</label>
                                                                <input type="text" class="form-control" name="nisn"
                                                                    id="nisn" value="{{ $alumni->nisn }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group form-sm col">
                                                                <label for="tahun" class="col-form-label">Tahun</label>
                                                                <input type="text" class="form-control" name="tahun"
                                                                    id="tahun" value="{{ $alumni->tahun }}">
                                                            </div>
                                                            <div class="form-group form-sm col">
                                                                <label for="j_kelamin" class="col-form-label">Jenis
                                                                    Kelamin</label>
                                                                <select class="form-control" name="j_kelamin"
                                                                    id="j_kelamin">
                                                                    <option value="L"
                                                                        {{ $alumni->j_kelamin == 'L' ? 'selected' : '' }}>
                                                                        Laki-laki</option>
                                                                    <option value="P"
                                                                        {{ $alumni->j_kelamin == 'P' ? 'selected' : '' }}>
                                                                        Perempuan</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group form-sm col">
                                                                <label for="tmpt_lahir" class="col-form-label">Tempat
                                                                    Lahir</label>
                                                                <input type="text" class="form-control"
                                                                    name="tmpt_lahir" id="tmpt_lahir"
                                                                    value="{{ $alumni->tmpt_lahir }}">
                                                            </div>
                                                            <div class="form-group form-sm col">
                                                                <label for="tgl_lahir" class="col-form-label">Tanggal
                                                                    Lahir</label>
                                                                <input type="date" class="form-control"
                                                                    name="tgl_lahir" id="tgl_lahir"
                                                                    value="{{ $alumni->tgl_lahir }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group form-sm col">
                                                                <label for="phone_num" class="col-form-label">Nomor
                                                                    Telepon</label>
                                                                <input type="text" class="form-control"
                                                                    name="phone_num" id="phone_num"
                                                                    value="{{ $alumni->phone_num }}">
                                                            </div>
                                                            <div class="form-group form-sm col">
                                                                <label for="alamat"
                                                                    class="col-form-label">Alamat</label>
                                                                <input type="text" class="form-control" name="alamat"
                                                                    id="alamat" value="{{ $alumni->alamat }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group form-sm col">
                                                                <label for="foto" class="col-form-label">Foto</label>
                                                                <input type="text" class="form-control" name="foto"
                                                                    id="foto" value="{{ $alumni->foto }}">
                                                            </div>
                                                            <div class="form-group form-sm col">
                                                                <label for="password"
                                                                    class="col-form-label">Password</label>
                                                                <input type="text" class="form-control"
                                                                    name="password" id="password" value="">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group form-sm col">
                                                                <label for="password_confirmation"
                                                                    class="col-form-label">Konfirmasi Password</label>
                                                                <input type="text" class="form-control"
                                                                    name="password_confirmation"
                                                                    id="password_confirmation" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-success">Ubah Data</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Modal Hapus Data --}}
                                    <div class="modal fade" id="modalHapusAlumni{{ $alumni->id_alumni }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Alumni</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST"
                                                    action="{{ route('alumnis.destroy', $alumni->id_alumni) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-body">
                                                        <p>Apakah Anda yakin ingin menghapus data ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-success">Hapus Data</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Modal Reset Password --}}
                                    <div class="modal fade" id="modalResetPassword{{ $alumni->id_alumni }}"
                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST"
                                                    action="{{ route('alumnis.update', $alumni->id_alumni) }}">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-row">
                                                            <div class="form-group form-sm col">
                                                                <label for="new_password" class="col-form-label">New
                                                                    Password</label>
                                                                <input type="password" class="form-control"
                                                                    name="new_password" id="new_password" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-success">Reset
                                                            Password</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- Modal Tambah Data --}}
                                <div class="modal fade" id="modalTambahAlumni" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Alumni</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="{{ route('alumnis.store') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-row">
                                                        <div class="form-group form-sm col">
                                                            <label for="name" class="col-form-label">Nama</label>
                                                            <input type="text" class="form-control" name="name"
                                                                id="name" value="">
                                                        </div>
                                                        <div class="form-group form-sm col">
                                                            <label for="nisn" class="col-form-label">NISN</label>
                                                            <input type="text" class="form-control" name="nisn"
                                                                id="nisn" value="">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group form-sm col">
                                                            <label for="id_tahun" class="col-form-label">Tahun</label>
                                                            <input type="text" class="form-control" name="id_tahun"
                                                                id="id_tahun" value="">
                                                        </div>
                                                        <div class="form-group form-sm col">
                                                            <label for="j_kelamin" class="col-form-label">Jenis
                                                                Kelamin</label>
                                                            <select class="form-control" name="j_kelamin" id="j_kelamin">
                                                                <option value="L">Laki-laki</option>
                                                                <option value="P">Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group form-sm col">
                                                            <label for="tmpt_lahir" class="col-form-label">Tempat
                                                                Lahir</label>
                                                            <input type="text" class="form-control" name="tmpt_lahir"
                                                                id="tmpt_lahir" value="">
                                                        </div>
                                                        <div class="form-group form-sm col">
                                                            <label for="tgl_lahir" class="col-form-label">Tanggal
                                                                Lahir</label>
                                                            <input type="date" class="form-control" name="tgl_lahir"
                                                                id="tgl_lahir" value="">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group form-sm col">
                                                            <label for="phone_num" class="col-form-label">Nomor
                                                                Telepon</label>
                                                            <input type="text" class="form-control" name="phone_num"
                                                                id="phone_num" value="">
                                                        </div>
                                                        <div class="form-group form-sm col">
                                                            <label for="alamat" class="col-form-label">Alamat</label>
                                                            <input type="text" class="form-control" name="alamat"
                                                                id="alamat" value="">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group form-sm col">
                                                            <label for="foto" class="col-form-label">Foto</label>
                                                            <input type="file" class="form-control" name="foto"
                                                                id="foto" onchange="previewFile(this);">
                                                            <img id="previewImg" src=""
                                                                style="max-width: 130px; margin-top:20px;">
                                                        </div>
                                                        <div class="form-group form-sm col">
                                                            <label for="password" class="col-form-label">Password</label>
                                                            <input type="text" class="form-control" name="password"
                                                                id="password" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-success">Tambah Data</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    function previewFile(input) {
                                        var file = $("input[type=file]").get(0).files[0];
                                        if (file) {
                                            var reader = new FileReader();
                                            reader.onload = function() {
                                                $("#previewImg").attr("src", reader.result);
                                            }
                                            reader.readAsDataURL(file);
                                        }
                                    }
                                </script>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--Row-->

        <!-- Modal Logout -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">
                            Ohh No!
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to logout?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                            Cancel
                        </button>
                        <a href="login.html" class="btn btn-primary">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---Container Fluid-->
    @include('sweetalert::alert')
@endsection
