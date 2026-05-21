@extends('layouts.cms')

@section('content')

<h1>Edit Page: {{ $page->title }}</h1>

<form action="/admin/pages/{{ $page->slug }}" method="POST">
    @csrf
    @method('PUT')

    <label>Title</label>
    <input type="text" name="title" value="{{ $page->title }}" required>

    <label>Content (HTML allowed)</label>
    <textarea name="content" rows="20" style="width:100%;">{{ $page->content }}</textarea>

    <button type="submit">Update</button>
</form>

<hr>

<!-- SEPARATE UPLOAD FORM -->
<h3>Upload Media</h3>

<form action="/admin/upload-media" method="POST" enctype="multipart/form-data" target="_blank">
    @csrf
    <input type="file" name="file" required>
    <button type="submit">Upload</button>
</form>

@if(session('uploaded'))
    <p>Use this placeholder in your content:</p>
    <code>{{ session('uploaded') }}</code>
@endif


@endsection
