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
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <button class="btn btn-info" data-toggle="modal" data-target="#modalTambahAdmin">
                                Tambah Data
                            </button>

                            {{-- Modal Tambah Data --}}
                            <div class="modal fade" id="modalTambahAdmin" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-group form-sm">
                                                    <label for="recipient-name" class=" col-form-label">Nama:</label>
                                                    <input type="text" class="form-control" id="recipient-name">
                                                </div>
                                                <div class="form-group  form-sm">
                                                    <label for="nisn" class=" col-form-label">Username (Untuk
                                                        Login)</label>
                                                    <input type="text" class="form-control" id="nisn">
                                                </div>
                                                <div class="form-group form-sm">
                                                    <label for="password" class=" col-form-label">Password</label>
                                                    <input type="text" class="form-control" id="password">
                                                </div>

                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Batal</button>
                                            <button type="button" class="btn btn-success">Tambah Data</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                                    <th>Password</th>
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
                                    <th>Password</th>
                                    <th>Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td>{{ $admin->id }}</td>
                                        <td>{{ $admin->foto }}</td>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->username }}</td>
                                        <td>(Encrypt Password)</td>
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
                                                        <div class="btn btn-warning">
                                                            Ubah
                                                            Data
                                                        </div>
                                                        <div class="btn btn-danger mt-2">
                                                            Hapus
                                                            Data
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--Row-->

        <!-- Modal Logout -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
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
