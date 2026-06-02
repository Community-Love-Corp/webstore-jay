
<?php
function render_placeholders($html) {
    if (!$html) return '';

    $html = preg_replace_callback('/\{\{IMAGE:(.*?)\}\}/', fn($m) =>
        '<img src="' . url('storage/pages/' . trim($m[1])) . '" class="auth-img">'
    , $html);

    $html = preg_replace_callback('/\{\{AUDIO:(.*?)\}\}/', fn($m) =>
        '<audio controls><source src="' . url('storage/audio/' . trim($m[1])) . '" type="audio/mpeg"></audio>'
    , $html);

    $html = preg_replace_callback('/\{\{VIDEO:(.*?)\}\}/', fn($m) =>
        '<video controls width="100%"><source src="' . url('storage/video/' . trim($m[1])) . '" type="video/mp4"></video>'
    , $html);

    $html = preg_replace_callback('/\{\{PDF:(.*?)\}\}/', fn($m) =>
        '<iframe src="' . url('storage/docs/' . trim($m[1])) . '" width="100%" height="600px"></iframe>'
    , $html);

    return $html;
}
?>

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
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <?php echo e(__('Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
<?php
    $source = 'resilience';
    $comments = \App\Models\Comment::where('source_page', $source)
                                   ->orderBy('id', 'desc')
                                   ->get();
?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <?php echo e(__("You're logged in!")); ?> 
                    <br><br><?php echo e(__("Shop for world class Information Technology Research.")); ?> 
                    
                </div>
            </div>
        </div>
    </div>
      <div class="py-6">
        <table class="w-full border">
            <tr class="bg-gray-100">
                <th class="p-2 border">Price</th>
                <th class="p-2 border">Description</th>
            </tr>

            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $hasPurchased = \App\Models\Order::where('user_id', auth()->id())
                    ->where('product_id', $product->id)
                    ->where('status', 'paid')
                    ->exists();
            ?>

            <tr>
                <td class="p-2 border" width="30%">
                    <h3><?php echo e($product->title); ?></h3>
                    <p>$<?php echo e($product->price); ?></p>

                    <?php if($hasPurchased): ?>
                        <p class="text-green-600 font-bold">Purchased</p>
                    <?php else: ?>
                        <form action="/checkout/paypal/<?php echo e($product->slug); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button class="bg-blue-600 text-white px-4 py-2">Buy Now</button>
                        </form>
                    <?php endif; ?>
                </td>

                <td class="p-2 border" width="70%">
                    <?php echo render_placeholders($product->abstract_html); ?>

                    
                    <?php if($hasPurchased): ?>
                        <hr class="my-4">
                        <?php echo render_placeholders($product->full_html); ?>

                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>

  	<div style="text-align: center;">
		<div class="auth-box-main">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <?php echo e(__('Comments')); ?>

            </h2>
             <br><br>         
            <?php if (isset($component)) { $__componentOriginald04b9949d0dada8faa8863322f9b06a8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald04b9949d0dada8faa8863322f9b06a8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.comments','data' => ['source' => $source,'comments' => $comments]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('comments'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['source' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($source),'comments' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($comments)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald04b9949d0dada8faa8863322f9b06a8)): ?>
<?php $attributes = $__attributesOriginald04b9949d0dada8faa8863322f9b06a8; ?>
<?php unset($__attributesOriginald04b9949d0dada8faa8863322f9b06a8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald04b9949d0dada8faa8863322f9b06a8)): ?>
<?php $component = $__componentOriginald04b9949d0dada8faa8863322f9b06a8; ?>
<?php unset($__componentOriginald04b9949d0dada8faa8863322f9b06a8); ?>
<?php endif; ?>
		</div>
	</div>    
    
         <p style="text-align: justify;">
            <strong>© 2026 ARRJ Harmony New Zealand. This work is original. Do not copy, repost, or use without permission.</strong>
            See <a href="https://www.blog.systematicdefence.tech/license.html">Legal license</a>.
        </p>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /home/systema1/blog.systematicdefence.tech/resources/views/dashboard.blade.php ENDPATH**/ ?>