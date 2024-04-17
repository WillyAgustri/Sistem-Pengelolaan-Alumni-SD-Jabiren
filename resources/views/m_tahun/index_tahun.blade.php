@extends('layout.app')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kelola Tahun</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="./">Home</a>
                </li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active" aria-current="page">
                    Kelola Tahun
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
                            <button class="btn btn-info" data-toggle="modal" data-target="#modalTambahTahun">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data
                            </button>
                        </h6>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Tahun</th>
                                    <th class="text-center">Aksi</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Tahun</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($tahuns as $tahun)
                                    <tr>
                                        <td>{{ $tahun->id_tahun }}</td>
                                        <td>{{ $tahun->tahun }}</td>
                                        <td class="text-center">
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
                                                            :{{ $tahun->id_tahun }}
                                                        </p>
                                                    </div>
                                                    <hr class="solid" />
                                                    <div class="text-center mt-2">
                                                        <div class="btn btn-warning" data-toggle="modal"
                                                            data-target="#modalUbahTahun{{ $tahun->id_tahun }}">
                                                            Ubah
                                                            Data
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- Modal Ubah Data --}}
                                    <div class="modal fade" id="modalUbahTahun{{ $tahun->id_tahun }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Tahun</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST"
                                                    action="{{ route('tahuns.update', $tahun->id_tahun) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">

                                                        <div class="form-group form-sm">
                                                            <label for="tahun" class=" col-form-label">Tahun:</label>
                                                            <input type="text" class="form-control" name="tahun"
                                                                id="tahun" value="{{ $tahun->tahun }}">
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
                                    <div class="modal fade" id="modalHapusTahun{{ $tahun->id_tahun }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Tahun</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST"
                                                    action="{{ route('tahuns.destroy', $tahun->id_tahun) }}">
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
                                <div class="modal fade" id="modalTambahTahun" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Tahun</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('tahuns.store') }}" method="POST">
                                                @csrf
                                                <div class="modal-body">

                                                    <div class="form-group form-sm">
                                                        <label for="tahun" class=" col-form-label">Tahun:</label>
                                                        <input type="text" class="form-control" name="tahun"
                                                            id="tahun">
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
