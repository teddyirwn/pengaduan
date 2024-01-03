@extends('layouts.admin')


@section('content')
    <div class="container">

        <div class="card">
            <div class="p-3 d-sm-flex justify-content-between ">
                <form action="{{ route('tanggapan.filter') }}" method="post">
                    @csrf
                    <select name="status" id="" class="form-select">
                        <option value="">Semua</option>
                        <option value="pending" {{ $status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="proses" {{ $status === 'proses' ? 'selected' : '' }}>proses</option>
                        <option value="selesai" {{ $status === 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </form>

                <form action="{{ route('search-tanggapan') }}" method="get">
                    <div class="input-group ">
                        <input type="text" name="keyword" class="form-control" placeholder="Cari">
                        <button class="btn btn-outline-success" type="submit" id="button-addon1">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            <div class="card-body">
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (count($datas) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tanggap Pengaduan</th>
                                    <th scope="col">Isi Pengaduan</th>
                                    <th scope="col">Status</th>

                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            @foreach ($datas as $item)
                                <tbody>

                                    <tr>
                                        <td>{{ $loop->iteration }} </td>
                                        <td>{{ $item->tgl_pengaduans }} </td>
                                        <td>{{ $item->isi_pengaduans }} </td>
                                        <td>
                                            @if ($item->status == 'proses')
                                                <p class="badge badge-warning fw-bold text-white">
                                                    {{ $item->status }}
                                                </p>
                                            @elseif ($item->status == 'selesai')
                                                <p class="badge badge-success fw-bold text-white">
                                                    {{ $item->status }}
                                                </p>
                                            @else
                                                <p class="badge badge-danger fw-bold text-white">
                                                    {{ $item->status }}
                                                </p>
                                            @endif
                                        </td>

                                        <td>

                                            <a href="{{ route('tanggapan.detail', ['id' => $item->id]) }}"
                                                class="btn btn-warning">
                                                Tanggapi
                                            </a>

                                        </td>

                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                @else
                    <p class="text-center">Tidak ada data </p>
                @endif
            </div>
        </div>
    </div>
@endsection
