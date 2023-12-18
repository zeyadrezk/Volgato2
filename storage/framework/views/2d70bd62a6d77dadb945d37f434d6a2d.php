<?php $__env->startSection('title'); ?>
   Product
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>


    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3> Product</h3>
        <?php $__env->endSlot(); ?>
        <li class="breadcrumb-item">Products</li>
        <li class="breadcrumb-item">Product</li>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">

                        <div class="mb-4">
                            <h2>Product</h2>
                            <br>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3><?php echo e($product->name['en']); ?> / <?php echo e($product->name['ar']); ?></h3>
                                                <p><strong>Price:</strong> <?php echo e($product->price); ?></p>
                                                <p><strong>Old Price:</strong> <?php echo e($product->oldprice); ?></p>
                                                <img src="<?php echo e($product->image); ?>" alt="Product Image" class="img-fluid mb-2">
                                                <p><strong>Second Image:</strong><img src=" <?php echo e($product->secondImage); ?>"</p>
                                                <p><strong>Video:</strong> <a href="<?php echo e($product->Video); ?>" target="_blank">Watch Video</a></p>
                                                <p><strong>Quantity:</strong> <?php echo e($product->quantity); ?></p>
                                                <p><strong>Total Rate:</strong> <?php echo e($product->total_rate); ?></p>
                                                <p><strong>Category:</strong> <?php echo e($product->category->name['en']); ?> / <?php echo e($product->category->name['ar']); ?></p>
                                                <p><strong>Country:</strong> <?php echo e($product->country->name['en']); ?> / <?php echo e($product->country->name['ar']); ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Short Description:</strong> <?php echo e($product->short_description['en']); ?>, <?php echo e($product->short_description['ar']); ?></p>
                                                <p><strong>Description:</strong> <?php echo e($product->description['en']); ?> / <?php echo e($product->description['ar']); ?></p>
                                                <p><strong>Details:</strong> <?php echo e($product->details['en']); ?> / <?php echo e($product->details['ar']); ?></p>
                                                <!-- Display other product details as needed -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>
            </div>
        </div>
    </div>


    <?php $__env->startPush('scripts'); ?>
    <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\new Volgato\resources\views/dashboard/products/show.blade.php ENDPATH**/ ?>