<div>
    <h3>Upload Purchase Item For Sale</h3>

    <form action="/admin/upload-purchase" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="upload_abstract_html" name="abstract_html">
        <input type="hidden" id="upload_full_html" name="full_html">

        <input type="hidden" id="upload_title" name="title">
        <input type="hidden" id="upload_price" name="price">
		<input type="hidden" id="upload_is_locked" name="is_locked">
        <input type="hidden" id="upload_content" name="content">-->
        <input type="hidden" id="upload_slug" name="slug" >
        <input type="file" name="file" required>

        <button type="submit">Upload</button>
    </form>

    @if(session('uploaded'))
        <p>Use this placeholder in your content:</p>
        <code>{{ session('uploaded') }}</code>
    @endif

    <script>
        document.querySelector('form[action="/admin/upload-purchase"]').addEventListener('submit', function () {
            document.getElementById('upload_full_html').value =
                document.querySelector('textarea[name="full_html"]').value;

    		document.getElementById('upload_abstract_html').value =
                document.querySelector('textarea[name="abstract_html"]').value;

            document.getElementById('upload_slug').value =
                document.querySelector('input[name="slug"]').value;
        
            document.getElementById('upload_title').value =
                document.querySelector('input[name="title"]').value;
        
            document.getElementById('upload_is_locked').value =
                document.querySelector('input[name="is_locked"]').checked ? 1 : 0;
        
    		document.getElementById('upload_price').value =
                document.querySelector('input[name="price"]').value;

    		document.getElementById('upload_content').value =
                document.querySelector('textarea[name="content"]').value;

        });
    </script>
</div>
