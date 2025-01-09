@foreach($laporan as $data)
    <div class="modal fade" id="inputModal" tabindex="-1" aria-labelledby="inputModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="inputModalLabel">Update Progress</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateForm" action="{{ route('updateProgress', ['id' => $data->id]) }}" method="POST"
                    onsubmit="return setActionAndSubmit(event)">
                    @csrf
                    <input type="hidden" name="id_laporan" id="id_laporan" value="">
                    <div class="modal-body">
                        <div>
                            <span></span>
                        </div>
                        <textarea type="text" name="pesan" class="form-control" oninput="autoResize(this)"
                            placeholder="Update Progress...."></textarea>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="action" id="action" value="">
                        <button type="button" onclick="setAction('not_resolved')" class="btn btn-secondary">Not
                            Resolved</button>
                        <button type="button" onclick="setAction('resolved')" class="btn btn-primary">Resolved</button>
                        <button type="submit" id="submitBtn" style="display: none;"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

<script>
    function setAction(action) {
        document.getElementById('action').value = action;
        document.getElementById('submitBtn').click();  // Trigger the form submission programmatically
    }

    function setActionAndSubmit(event) {
        const action = document.getElementById('action').value;
        if (action === '') {
            event.preventDefault();
            alert('Action value is not set!');
            return false;
        }
        return true;
    }
</script>