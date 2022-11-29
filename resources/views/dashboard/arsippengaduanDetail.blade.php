@extends('dashboard.layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaduan /</span> Detail Pengaduan</h4>

    <div class="row mt-3 mb-3">
        <div class="col-md-12">
            <div class="card">
                {{-- <h5 class="card-header">Bordered Table</h5> --}}
                <div class="card-body">
                    <div class="row d-flex">
                        <div class="col-md-6">
                            @if ($pengaduan->konfirmasi_pengaduan == false)
                            <span class="badge bg-label-warning me-1">Pengaduan Masih Diproses</span>
                            @else
                            <span class="badge bg-label-success me-1">Pengaduan Selesai Diproses</span>
                            @endif
                        </div>
                        <div class="col-md-6 text-end">
                            Posisi : &ensp;<span
                                class="badge bg-label-primary me-1">{{$pengaduan->posisi_pengaduan}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                {{-- <h5 class="card-header">Bordered Table</h5> --}}
                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" for="basic-default-name">Pengaduan</label>
                        <div class="col-sm-9 align-middle">
                            <p class="t-detail">: {{$pengaduan->pengaduan}}
                            </p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" for="basic-default-company">Lokasi Pengaduan</label>
                        <div class="col-sm-9">
                            <p class="t-detail">: {{$pengaduan->lokasi_pengaduan}}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" for="basic-default-email">Tanggal Pengaduan</label>
                        <div class="col-sm-9">
                            <p class="t-detail">: {{$pengaduan->tanggal_pengaduan}}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" for="basic-default-message">Keterangan
                            Pengaduan</label>
                        <div class="col-sm-9">
                            <p class="t-detail">: {{$pengaduan->keterangan_pengaduan}}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" for="basic-default-phone">Dokumentasi</label>
                        <div class="col-sm-9">
                            <p class="t-detail">: <a href="#" data-bs-toggle="modal" data-bs-target="#exLargeModal">
                                    Lihat
                                    Dokumentasi </a></p>
                        </div>
                        <div class="modal fade" id="exLargeModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel4">Dokumentasi Pengaduan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col mb-3">
                                                @foreach ($pengaduan->dokumentasiPengaduan as $dokumentasi)
                                                <a href="/storage/dokumentasi_pengaduan/{{$dokumentasi->foto}}"
                                                    target="_blink">
                                                    <img src="/storage/dokumentasi_pengaduan/{{$dokumentasi->foto}}"
                                                        height="200" alt="">
                                                </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                {{-- <h5 class="card-header">Bordered Table</h5> --}}
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Nama Pengadu</label>
                                        <p class="t-pengadu t-up">{{$pengaduan->nama_pengadu}}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-company">Kontak Pengadu</label>
                                        <p class="t-pengadu">{{$pengaduan->kontak_pengadu}}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-email">Identitas</label>
                                        <p class="t-pengadu"><a
                                                href="/storage/identitas/{{$pengaduan->identitas_pengadu}}"
                                                target="_blank">
                                                Lihat Identitas</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-8 d-flex justify-content-end">
            <button class="btn btn-info" style="margin-left: 10px" data-bs-toggle="modal" data-bs-target="#basicModal2">
                Lihat Hasil
            </button>
            <button class="btn btn-primary" style="margin-left: 10px" data-bs-toggle="modal"
                data-bs-target="#basicModal">
                Teruskan
            </button>

            <!-- Modal -->
            <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="/pengaduan-teruskan-{{$pengaduan->id}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Teruskan Laporan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="nameBasic" class="form-label">Kepada</label>
                                        <select class="form-select" id="exampleFormControlSelect1" name="posisi"
                                            aria-label="Default select example">
                                            <option selected>Pilih</option>
                                            <option value="Komisi 1">Komisi 1</option>
                                            <option value="Komisi 2">Komisi 2</option>
                                            <option value="Komisi 3">Komisi 3</option>
                                            <option value="Komisi 4">Komisi 4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col mb-0">
                                        <label for="emailBasic" class="form-label">Pengaduan</label>
                                        <input type="text" id="" class="form-control" value="Pengaduan Detail"
                                            readonly />
                                    </div>
                                </div>
                                <div class="row g-2 mt-2">
                                    <div class="col mb-0">
                                        <label for="emailBasic" class="form-label">Catatan</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="catatan"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Batal
                                </button>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="basicModal2" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Hasil Pengaduan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-2">
                                <div class="col mb-0">
                                    <label for="emailBasic" class="form-label">Pengaduan</label>
                                    <input type="text" id="" class="form-control" value="{{$pengaduan->pengaduan}}"
                                        readonly />
                                </div>
                            </div>
                            <div class="row g-2 mt-2">
                                <div class="col mb-0">
                                    <label for="emailBasic" class="form-label">Hasil</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="hasil"
                                        rows="3" readonly>{{$pengaduan->hasil_pengaduan}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Batal
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@push('child-scripts')
@endpush