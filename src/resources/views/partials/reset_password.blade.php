<form action="{{  route('users.update_password', auth()->user()->id)  }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password"
            name="password"
            id="password"
            class="form-control"
            required>
    </div>
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Password</label>
        <input type="password"
            name="password_confirmation"
            id="password_confirmation"
            class="form-control"
            required>
    </div>
    <button type="submit" class="btn btn-warning">Reset Password</button>
</form>