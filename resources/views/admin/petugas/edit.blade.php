@extends('layouts.admin')


@section('content')
    <div class="container">

        <div class="card">
            <div class="card-header ">
                edit
            </div>
            <div class="card-body">
                <form action="{{ url('/petugas/update/' . $datas->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-sm">
                            <label for="nik">Nik</label>
                            <input type="text" id="nik" class="form-control" name="nik"
                                value="{{ $datas->nik }}">
                        </div>
                        <div class="col-sm">
                            <label for="name">Nama </label>
                            <input type="text" id="name" class="form-control" name="name"
                                value="{{ $datas->name }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm">
                            <label for="tlp">Telp</label>
                            <input type="text" id="tlp" class="form-control" name="tlp"
                                value="{{ $datas->tlp }}">
                        </div>
                        <div class="col-sm">
                            <label for="email">Email </label>
                            <input type="text" id="email" class="form-control" name="email"
                                value="{{ $datas->email }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="role">Role</label>
                            <select class="form-select" name="role" id="role" aria-label="Default select example">
                                <option value="masyarakat"{{ $datas->role === 'masyarakat' ? 'selected' : '' }}>Masyarakat
                                </option>
                                <option value="petugas" {{ $datas->role === 'petugas' ? 'selected' : '' }}>Petugas</option>
                                <option value="admin" {{ $datas->role === 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 float-right">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
