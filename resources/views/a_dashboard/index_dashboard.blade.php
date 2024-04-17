@extends('layout.app')

@section('content')
    <div class="container-fluid" id="container-wrapper">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="./">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Dashboard
                </li>
            </ol>
        </div>
        @auth('alumnis')
            <div class="row mb-3">
                <!-- Jumlah Admin-->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">
                                        Pengaturan Profil
                                    </div>
                                    <div class="h5  mb-0 font-weight-bold text-gray-800">

                                    </div>
                                    <div class="mt-3 mb-0 text-muted text-xs">
                                        <a href="../alumni-profil" class="btn btn-sm btn-primary">
                                            Lihat Selengkapnya
                                        </a>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-cog fa-2x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Jumlah Siswa -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">
                                        Cari Alumni
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    </div>
                                    <div class="mt-3 mb-0 text-muted text-xs">
                                        <a href="../alumni" class="btn btn-sm btn-primary">
                                            Lihat Selengkapnya
                                        </a>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-search fa-2x text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
    </div>
    <!---Container Fluid-->
@endsection
