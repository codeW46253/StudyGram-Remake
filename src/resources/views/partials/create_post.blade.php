<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text"
            name="title"
            id="title"
            class="form-control"
            value="{{ old('title') }}"
            required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea name="content"
                id="content"
                rows="5"
                class="form-control"
                required>{{ old('content') }}</textarea>
    </div>
    <!--
    <div class="mb-3">
        <label for="files" class="form-label">Attachments</label>
        <input type="file"
            name="files[]"
            id="files"
            class="form-control"
            multiple>
        <small class="text-muted">You can upload multiple files</small>
    </div>
    -->
    <button type="submit" class="btn btn-success">Save Post</button>
</form>
