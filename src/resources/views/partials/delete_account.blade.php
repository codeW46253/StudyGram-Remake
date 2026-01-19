<form id="deleteForm" action="" method="POST">
    @csrf
    @method('DELETE')
    <div class="mb-3 mt-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <div class="mb-3 mt-3">
        <button type="submit" class="btn btn-warning">Delete</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
</form>