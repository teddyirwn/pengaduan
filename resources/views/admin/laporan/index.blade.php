@extends('layouts.admin')

@section('content')
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Cari berdasarkan tanggal & status</h6>


                </div>
                <div class="card-body">
                    <form action="{{ route('laporan.filter') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input type="date" class="form-control" name="tanggal_awal" placeholder="Tanggal Awal">
                        </div>
                        <div class="mb-3">
                            <input type="date" class="form-control" name="tanggal_akhir" placeholder="Tanggal Awal">
                        </div>
                        <div class="mb-3">
                            <select name="status" class="form-select">
                                <option value="">Semua</option>
                                <option value="pending">Pending</option>
                                <option value="proses">Proses</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-100">Cari </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class=" col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">data berdasarkan tanggal</h6>
                    <div class="float-right">
                        @if (isset($laporan))
                            @if (count($laporan) > 0)
                                <a href="{{ route('laporan.cetak', ['tglMulai' => $tanggalAwal, 'tglAkhir' => $tanggalAkhir]) }}"
                                    class="btn btn-danger">EXPORT
                                    PDF</a>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    @if (isset($laporan))

                        <p>Laporan dari {{ $tanggalAwal }} hingga {{ $tanggalAkhir }} dengan status
                            {{ $status ?: 'Semua' }}</p>

                        @if (count($laporan) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Isi Pengaduan</th>
                                        <th>Alamat</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($laporan as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->tgl_pengaduans }}</td>
                                            <td>{{ $item->isi_pengaduans }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>
                                                @if ($item->status == 'proses')
                                                    <p class="badge badge-warning fw-bold text-white">{{ $item->status }}
                                                    </p>
                                                @elseif ($item->status == 'selesai')
                                                    <p class="badge badge-success fw-bold text-white">{{ $item->status }}
                                                    </p>
                                                @else
                                                    <p class="badge badge-danger fw-bold text-white">{{ $item->status }}
                                                    </p>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>Tidak ada laporan yang sesuai dengan filter.</p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
