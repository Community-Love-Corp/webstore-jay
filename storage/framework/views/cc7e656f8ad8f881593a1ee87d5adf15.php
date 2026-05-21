

<form action="<?php echo e(route('comment.store')); ?>" method="POST" style="text-align:center;">
    <?php echo csrf_field(); ?>

    <input type="hidden" name="source" value="<?php echo e($source); ?>">

    <label>Name</label><br>
    <input type="text" name="name" value="<?php echo e(old('name')); ?>" required><br><br>

    <label>Comment</label><br>
    <textarea name="comment" rows="4" required><?php echo e(old('comment')); ?></textarea><br><br>

    <div class="g-recaptcha" data-sitekey="<?php echo e(config('services.recaptcha.site')); ?>"></div><br>

    <button type="submit">Post Comment</button>
</form>

<?php if(session('captcha_error')): ?>
    <p style="color:red;"><?php echo e(session('captcha_error')); ?></p>
<?php endif; ?>

<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="comment-box">
        <strong><?php echo e($c->name); ?></strong><br>
        <p><?php echo e($c->comment); ?></p>
        <small><?php echo e($c->created_at->format('d-M-Y H:i')); ?></small>
    </div>
    <hr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>


<?php /**PATH /var/www/html/resources/views/components/comments.blade.php ENDPATH**/ ?>