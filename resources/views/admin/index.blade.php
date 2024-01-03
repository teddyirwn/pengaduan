@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

    </div>
    <div class="row">
        <x-card class="border-left-primary" jumlah="{{ $jumlahPengaduan }}" icon='fas fa-calendar'>
            Total Pengaduan
        </x-card>
        <x-card class="border-left-success" jumlah="{{ $jumlahBelumDiproses }}" icon='fas fa-dollar-sign'>
            Belum diproses
        </x-card>
        <x-card class="border-left-info" jumlah="{{ $jumlahDiproses }}" icon='fas fa-clipboard-list'>
            Di proses
        </x-card>
        <x-card class="border-left-warning" jumlah="{{ $selesai }}" icon='fas fa-calendar'>
            Selesai
        </x-card>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>


                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
@endsection
