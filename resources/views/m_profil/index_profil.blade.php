@extends('layout.app')

@section('content')
    <div class="container" id="container-wrapper">
        <div class="card p-3">
            <div class="row d-flex justify-content-between p-3">
                <!-- Form di kiri -->
                <div class="col-sm-4 mb-4">
                    <h2 class="">Informasi Profil</h2>
                    <div class="card" style='height:200px;width:200px'>
                        <img src="https://via.placeholder.com/400" class="img-fluid" alt="Gambar">
                    </div>

                    <div class="d-flex mb-1 mt-2">
                        <div class="mr-2">
                            <button class="btn btn-sm btn-secondary">
                                Ganti Foto
                            </button>
                        </div>

                        <button class="btn btn-sm btn-info">
                            Simpan Foto
                        </button>
                    </div>

                </div>
                <!-- Form di kanan -->
                <div class="col-lg-6 align-items-center p-3">
                    <div class="form-group">
                        <label for="exampleInputPhone1">Nama</label>
                        <input type="text" class="form-control" id="exampleInputPhone1" placeholder="NISN">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Username (Untuk Login)</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Telepon</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Jenis Kelamin">
                        <button class="btn btn-sm btn-secondary rounded rounded-bottom">Ganti Password</button>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button class="btn btn-warning">
                            Edit Profil
                        </button>
                    </div>
                </div>
            </div>

        </div>

    </div>

    </div>
@endsection
