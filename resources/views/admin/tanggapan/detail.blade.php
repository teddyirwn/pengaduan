@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pengaduan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">

                    <table class="table">

                        <tr>
                            <th>Tanggal Pengaduan:</th>
                            <td>{{ $data->tgl_pengaduans }}</td>
                        </tr>
                        <tr>
                            <th>Isi Pengaduan:</th>
                            <td>
                                {{ $data->isi_pengaduans }}
                            </td>
                        </tr>
                        <tr>
                            <th>Alamat:</th>
                            <td>{{ $data->alamat }}</td>
                        </tr>
                        <tr>
                            <th>Status:</th>
                            <td>
                                @if ($data->status == 'proses')
                                    <p class="badge badge-warning fw-bold text-white">{{ $data->status }}
                                    </p>
                                @elseif ($data->status == 'selesai')
                                    <p class="badge badge-success fw-bold text-white">{{ $data->status }}
                                    </p>
                                @else
                                    <p class="badge badge-danger fw-bold text-white">{{ $data->status }}
                                    </p>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>Foto: </th>
                            <td>
                                <img src="{{ asset('storage/image/' . $data->foto) }}" class="img-thumbnail" alt="">
                            </td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tanggapi</h6>

                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('tanggapan.tanggpan', ['id' => $data->id]) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="pending" {{ $data->status === 'pending' ? 'selected' : '' }}> Pending
                                </option>
                                <option value="proses" {{ $data->status === 'proses' ? 'selected' : '' }}> Proses</option>
                                <option value="selesai" {{ $data->status === 'selesai' ? 'selected' : '' }}> selesai
                                </option>
                            </select>

                        </div>
                        <div class="mb-3">
                            <label for="tanggapan">Tanggapan</label>
                            <textarea name="tanggapan" id="tanggapan" rows="5" class="form-control">
@if ($data->tanggapan == '')
@else
@foreach ($data->tanggapan as $item)
{{ $item->isi_tanggapans ?? '' }}
@endforeach
@endif
</textarea>

                        </div>
                        <div class="mb-3">
                            <button type="submit" class=" btn btn-primary w-100"> Kirim</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
