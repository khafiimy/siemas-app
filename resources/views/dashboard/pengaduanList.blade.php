@extends('dashboard.layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaduan /</span> Daftar Pengaduan</h4>

    <!-- Bordered Table -->
    <div class="card">
        <h5 class="card-header">Pengaduan {{$title}}</h5>
        <hr>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table id="table_id" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Pengaduan</th>
                            <th>Lokasi Pengaduan</th>
                            <th>Tanggal Pengaduan</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengaduans as $pengaduan)
                        <tr>
                            <td><span class="t-up"><strong>{{$pengaduan->pengaduan}}</strong></span></td>
                            <td><span class="t-up">{{$pengaduan->lokasi_pengaduan}}</span></td>
                            <td>{{$pengaduan->tanggal_pengaduan}}</td>
                            @if ($pengaduan->konfirmasi_pengaduan == 1)
                            <td><span class="badge bg-label-success me-1">Sudah Selesai</span></td>
                            @else
                            <td><span class="badge bg-label-danger me-1">Belum Diproses</span></td>
                            @endif
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/pengaduan-detail-{{$pengaduan->id}}"><i
                                                class="bx bx-edit-alt me-1"></i> Lihat</a>
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
      $('#table_id').DataTable({
        "ordering": true,
        "order": [],
      });
    } );
</script>
@endpush