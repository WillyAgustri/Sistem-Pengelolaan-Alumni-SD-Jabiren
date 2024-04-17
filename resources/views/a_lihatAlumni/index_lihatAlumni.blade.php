@extends('layout.app')

@section('content')
    <div class="container" id="container-wrapper">
        <div class="card p-3 mb-5 d-flex justify-content-center">
            <div class="container-fluid">
                <h2 class="text-center">Cari Data Alumni</h2>
                <div class="container-sm">
                    <form action="{{ route('cari-alumni') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="cari" class="form-label">Nama Alumni/Tahun Lulus</label>
                            <input type="text" class="form-control" name="cari" id="cari"
                                aria-describedby="helpId" placeholder="" required />
                        </div>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <button class="btn btn-lg btn-info">
                        Mulai Pencarian
                    </button>
                </div>
                </form>
            </div>

        </div>
        @if (isset($alumni))
            <div class="card p-3 mb-5 d-flex justify-content-center">
                <div class="container-fluid">
                    <h2 class="text-center">Hasil Pencarian</h2>
                    <div class="container-sm">
                        <div class="mb-3">
                            <table class="table table-bordered table-flush" width="100%" cellspacing="0"
                                id="dataTableHover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tahun Lulus</th>
                                        <th>Alamat</th>
                                        <th>Lanjut Sekolah</th>
                                    </tr>
                                </thead>

                                @foreach ($alumni as $alumnis)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $alumnis->name }}</td>
                                        <td>{{ $alumnis->tmpt_lahir }}, {{ $alumnis->tgl_lahir }}</td>
                                        <td>{{ $alumnis->j_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                                        <td>{{ $alumnis->id_tahun }}</td>
                                        <td>{{ $alumnis->alamat }}</td>
                                        <td>{{ $alumnis->lnjt_sklh == '' ? 'Tidak Lanjut Sekolah/Tidak Diisi' : $alumnis->lnjt_sklh }}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>

    </div>

    </div>
@endsection
