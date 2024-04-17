@extends('layout.app')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kelola Admin</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="./">Home</a>
                </li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active" aria-current="page">
                    Kelola Admin
                </li>
            </ol>
        </div>

        <!-- Row -->
        <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
                <div class="card mb-4">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                        <h6 class="m-0 font-weight-bold text-primary">
                            <button class="btn btn-info" data-toggle="modal" data-target="#modalTambahAdmin">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data
                            </button>

                        </h6>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Foto</th>
                                    <th>Name</th>
                                    <th>Usename</th>
                                    <th>Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Foto</th>
                                    <th>Name</th>
                                    <th>Usename</th>
                                    <th>Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td>{{ $admin->id }}</td>
                                        <td><img src="{{ $admin->foto ? asset('images/' . $admin->foto) : 'https://via.placeholder.com/150' }}"
                                                width="100px" alt="Foto Admin"></td>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->username }}</td>
                                        <td>{{ $admin->phone_num }}</td>
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
                                                            ID Data :
                                                            {{ $admin->id }}
                                                        </p>
                                                    </div>
                                                    <hr class="solid" />
                                                    <div class="text-center mt-2">
                                                        <div class="btn btn-warning" data-toggle="modal"
                                                            data-target="#modalUbahAdmin{{ $admin->id }}">
                                                            <i class="fas fa-edit mr-2"></i> Ubah
                                                            Data
                                                        </div>
                                                        <div class="btn btn-danger mt-2" data-toggle="modal"
                                                            data-target="#modalHapusAdmin{{ $admin->id }}">
                                                            <i class="fas fa-trash-alt mr-2"></i> Hapus
                                                            Data
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- Modal Ubah Data --}}
                                    <div class="modal fade" id="modalUbahAdmin{{ $admin->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Admin</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="{{ route('admins.update', $admin->id) }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="form-group form-sm">
                                                            <label for="name" class=" col-form-label">Nama:</label>
                                                            <input type="text" class="form-control" name="name"
                                                                id="name" value="{{ $admin->name }}">
                                                        </div>
                                                        <div class="form-group  form-sm">
                                                            <label for="username" class=" col-form-label">Username (Untuk
                                                                Login)</label>
                                                            <input type="text" class="form-control" name="username"
                                                                id="username" value="{{ $admin->username }}">
                                                        </div>
                                                        <div class="form-group form-sm">
                                                            <label for="phone_num" class=" col-form-label">Nomor
                                                                Telepon (Opsional)</label>
                                                            <input type="text" class="form-control" name="phone_num"
                                                                id="phone_num" value="{{ $admin->phone_num }}">
                                                        </div>
                                                        <div class="form-group form-sm">
                                                            <label for="old_password" class=" col-form-label">Password
                                                                Lama</label>
                                                            <input type="password" class="form-control" name="old_password"
                                                                id="old_password" value="">
                                                        </div>
                                                        <div class="form-group form-sm col">
                                                            <label for="foto" class="col-form-label">Foto</label>
                                                            <input value="{{ $admin->foto }}" type="file"
                                                                class="form-control" name="foto" id="foto"
                                                                onchange="previewFileEdit(this)">
                                                            <img src="{{ asset('images/' . $admin->foto) }}"
                                                                id="previewImgEdit" width="100px">
                                                            <script>
                                                                function previewFileEdit(input) {
                                                                    var file = input.files[0];
                                                                    if (file) {
                                                                        var reader = new FileReader();
                                                                        reader.onload = function() {
                                                                            $("#previewImgEdit").attr("src", reader.result);
                                                                        }
                                                                        reader.readAsDataURL(file);
                                                                    }
                                                                }
                                                            </script>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-success">Ubah
                                                            Data</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Modal Hapus Data --}}
                                    <div class="modal fade" id="modalHapusAdmin{{ $admin->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Admin</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="{{ route('admins.destroy', $admin->id) }}">
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
                                @endforeach
                                {{-- Modal Tambah Data --}}
                                <div class="modal fade" id="modalTambahAdmin" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="{{ route('admins.store') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">

                                                    <div class="form-group form-sm">
                                                        <label for="name" class=" col-form-label">Nama:</label>
                                                        <input type="text" class="form-control" name="name"
                                                            id="name">
                                                    </div>
                                                    <div class="form-group  form-sm">
                                                        <label for="username" class=" col-form-label">Username (Untuk
                                                            Login)</label>
                                                        <input type="text" class="form-control" name="username"
                                                            id="username">
                                                    </div>
                                                    <div class="form-group form-sm">
                                                        <label for="phone_num" class=" col-form-label">Nomor
                                                            Telepon (Opsional)</label>
                                                        <input type="text" class="form-control" name="phone_num"
                                                            id="phone_num">
                                                    </div>

                                                    <div class="form-group form-sm">
                                                        <label for="password" class=" col-form-label">Password</label>
                                                        <input type="password" class="form-control" name="password"
                                                            id="password">
                                                    </div>
                                                    <div class="form-group form-sm">
                                                        <label for="password_confirmation"
                                                            class=" col-form-label">Konfirmasi Password</label>
                                                        <input type="password" class="form-control"
                                                            name="password_confirmation" id="password">
                                                    </div>
                                                    <div class="form-group form-sm">
                                                        <label for="foto" class=" col-form-label">Foto Profil
                                                            (Opsional)</label>
                                                        <input type="file" class="form-control-file" name="foto"
                                                            id="foto" onchange="loadFile(event)">
                                                        <img id="output" width="150" />
                                                    </div>
                                                    <script>
                                                        var loadFile = function(event) {
                                                            var output = document.getElementById('output');
                                                            output.src = URL.createObjectURL(event.target.files[0]);
                                                        };
                                                    </script>
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
@endsection
