@extends('layout.app')

@section('content')
    <!-- Row -->
    <div class="row">

        <!-- Donut Chart -->
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Siswa Lanjut/Tidak Sekolah</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="text-white bg-primary">
                                <tr>
                                    <th>Status</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-success font-weight-bold">Lanjut Sekolah</td>
                                    <td>{{ $lanjutSekolahCount }} Alumni</td>
                                </tr>
                                <tr>
                                    <td class="text-danger font-weight-bold">Tidak Lanjut Sekolah/Belum Mengisi</td>
                                    <td>{{ $tidakLanjutSekolahCount }} Alumni</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Area Charts -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Rekapitulasi Alumni Pertahun</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <details>
                            <summary style="cursor:pointer" class="bg-primary p-1 rounded text-white">
                                <strong>Klik Untuk Lihat Detail</strong>
                            </summary>
                            <table class="table table-bordered table-flush" width="100%" cellspacing="0"
                                id="dataTableHover">
                                <thead>
                                    <tr>
                                        <th>Tahun</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alumniPerTahun as $key => $value)
                                        <tr>
                                            <td>{{ $key }} </td>
                                            <td>{{ $value }} Alumni</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </details>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--Row-->

    {{-- Grafik Value --}}
    @php
        $dataAlumni = [];
        foreach ($alumniPerTahun as $tahun => $jumlah) {
            $dataAlumni[] = [
                'tahun' => $tahun,
                'jumlah' => $jumlah,
            ];
        }
    @endphp
    <script>
        var alumni = <?= json_encode($dataAlumni) ?>;
        var tidakLanjutSekolahCount = <?= $tidakLanjutSekolahCount ?>;
        var lanjutSekolahCount = <?= $lanjutSekolahCount ?>;
    </script>
@endsection
