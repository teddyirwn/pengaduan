@extends('layouts.admin')


@section('content')
    <div class="container">

        <div class="card">
            <div class="p-3 d-flex justify-content-end ">
                <form action="{{ route('search-masyarakat') }}" method="get">
                    <div class="input-group ">
                        <input type="text" name="keyword" class="form-control" placeholder="Cari">
                        <button class="btn btn-outline-success" type="submit" id="button-addon1">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>



            <div class="card-body">

                @if (count($users) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nik</th>
                                    <th scope="col">Nama Masyarakat</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Telp</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            @foreach ($users as $item)
                                <tbody>

                                    <tr>
                                        <td>{{ $loop->iteration }} </td>
                                        <td>{{ $item->nik }} </td>
                                        <td>{{ $item->name }} </td>
                                        <td>{{ $item->email }} </td>
                                        <td>{{ $item->tlp }} </td>
                                        <td>{{ $item->role }} </td>
                                        <td>

                                            <a href="{{ url('/petugas/edit/' . $item->id) }}" class="btn btn-warning">
                                                <i class="fas fa-solid fa-pen" style="color: #ffffff;"></i>
                                            </a>
                                            <a href="{{ route('petugas.delete', ['id' => $item->id]) }}"
                                                class="btn btn-danger">
                                                <i class="fas fa-solid fa-trash" style="color: #ffffff;"></i> </a>
                                        </td>

                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                @else
                    <p class="text-center"> tidak ada hasil pencarian untuk : {{ $keyword }}</p>
                @endif
            </div>
        </div>




    </div>

@endsection
