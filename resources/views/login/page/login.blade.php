<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet" />
    <link
        href="https://png.pngtree.com/png-clipart/20220919/original/pngtree-indonesian-elementary-school-boy-character-vector-illustration-png-image_8624210.png"
        rel="icon" />
    <link rel="stylesheet" href="{{ asset('/login/fonts/icomoon/style.css') }}" />

    <link rel="stylesheet" href="{{ asset('login/css/owl.carousel.min.css') }}" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard/vendor/bootstrap/css/bootstrap.min.css') }}" />

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('login/css/style.css') }}" />

    <title>Masuk-SDN 1</title>
</head>

<body>
    <div class="main">
        <img src="https://www.shutterstock.com/image-photo/bogor-west-java-october-2015-600nw-1734321110.jpg"
            alt="" />
        <div class="overlay"></div>
    </div>

    <div class="content ">
        <div class="container d-flex justify-content-center" style="height: 100vh; width:100%">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div></div>
                    <div class="wrapper shadow-lg card">
                        <div id="carousel-slider" class="carousel slide carousel-fade shadow-lg" data-ride="carousel"
                            data-interval="4000">
                            <!--Indicators-->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-slider" data-slide-to="1"></li>
                                <li data-target="#carousel-slider" data-slide-to="2"></li>
                            </ol>
                            <!--Indicators-->
                            <!--Slides-->
                            <div class="carousel-inner" role="listbox">
                                <!--First slide-->
                                <div class="caro-item carousel-item active">
                                    <img class="caro-item d-block rounded-lg"
                                        style="
                                                width: 600px;
                                                height: 450px;
                                                object-fit: cover;
                                            "
                                        src="https://www.shutterstock.com/image-photo/bogor-west-java-october-2015-600nw-1734321110.jpg"
                                        alt="First slide" />
                                </div>
                                <!--/First slide-->
                                <!--Second slide-->
                                <div class="caro-item carousel-item">
                                    <img class="caro-item d-block rounded-lg"
                                        style="
                                                width: 600px;
                                                height: 450px;
                                                object-fit: cover;
                                            "
                                        src="https://asset-2.tstatic.net/tribunnews/foto/bank/images/ilustrasi-anak-sekolah-dasar-shutterstock.jpg"
                                        alt="First slide" />
                                </div>
                                <!--/Second slide-->
                                <!--Third slide-->
                                <div class="carousel-item">
                                    <img class="d-block rounded-lg"
                                        style="
                                                width: 600px;
                                                height: 450px;
                                                object-fit: cover;
                                            "
                                        src="https://pict-a.sindonews.net/dyn/620/pena/news/2020/06/22/710/78102/siswa-sd-hingga-sma-masih-belajar-dari-rumah-sampai-4-juli-2020-xmf.jpg"
                                        alt="Third slide" />
                                </div>
                                <!--/Third slide-->
                            </div>
                        </div>
                    </div>
                    <br />

                    <div style="text-align: center">
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                    </div>
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-lg-11 card shadow p-4">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="mb-4">
                                <h3>Masuk</h3>
                                <p class="mb-4">
                                    Sistem Pengelolaan Data Alumni SD Negeri
                                    1 Jabiren Raya
                                </p>
                            </div>
                            <form action="{{ route('login.store') }}" method="post">
                                @csrf
                                <div class="form-group first">
                                    <label for="username">Nisn</label>
                                    <input type="text" class="form-control" name="username" id="username"
                                        required />
                                </div>
                                <div class="form-group last mb-4 mt-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        required />

                                </div>
                                <input type="submit" value="Masuk" class="btn btn-block"
                                    style="
                                            background-color: #ff204e;
                                            color: white;
                                        " />
                            </form>

                            <span class="d-block  mt-4">
                                Data Anda Tidak Terdaftar Pada Sistem?, Aktivasi Pada Tombol Dibawah Ini :

                            </span>
                            <button type="button" class="btn btn-secondary " data-toggle="modal"
                                data-target="#exampleModal">Aktivasi Akun</button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Aktivasi Akun</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @error('nisn')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            @error('brks_ijasah')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <form method="POST" action="{{ route('aktivasi') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group form-sm">
                                                    <label for="recipient-name" class=" col-form-label">Nama:</label>
                                                    <input type="text" name="name" value="{{ old('name') }}"
                                                        required class="form-control" id="name">
                                                </div>
                                                <div class="form-group mt-3 form-sm">
                                                    <label for="nisn" class=" col-form-label">NISN:</label>
                                                    <input type="text" name="nisn" value="{{ old('nisn') }}"
                                                        required class="form-control" id="nisn">
                                                </div>
                                                <p class="mt-4" for="">Upload Berkas Ijazah (maks. 2
                                                    MB,
                                                    Format. PDF atau Image)</p>
                                                <div class="form-group form-sm">
                                                    <input type="file" class="form-control-file" id="brks_ijasah"
                                                        name="brks_ijasah" required>
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Aktivasi</button>
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
    @include('sweetalert::alert')
    <script src=" {{ asset('login/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('login/js/popper.min.js') }}"></script>
    <script src="{{ asset('login/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('login/js/main.js') }}"></script>

</body>

</html>
