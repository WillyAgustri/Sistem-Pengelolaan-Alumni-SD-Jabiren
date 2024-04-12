@extends('layout.app')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kelola Aktivasi Akun</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="./">Home</a>
                </li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active" aria-current="page">
                    Kelola Aktivasi Akun
                </li>
            </ol>
        </div>

        <!-- Row -->
        <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                    </div>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Nisn</th>
                                    <th>Name</th>
                                    <th>Berkas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nisn</th>
                                    <th>Name</th>
                                    <th>Berkas</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($aktivasis as $aktivasi)
                                    <tr>
                                        <td>{{ $aktivasi->id }}</td>
                                        <td>{{ $aktivasi->nisn }}</td>
                                        <td>{{ $aktivasi->name }}</td>

                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#lihatBerkasModal{{ $aktivasi->id }}">
                                                Lihat Berkas
                                            </button>
                                        </td>
                                        <td class="row gap-5 justify-content-center">
                                            <div class="me-5">
                                                <form action="{{ route('aktivasis.update', $aktivasi->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="id" value="{{ $aktivasi->id }}">
                                                    <input type="hidden" name="nisn" value="{{ $aktivasi->nisn }}">
                                                    <input type="hidden" name="name" value="{{ $aktivasi->name }}">
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-success">
                                                    Aktifkan
                                                </button>
                                                </form>
                                            </div>
                                            <form action="{{ route('aktivasis.destroy', $aktivasi->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#tolakModal{{ $aktivasi->id }}">
                                                    Tolak
                                                </button>

                                                <div class="modal fade" id="tolakModal{{ $aktivasi->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="tolakModalLabel{{ $aktivasi->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="tolakModalLabel{{ $aktivasi->id }}">
                                                                    Tolak Data</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Yakin ingin menolak data ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-danger">
                                                                    Tolak</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="lihatBerkasModal{{ $aktivasi->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="lihatBerkasModalLabel{{ $aktivasi->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="lihatBerkasModalLabel{{ $aktivasi->id }}">
                                                        Berkas Ijazah</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @if (pathinfo($aktivasi->brks_ijasah, PATHINFO_EXTENSION) == 'pdf')
                                                        <iframe
                                                            src="{{ asset('berkas-ijasah/' . $aktivasi->brks_ijasah) }}"
                                                            style="width:100%; height:500px;" frameborder="0">
                                                        </iframe>
                                                    @else
                                                        <img src="{{ asset('berkas-ijasah/' . $aktivasi->brks_ijasah) }}"
                                                            alt="Berkas Ijazah" style="width:100%;">
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
