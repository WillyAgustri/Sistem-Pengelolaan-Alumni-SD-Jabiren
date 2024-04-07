@extends('layout.app')

@section('content')
    <div class="container" id="container-wrapper">
        <div class="card p-3 mb-5 d-flex justify-content-center">
            <div class="container-fluid">
                <h2 class="text-center">Cari Data Alumni</h2>
                <div class="container-sm">
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" name="" id="" aria-describedby="helpId"
                            placeholder="" />
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <button class="btn btn-lg btn-info">
                        Mulai Pencarian
                    </button>
                </div>
            </div>

        </div>
        <div class="card p-3 mb-5 d-flex justify-content-center">
            <div class="container-fluid">
                <h2 class="text-center">Hasil Pencarian</h2>
                <div class="container-sm">
                    <div class="mb-3 text-center">
                        Data Tidak Ditemukan
                    </div>
                </div>

            </div>
        </div>

    </div>

    </div>

    </div>
@endsection
