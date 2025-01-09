@extends('layouts.main')
@section('content')
@include('partials.navbar')

<div class="container-fluid featurs py-5" style="margin-top: 50px; position: relative;">
    @php
        $openRequestsCountA = $openRequestsCountA ?? 0;
        $onGoingProgressCountA = $onGoingProgressCountA ?? 0;
        $closedCountA = $closedCountA ?? 0;

        $openRequestsCountB = $openRequestsCountB ?? 0;
        $onGoingProgressCountB = $onGoingProgressCountB ?? 0;
        $closedCountB = $closedCountB ?? 0;
    @endphp

    <div class="container py-5 text-center">
        <div class="row">
            <div class="col-lg-6">
                <div class="text-center rounded" style="background-color: #FFFFFF">
                    <input type="hidden" name="layanan" id="layanan-indihome" value="INDIHOME">
                    <h2>INDIHOME</h2>
                    <div class="row g-4 justify-content-center align-items-center mt-5">
                        <!-- Tombol untuk INDIHOME -->
                        <button id="tampilkan" type="button"
                            class="layanan-button featurs-item text-center rounded bg-danger p-4"
                            data-layanan="INDIHOME" data-status="REQUEST OPEN"
                            style="border: none; background: none; width: 150px; height: 200px; margin: 0 10px;">
                            <div class="featurs-icon btn-square rounded-circle bg-white mb-5 mx-auto d-flex justify-content-center align-items-center"
                                style="width: 100px; height: 100px;">
                                <div class="featurs-content text-center">
                                    <h2 class="fw-bold">{{ $openRequestsCountA }}</h2>
                                </div>
                            </div>
                            <div class="featurs-content text-center text-white" style="margin-top: -25px;">
                                <h6>REQUEST OPEN</h6>
                            </div>
                        </button>

                        <button id="tampilkan" type="button"
                            class="layanan-button featurs-item text-center rounded bg-warning p-4"
                            data-layanan="INDIHOME" data-status="ON GOING PROGRESS"
                            style="border: none; background: none; width: 150px; height: 200px; margin: 0 10px;">
                            <div class="featurs-icon btn-square rounded-circle bg-white mb-5 mx-auto d-flex justify-content-center align-items-center"
                                style="width: 100px; height: 100px;">
                                <div class="featurs-content text-center">
                                    <h2 class="fw-bold">{{ $onGoingProgressCountA }}</h2>
                                </div>
                            </div>
                            <div class="featurs-content text-center text-white" style="margin-top: -25px;">
                                <h6>ON GOING PROGRESS</h6>
                            </div>
                        </button>

                        <button id="tampilkan" type="button"
                            class="layanan-button featurs-item text-center rounded bg-success p-4"
                            data-layanan="INDIHOME" data-status="CLOSED"
                            style="border: none; background: none; width: 150px; height: 200px; margin: 0 10px;">
                            <div class="featurs-icon btn-square rounded-circle bg-white mb-5 mx-auto d-flex justify-content-center align-items-center"
                                style="width: 100px; height: 100px;">
                                <div class="featurs-content text-center">
                                    <h2 class="fw-bold">{{ $closedCountA }}</h2>
                                </div>
                            </div>
                            <div class="featurs-content text-center text-white" style="margin-top: -25px;">
                                <h6>CLOSED</h6>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="text-center">
                    <h2>INDIBIZ</h2>
                    <div class="row g-4 justify-content-center align-items-center mt-5">
                        <!-- Tombol untuk INDIBIZ -->
                        <button id="tampilkan" type="button"
                            class="layanan-button featurs-item text-center rounded bg-danger p-4" data-layanan="INDIBIZ"
                            data-status="REQUEST OPEN"
                            style="border: none; background: none; width: 150px; height: 200px; margin: 0 10px;">
                            <div class="featurs-icon btn-square rounded-circle bg-white mb-5 mx-auto d-flex justify-content-center align-items-center"
                                style="width: 100px; height: 100px;">
                                <div class="featurs-content text-center">
                                    <h2 class="fw-bold">{{ $openRequestsCountB }}</h2>
                                </div>
                            </div>
                            <div class="featurs-content text-center text-white" style="margin-top: -25px;">
                                <h6>REQUEST OPEN</h6>
                            </div>
                        </button>

                        <button id="tampilkan" type="button"
                            class="layanan-button featurs-item text-center rounded bg-warning p-4" data-layanan="INDIBIZ"
                            data-status="ON GOING PROGRESS"
                            style="border: none; background: none; width: 150px; height: 200px; margin: 0 10px;">
                            <div class="featurs-icon btn-square rounded-circle bg-white mb-5 mx-auto d-flex justify-content-center align-items-center"
                                style="width: 100px; height: 100px;">
                                <div class="featurs-content text-center">
                                    <h2 class="fw-bold">{{ $onGoingProgressCountB }}</h2>
                                </div>
                            </div>
                            <div class="featurs-content text-center text-white" style="margin-top: -25px;">
                                <h6>ON GOING PROGRESS</h6>
                            </div>
                        </button>

                        <button id="tampilkan" type="button"
                            class="layanan-button featurs-item text-center rounded bg-success p-4" data-layanan="INDIBIZ"
                            data-status="CLOSED"
                            style="border: none; background: none; width: 150px; height: 200px; margin: 0 10px;">
                            <div class="featurs-icon btn-square rounded-circle bg-white mb-5 mx-auto d-flex justify-content-center align-items-center"
                                style="width: 100px; height: 100px;">
                                <div class="featurs-content text-center">
                                    <h2 class="fw-bold">{{ $closedCountB }}</h2>
                                </div>
                            </div>
                            <div class="featurs-content text-center text-white" style="margin-top: -25px;">
                                <h6>CLOSED</h>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="intro">
    <div class="bg-image h-100">
        @if(session()->has('successTerima'))
            <div class="alert alert-success alert-dismissible fade show fadeInUp" role="alert">
                {{ session('successTerima') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session()->has('errorTerima'))
            <div class="alert alert-danger alert-dismissible fade show fadeInUp" role="alert">
                {{ session('errorTerima') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <table class="table table-hover align-middle table-responsive mb-0" id="myTable">
            <thead class="table-success">
                <tr>
                    <th scope="col">Nomor TIket</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Layanan</th>
                    <th scope="col">Order</th>
                    <th scope="col">Permint</th>
                    <th scope="col">SC</th>
                    <th scope="col">Laporan</th>
                    <th scope="col">Oleh</th>
                    <th scope="col">Status</th>
                    <th scope="col">Progress</th>
                    @if (Auth::check() && Auth::user()->role == 'helpdesk' || Auth::check() && Auth::user()->role == 'admin')
                        <th scope="col">Action</th>
                    @endif
                    <th scope="col">Masuk</th>
                    <!-- <th scope="col">Usia</th> -->
                    <th scope="col">Closed</th>
                    <!-- <th scope="col">Total</th> -->
                </tr>
            </thead>
            <tbody id="toggle" class="d-none">
                @foreach($laporan as $data)
                    <tr class="laporan-row layanan-{{ strtolower($data->layanan) }} status-{{ strtolower(str_replace(' ', '-', $data->status)) }}">
                        <td>{{ $data->tiket }}</td>
                        <td>{{ $data->unit }}</td>
                        <td>{{ $data->layanan }}</td>
                        <td>{{ $data->order }}</td>
                        <td>{{ $data->permint }}</td>
                        <td>{{ $data->sc }}</td>
                        <td>
                            <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal"
                                data-id="{{ $data->id }}" data-bs-target="#detailLaporanModal{{ $data->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor"
                                    class="bi bi-card-list" viewBox="0 0 16 16">
                                    <path
                                        d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z" />
                                    <path
                                        d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0" />
                                </svg>
                            </button>
                        </td>
                        <td>{{ $data->oleh }}</td>
                        <td>{{ $data->status }}</td>
                        <td>
                            <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal"
                                data-id="{{ $data->id }}" data-bs-target="#detailModal{{ $data->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor"
                                    class="bi bi-card-list" viewBox="0 0 16 16">
                                    <path
                                        d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z" />
                                    <path
                                        d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0" />
                                </svg>
                            </button>
                        </td>
                        @if (Auth::check() && Auth::user()->role == 'admin')
                            <td>
                                <button type="button" class="btn btn-success btn-sm text-white" data-bs-toggle="modal"
                                    data-id="{{ $data->id }}" data-bs-target="#editLaporanModal{{ $data->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                    </svg>
                                </button>
                                <form action="{{ route('deleteLaporan', $data->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Anda yakin ingin menghapus pengguna ini?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                        </svg>
                                    </button>
                                </form>
                            </td>

                        @elseif (Auth::check() && Auth::user()->role == 'helpdesk')
                            <td>
                                @if ($data->status === 'request open')
                                    <form action="{{ route('changeStatus', $data->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger text-white">Terima</button>
                                    </form>
                                @elseif ($data->status === 'on going progress')
                                    <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal"
                                        data-id="{{ $data->id }}" data-bs-target="#inputModal">
                                        Update
                                    </button>
                                @else
                                    <button type="button" class="btn btn-success text-white">
                                        Closed
                                    </button>
                                @endif
                            </td>
                        @endif
                        <td style="text-align: left;">{{ $data->created_at }}</td>
                        
                        @if ($data->status === 'closed')
                            <td style="text-align: left;">{{ $data->updated_at }}</td>
                        @else 
                            <td style="text-align: left;"> - </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var updateButtons = document.querySelectorAll(".btn-warning"); // Mengambil semua tombol "Update"
        updateButtons.forEach(function (button) {
            button.addEventListener("click", function () {
                var dataId = button.getAttribute("data-id"); // Mendapatkan nilai data-id dari tombol yang diklik
                var form = document.getElementById("updateForm"); // Mendapatkan form update
                form.action = "{{ url('dashboard') }}/" + dataId; // Mengubah action form sesuai dengan id laporan
                document.getElementById('id_laporan').value = dataId; // Mengubah nilai id_laporan dalam form
            });

        });

        // Initialize DataTable
        $('#myTable').DataTable({
            responsive: true
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('.layanan-button').on('click', function () {
            var element = document.getElementById('toggle');
            var layanan = $(this).data('layanan').toLowerCase();
            var status = $(this).data('status').toLowerCase().replace(/ /g, '-');
            element.classList.remove('d-none');
            $('.laporan-row').hide();
            $('.layanan-' + layanan + '.status-' + status).show();
        });
    });
</script>

@include('modal.editLaporan')
@include('modal.popup')
@include('modal.detailProgress')
@include('modal.detailLaporan')
@include('partials.footer')
@endsection