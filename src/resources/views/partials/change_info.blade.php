<form id="changeInfoForm" action="" method="POST">
    @csrf
    @method('PUT')
    <input type="number" name="adminControl" id="adminControl" value="1" hidden>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text"
            name="name"
            id="name"
            class="form-control"
            value="9090"
            required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="tel"
            name="phone"
            id="phone"
            class="form-control"
            required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email"
            name="email"
            id="email"
            class="form-control"
            required>
    </div>
    <div class="mb-3">
        <div class="form-check form-switch">
            <label for="moderator" class="form-check-label">Is Moderator</label>
            <input type="checkbox" name="moderator" id="moderator" class="form-check-input" value="moderator">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Update Account</button>
</form>
