@foreach($laporan as $data)
<form action="{{ route('updateLaporan', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal fade" id="editLaporanModal{{ $data->id }}" tabindex="-1" aria-labelledby="editLaporanModalLabel{{ $data->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLaporanModalLabel{{ $data->id }}">Update Data Laporan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Menggunakan metode PUT untuk mengirimkan data formulir -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="request open" {{ $data->status === 'request open' ? 'selected' : '' }}>
                                Request Open</option>
                            <option value="on going progress" {{ $data->status === 'on going progress' ? 'selected' : '' }}>
                                On Going Progress</option>
                            <option value="closed" {{ $data->role === 'closed' ? 'selected' : '' }}>
                                Closed</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor"
                            class="bi bi-floppy-fill" viewBox="0 0 16 16">
                            <path
                                d="M0 1.5A1.5 1.5 0 0 1 1.5 0H3v5.5A1.5 1.5 0 0 0 4.5 7h7A1.5 1.5 0 0 0 13 5.5V0h.086a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5H14v-5.5A1.5 1.5 0 0 0 12.5 9h-9A1.5 1.5 0 0 0 2 10.5V16h-.5A1.5 1.5 0 0 1 0 14.5z" />
                            <path
                                d="M3 16h10v-5.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5zm9-16H4v5.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5zM9 1h2v4H9z" />
                        </svg>
                        Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach