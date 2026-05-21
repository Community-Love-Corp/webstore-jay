<div>
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
	<h3>Upload Media</h3>

    <form action="/admin/upload-media" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="hidden" id="upload_abstract_html" name="abstract_html">
        <input type="hidden" id="upload_full_html" name="full_html">
        <input type="hidden" id="upload_slug" name="slug">
        <input type="hidden" id="upload_title" name="title">
        <input type="hidden" id="upload_price" name="price">
		<input type="hidden" id="upload_is_locked" name="is_locked">
        <input type="hidden" id="upload_content" name="content">
        <input type="file" name="file" required>
        <button type="submit">Upload</button>
    </form>

    <?php if(session('uploaded')): ?>
        <p>Use this placeholder in your content:</p>
        <code><?php echo e(session('uploaded')); ?></code>
    <?php endif; ?>
    
    <script>
        // Before upload form submits, copy the textarea content into the hidden field
        document.querySelector('form[action="/admin/upload-media"]').addEventListener('submit', function() {

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

    
	
</div><?php /**PATH /var/www/html/resources/views/components/media-upload.blade.php ENDPATH**/ ?>