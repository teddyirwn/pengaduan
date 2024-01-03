@extends('layouts.app2')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('History Pengaduan ') }}
                        <span class="fw-bold"> {{ Auth::user()->name }}</span>
                    </div>

                    <div class="card-body">
                        @if (count($datas) > 0)
                            <table class="table table-hover">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal Pengaduan</th>
                                        <th>Isi Pengaduan</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($datas as $item)
                                        <tr>

                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->tgl_pengaduans }}</td>
                                            <td>{{ $item->isi_pengaduans }}</td>
                                            <td>
                                                @if ($item->status == 'proses')
                                                    <p class="btn btn-warning p-0 px-2 fw-bold text-white">
                                                        {{ $item->status }}
                                                    </p>
                                                @elseif ($item->status == 'selesai')
                                                    <p class="btn btn-success p-0 px-2 fw-bold text-white">
                                                        {{ $item->status }}
                                                    </p>
                                                @else
                                                    <p class="btn btn-danger p-0 px-2 fw-bold text-white">
                                                        {{ $item->status }}
                                                    </p>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('/detail-pengaduan/' . $item->id) }}"
                                                    class="btn btn-outline-success">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-center"> tidak ada Pengaduan</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
