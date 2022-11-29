@extends('dashboard.layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Daftar User</h4>

    <div class="mb-4">
        <a href="/user-tambah" class="btn btn-primary">Tambah User</a>
    </div>

    <!-- Bordered Table -->
    <div class="card">
        {{-- <h5 class="card-header">Bordered Table</h5> --}}
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table id="table_id" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Jabatan</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td><strong>{{$user->nama}}</strong></td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->level}}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <form action="/user-hapus-{{$user->id}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="dropdown-item"><i class="bx bx-trash me-1"></i>
                                                Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Bordered Table -->

</div>
@endsection
@push('child-scripts')
<script type="text/javascript">
    $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
@endpush