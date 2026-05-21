<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl">Create Product</h2>
     <?php $__env->endSlot(); ?>

    <div class="py-6">
        <form action="<?php echo e(route('admin.products.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <label>Slug</label>
            <input type="text" name="slug" class="w-full border p-2"  value="<?php echo e(old('slug')); ?>" required>

            <label class="mt-4 block">Title</label>
            <input type="text" name="title" class="w-full border p-2"  value="<?php echo e(old('title')); ?>" required>

            <label class="mt-4 block">Price</label>
            <input type="number" step="0.01" name="price" class="w-full border p-2"  value="<?php echo e(old('price')); ?>" required>

            <label class="mt-4 block">Abstract (HTML allowed)</label>
            <textarea name="abstract_html" rows="20" class="w-full border p-2"><?php echo e(old('abstract_html')); ?></textarea>

            <label class="mt-4 block">Full Content (HTML allowed)</label>
            <textarea name="full_html" rows="20" class="w-full border p-2"><?php echo e(old('full_html')); ?></textarea>

            <button class="mt-4 bg-blue-600 text-white px-4 py-2">Create</button>
        </form>

        <?php if (isset($component)) { $__componentOriginald3b32bd84ad0d2968b22b609ce9cd046 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald3b32bd84ad0d2968b22b609ce9cd046 = $attributes; } ?>
<?php $component = App\View\Components\MediaUpload::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('media-upload'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\MediaUpload::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald3b32bd84ad0d2968b22b609ce9cd046)): ?>
<?php $attributes = $__attributesOriginald3b32bd84ad0d2968b22b609ce9cd046; ?>
<?php unset($__attributesOriginald3b32bd84ad0d2968b22b609ce9cd046); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald3b32bd84ad0d2968b22b609ce9cd046)): ?>
<?php $component = $__componentOriginald3b32bd84ad0d2968b22b609ce9cd046; ?>
<?php unset($__componentOriginald3b32bd84ad0d2968b22b609ce9cd046); ?>
<?php endif; ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH /var/www/html/resources/views/admin/products/create.blade.php ENDPATH**/ ?>