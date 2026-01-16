<form action="{{  route('users.update', auth()->user()->id)  }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text"
            name="name"
            id="name"
            class="form-control"
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
    <button type="submit" class="btn btn-primary">Update Account</button>
</form>