@extends('layouts.admin')


@section('content')
    <div class="container">

        <div class="card">
            <div class="p-3 d-flex justify-content-between ">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addPetugas">
                    <i class="fas fa-plus"></i>
                </button>
                <form action="{{ route('search') }}" method="get">

                    <div class="input-group ">
                        <input type="text" name="keyword" class="form-control" placeholder="Cari Nama Petugas">
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

                @if (count($users) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nik</th>
                                    <th scope="col">Nama Petugas</th>
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


    <!-- Modal -->
    <div class="modal fade" id="addPetugas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('createPetugas') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Petugas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nik">Nik</label>
                            <input type="text" name="nik" id="nik" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="nama">Nama Petugas</label>
                            <input type="text" name="name" id="nama" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="email">Password</label>
                            <input type="password" name="password" id="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="telp">Telp</label>
                            <input type="text" name="tlp" id="telp" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="role">Role</label>
                            <select class="form-select" name="role" id="role" aria-label="Default select example">
                                <option selected>Open this select menu</option>

                                <option value="masyarakat">Masyarakat</option>
                                <option value="petugas">Petugas</option>
                                <option value="admin">Admin</option>

                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
