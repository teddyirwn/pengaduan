@extends('layouts.app2')

@section('content')
    <div class="container-lg">

        <div class="card p-4 w-75 mx-auto card-pengaduan mt-5">
            <div class="row  ">
                <div class="col-md-8">
                    <h1>Tuliskan Keluhan Anda Disini </h1>
                    <p>Isi keluhan anda di bagian kolom di bawah</p>
                </div>
                <div class="col-md-4 d-none d-md-block ">
                    <img src="{{ asset('assets/images/pengaduan1.png') }}" width="70%" alt="">
                </div>
            </div>
        </div>

        <div class="card mt-4 w-75 mx-auto p-3">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <form action="{{ route('pengaduan-create') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="mb-3">
                    Tulis Laporan Disini
                </div>
                <div class="mb-3">
                    <textarea name="isi_pengaduan" id="isi_pengaduan" placeholder="Isi Pengaduan"
                        class="form-control @error('isi_pengaduan')is-invalid
                    @enderror"></textarea>
                    @error('isi_pengaduan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="text" name="alamat" placeholder="Alamat"
                        class="form-control @error('alamat')is-invalid
                    @enderror">
                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="file" class="form-control @error('foto')is-invalid
                    @enderror"
                        name="foto">
                    @error('foto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success w-100">Kirim </button>
                </div>
            </form>

        </div>
    </div>
@endsection
