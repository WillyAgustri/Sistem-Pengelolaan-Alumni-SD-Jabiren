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
            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">
                            Products Sold
                        </h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle btn btn-primary btn-sm" href="#" role="button"
                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Month
                                <i class="fas fa-chevron-down"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">
                                    Select Periode
                                </div>
                                <a class="dropdown-item" href="#">Today</a>
                                <a class="dropdown-item" href="#">Week</a>
                                <a class="dropdown-item active" href="#">Month</a>
                                <a class="dropdown-item" href="#">This Year</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="small text-gray-500">
                                Oblong T-Shirt
                                <div class="small float-right">
                                    <b>600 of 800 Items</b>
                                </div>
                            </div>
                            <div class="progress" style="height: 12px">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 80%"
                                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="small text-gray-500">
                                Gundam 90'Editions
                                <div class="small float-right">
                                    <b>500 of 800 Items</b>
                                </div>
                            </div>
                            <div class="progress" style="height: 12px">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 70%"
                                    aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="small text-gray-500">
                                Rounded Hat
                                <div class="small float-right">
                                    <b>455 of 800 Items</b>
                                </div>
                            </div>
                            <div class="progress" style="height: 12px">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 55%"
                                    aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="small text-gray-500">
                                Indomie Goreng
                                <div class="small float-right">
                                    <b>400 of 800 Items</b>
                                </div>
                            </div>
                            <div class="progress" style="height: 12px">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="small text-gray-500">
                                Remote Control Car Racing
                                <div class="small float-right">
                                    <b>200 of 800 Items</b>
                                </div>
                            </div>
                            <div class="progress" style="height: 12px">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 30%"
                                    aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a class="m-0 small text-primary card-link" href="#">View More
                            <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
        <!--Row-->

        <div class="row">
            <div class="col-lg-12 text-center">
                <p>
                    Do you like this template ? you can download
                    from
                    <a href="https://github.com/indrijunanda/RuangAdmin" class="btn btn-primary btn-sm"
                        target="_blank"><i class="fab fa-fw fa-github"></i>&nbsp;GitHub</a>
                </p>
            </div>
        </div>

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
                        <a href="{{ route('logout') }}" class="btn btn-primary">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---Container Fluid-->

    </div>
    </div>
@endsection
