@extends('layouts.cms')

@section('content')

<h1>Create Page</h1>
<br>==============================

<form action="/admin/pages" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Slug</label>
    <input type="text" name="slug"  value="{{ old('slug') }}" required>

    <label>Title</label>
    <input type="text" name="title"  value="{{ old('title') }}" required>

    <label>Content (HTML allowed)</label>
    <textarea name="content" rows="20" style="width:100%;">{{ old('content') }}</textarea>

    <label>
		<input type="checkbox" name="is_locked" {{ old('is_locked') ? 'checked' : '' }}> Locked
    </label>

    <button type="submit">Save</button>
</form>

<hr>

<h3>Upload Media</h3>

<form action="/admin/upload-media" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Hidden field to store the current textarea content -->
    <input type="hidden" id="upload_content" name="content">
    <input type="hidden" id="upload_slug" name="slug">
    <input type="hidden" id="upload_title" name="title">
	<input type="hidden" id="upload_is_locked" name="is_locked">
    <input type="file" name="file" required>
    <button type="submit">Upload</button>
</form>

@if(session('uploaded'))
    <p>Use this placeholder in your content:</p>
    <code>{{ session('uploaded') }}</code>
@endif

<script>
// Before upload form submits, copy the textarea content into the hidden field
document.querySelector('form[action="/admin/upload-media"]').addEventListener('submit', function() {
    document.getElementById('upload_content').value =
        document.querySelector('textarea[name="content"]').value;
    document.getElementById('upload_slug').value =
        document.querySelector('input[name="slug"]').value;
    document.getElementById('upload_title').value =
        document.querySelector('input[name="title"]').value;
    document.getElementById('upload_is_locked').value =
        document.querySelector('input[name="is_locked"]').checked ? 1 : 0;
    
});
</script>

@endsection