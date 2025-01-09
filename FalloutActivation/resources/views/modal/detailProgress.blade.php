@foreach($laporan as $data)
    <div class="modal fade" id="detailModal{{ $data->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $data->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel{{ $data->id }}">Detail Progress</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Pesan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($progressCollection[$data->id]) && count($progressCollection[$data->id]) > 0)
                                @foreach($progressCollection[$data->id] as $progress_item)
                                    <tr>
                                        <td>{{ $progress_item->created_at }}</td>
                                        <td>{{ $progress_item->pesan }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="2">Tidak ada progres untuk laporan ini.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endforeach