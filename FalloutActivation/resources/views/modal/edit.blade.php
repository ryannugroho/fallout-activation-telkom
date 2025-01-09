@foreach($users as $data)
<div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $data->id }}"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('updateUser', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $data->id }}">Update Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name{{ $data->id }}" name="name"
                            value="{{ $data->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email{{ $data->id }}" name="email"
                            value="{{ $data->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password{{ $data->id }}" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role{{ $data->id }}" name="role">
                            <option value="admin" {{ $data->role === 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="helpdesk" {{ $data->role === 'helpdesk' ? 'selected' : '' }}>Helpdesk</option>
                            <option value="viewer" {{ $data->role === 'viewer' ? 'selected' : '' }}>Viewer</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach