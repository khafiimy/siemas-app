@extends('dashboard.layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> Tambah User</h4>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                {{-- <h5 class="card-header">Bordered Table</h5> --}}
                <div class="card-body">
                    <form action="/user-simpan" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="defaultFormControlInput" />
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="defaultFormControlInput" />
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Password</label>
                            <input type="text" name="password" class="form-control" id="defaultFormControlInput" />
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Jabatan</label>
                            <select class="form-select" name="level" id="exampleFormControlSelect1"
                                aria-label="Default select example">
                                <option selected>Pilih</option>
                                <option value="Ketua DPRD">Ketua DPRD</option>
                                <option value="Wakil Ketua 1 DPRD">Wakil Ketua 1 DPRD</option>
                                <option value="Wakil Ketua 2 DPRD">Wakil Ketua 2 DPRD</option>
                                <option value="Wakil Ketua 3 DPRD">Wakil Ketua 3 DPRD</option>
                                <option value="Komisi 1">Komisi 1</option>
                                <option value="Komisi 2">Komisi 2</option>
                                <option value="Komisi 3">Komisi 3</option>
                                <option value="Komisi 4">Komisi 4</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row mt-3">
        <div class="col-md-8 d-flex justify-content-end">
            <button type="submit" class="btn btn-danger" style="margin-right: 5px">
                Simpan
            </button>
            </form>
        </div>
    </div>

</div>
@endsection
@push('child-scripts')
@endpush