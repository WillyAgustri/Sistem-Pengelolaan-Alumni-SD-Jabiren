@extends('../layout/app')

<!DOCTYPE html>
<html lang="en">

@section('content')
    <!-- Container Fluid-->
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
        <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    Jumlah Admin
                                </div>
                                <div class="h5  mb-0 font-weight-bold text-gray-800">
                                    60
                                </div>
                                <div class="mt-3 mb-0 text-muted text-xs">
                                    <button class="btn btn-sm btn-primary">
                                        Lihat Selengkapnya
                                    </button>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    Jumlah Siswa
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    650
                                </div>
                                <div class="mt-3 mb-0 text-muted text-xs">
                                    <button class="btn btn-sm btn-primary">
                                        Lihat Selengkapnya
                                    </button>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-shopping-cart fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    Jumlah Angkatan
                                </div>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    3
                                </div>
                                <div class="mt-3 mb-0 text-muted text-xs">
                                    <button class="btn btn-sm btn-primary">
                                        Lihat Selengkapnya
                                    </button>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    Jumlah Lanjut Sekolah
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    18
                                </div>
                                <div class="mt-3 mb-0 text-muted text-xs">
                                    <button class="btn btn-sm btn-primary">
                                        Lihat Selengkapnya
                                    </button>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">
                            Rekaptulasi Siswa Per Tahun
                        </h6>

                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- DonutChart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Siswa Lanjut/Tidak Sekolah</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-pie pt-4">
                            <canvas id="myPieChart"></canvas>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!--Row-->

    </div>
    <!---Container Fluid-->

    </div>
    </div>
@endsection
