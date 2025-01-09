@foreach($laporan as $data)
    <div class="modal fade" id="detailLaporanModal{{ $data->id }}" tabindex="-1"
        aria-labelledby="detailModalLabel{{ $data->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel{{ $data->id }}">Detail Laporan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Pesan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{!! nl2br(e($data->detail)) !!}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endforeach