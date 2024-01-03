@extends('layouts.app2')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Detail Pengaduan') }}</div>

                    <div class="card-body">
                        <h3>Detail Pengduan</h3>


                        <div class="row">
                            <div class="col">
                                <table class="table">
                                    <tr>
                                        <th>Isi Pengaduan</th>
                                        <td>{{ $data->isi_pengaduans }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Pengaduan</th>
                                        <td>{{ $data->tgl_pengaduans }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if ($data->status == 'proses')
                                                <p class="btn btn-warning p-0 px-2 fw-bold text-white">{{ $data->status }}
                                                </p>
                                            @elseif ($data->status == 'selesai')
                                                <p class="btn btn-success p-0 px-2 fw-bold text-white">{{ $data->status }}
                                                </p>
                                            @else
                                                <p class="btn btn-danger p-0 px-2 fw-bold text-white">{{ $data->status }}
                                                </p>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{ $data->alamat }}</td>
                                    </tr>
                                </table>

                            </div>
                            <div class="col">
                                <img src="{{ asset('storage/image/' . $data->foto) }}" alt=""
                                    class="img-fluid rounded">
                            </div>

                        </div>
                        <div class="mt-3">
                            @if (isset($dataTanggapan))
                                <h5>tanggapan dari : {{ $dataTanggapan->user->name }}</h5>
                                <p class="border p-2">{{ $dataTanggapan->isi_tanggapans }}</p>
                            @endif
                        </div>

                        <div class="m-3">
                            <a href="{{ URL::previous() }}" class="btn btn-warning">Kembali</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
