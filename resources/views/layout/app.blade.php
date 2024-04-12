<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="img/logo/logo.png" rel="icon" />
    <title>SDN 1 Jabiren Raya</title>
    <link href="{{ asset('dashboard/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/css/ruang-admin.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
</head>

<body>

    <div id="wrapper">
        <!-- Modal Logout -->
        <div class="modal fade" id="logoutModals" tabindex="-1" role="dialog"
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
                        <p>Apakah Anda Yakin Ingin Logout?</p>
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

        @auth('alumnis')
            <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                    <div class="text-sm sidebar-brand-textd ">SDN Negeri 1 Jabiren Raya</div>
                </a>
                <hr class="sidebar-divider my-0" />
                <li class="nav-item active">
                    <a class="nav-link" href="../dashboards">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <hr class="sidebar-divider" />
                <div class="sidebar-heading">Fitur</div>
                <li class="nav-item">
                    <a class="nav-link" href="../alumni-profil">
                        <i class="far fa-user-circle"></i>
                        <span>Pengaturan Profil</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
                <hr class="sidebar-divider" />
                <div class="version">Version 1.0</div>
            </ul>
        @endauth

        @auth('admin')
            <!-- Sidebar -->
            <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

                    <div class="text-sm sidebar-brand-textd ">SDN Negeri 1 Jabiren
                        Raya</div>
                </a>
                <hr class="sidebar-divider my-0" />
                <li class="nav-item active">
                    <a class="nav-link" href="../dashboards">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>
                <hr class="sidebar-divider" />
                <div class="sidebar-heading">Fitur</div>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('setting-profil.index') }}">
                        <i class="far fa-user-circle"></i>
                        <span>Pengaturan Profil</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../manage-admin">
                        <i class="far fa-id-card"></i>
                        <span>Pengelolaan Admin</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../manage-tahun">
                        <i class="far fa-calendar-alt"></i>
                        <span>Pengelolaan Tahun</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../manage-alumni">
                        <i class="fas fa-users"></i>
                        <span>Pengelolaan Alumni</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../manage-aktivasi">
                        <i class="fas fa-lock-open"></i>
                        <span>Aktivasi Akun Alumni</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../manage-grafik">
                        <i class="fas fa-chart-bar"></i>
                        <span>Grafik</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
                <hr class="sidebar-divider" />
                <div class="version">Version 1.0</div>
            </ul>
            <!-- Sidebar -->
        @endauth

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('images/' . Auth::user()->foto) }}" style="max-width: 60px" />
                                <span class="ml-2 d-none d-lg-inline text-white small">
                                    @auth('admin')
                                        {{ auth('admin')->user()->name }}
                                    @endauth

                                    @auth('alumnis')
                                        {{ auth('alumnis')->user()->name }}
                                    @endauth

                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="d" data-toggle="modal"
                                    data-target="#logoutModals">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>

                        </li>
                    </ul>
                </nav>
                <!-- Topbar -->

                <div class="container-fluid d-flex justify-content-center" id="container-wrapper">
                    @yield('content')
                </div>

            </div>
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    - developed by
                    <b><a href="#" target="_blank">Mirnawati</a></b>
                </span>
            </div>
        </div>
    </footer>
    <!-- Footer -->

    <script src="{{ asset('dashboard/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/ruang-admin.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/demo/chart-area-demo.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('dashboard/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/demo/chart-pie-demo.js') }}"></script>
    <script src="{{ asset('dashboard/js/demo/chart-bar-demo.') }}"></script>
    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function() {
            $("#dataTable").DataTable(); // ID From dataTable
            $("#dataTableHover").DataTable(); // ID From dataTable with Hover
        });
    </script>
</body>

</html>
