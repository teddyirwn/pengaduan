@extends('layouts.app')

@section('content')
    <section id="home" class="py-5">
        <div class="container pt-5">
            <div class="row ">
                <div class="col-md header-img-section order-2 order-md-1">
                    <img src="{{ asset('assets/images/home.png') }}" class="img-fluid " alt="">
                </div>
                <div class="col-md mt-5 pt-5 text-center text-md-start order-1 order-md-2 ">
                    <h1 class="banner-title">Selamat Datang di Forum <span>Pengaduan</span> Masyarakat Online</h1>
                    <p class="banner-description">Sampaikan Laporan Anda Langsung Kepada instasi Pemerintah berwenang</p>
                    @if (Auth::check())
                        <a href="{{ route('pengaduan') }}" class="btn btn-outline-success banner-btn">Mulai</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-success banner-btn">Mulai</a>
                    @endif
                </div>

            </div>
        </div>
    </section>
    <section id="about">
        <div class="container pt-5">
            <h1 class="text-center">About</h1>
            <div class="row">
                <div class="col-md about-img-section">
                    <img src="{{ asset('assets/images/about.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-md mt-5 pt-5 text-center text-md-start about-text ">
                    <h2 class="about-title">Apa itu Pengaduan Masyarakat?</h2>
                    <p class="about-description text-md-start text-center">Tujuan pengaduan masyarakat adalah untuk
                        mengungkap masalah
                        yang
                        mungkin
                        memerlukan perbaikan atau penyelesaian, serta memastikan bahwa lembaga atau pihak yang berwenang
                        dapat mengambil tindakan yang sesuai untuk menangani masalah tersebut. Pengaduan masyarakat dapat
                        diajukan kepada pemerintah, lembaga penegak hukum, organisasi non-pemerintah, atau badan usaha yang
                        relevan, tergantung pada sifat masalah dan yurisdiksi yang terkait. Proses penanganan pengaduan
                        masyarakat dapat berbeda-beda di setiap negara, dan banyak negara memiliki sistem khusus untuk
                        menerima, menyelidiki, dan menangani pengaduan dari masyarakat.</p>
                </div>
            </div>
        </div>

    </section>

    <section id="proses-lapor">
        <div class="container">
            <div class="proses-text">
                <h2>Proses Lapor</h2>
                <h1>
                    Proses Lapor Pengaduan Masyarakat
                </h1>
            </div>

            <div class="d-flex flex-wrap gap-5 justify-content-center">
                <div class="card shadow-sm rounded" style="width: 18rem; height:20rem;">
                    <img src="{{ asset('assets/images/proses-1.jpg') }}" class="card-img-top h-50 rounded" alt="...">
                    <div class="card-body text-center">
                        <h3>Proses Lapor</h3>
                        <p class="card-text">Laporkan pengaduan atau aspirasi anda dengan jelas dan lengkap</p>
                    </div>
                </div>
                <div class="card shadow-sm rounded" style="width: 18rem; height:20rem;">
                    <img src="{{ asset('assets/images/proses-2.jpg') }}" class="card-img-top h-50 rounded" alt="...">
                    <div class="card-body text-center">
                        <h3>Tindak Lanjut</h3>
                        <p class="card-text">Instasi akan menindak lanjuti dan membalas laporan anda</p>
                    </div>
                </div>
                <div class="card shadow-sm rounded" style="width: 18rem; height:20rem;">
                    <img src="{{ asset('assets/images/proses-3.jpg') }}" class="card-img-top h-50 rounded" alt="...">
                    <div class="card-body text-center">
                        <h3>Selesai</h3>
                        <p class="card-text">Laporan Anda akan terus ditindaklanjuti hingka terselesaikan</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section id="jumlah">
        <div class="container text-center my-5">
            <h1>Jumlah Laporan Saat ini</h1>
            <h2> {{ $pengaduan }}</h2>
        </div>
    </section>
@endsection
