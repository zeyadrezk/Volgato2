<?php $__env->startSection('title'); ?>
    Edit Product
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
            <h3>Edit Product</h3>
        <?php $__env->endSlot(); ?>
        <li class="breadcrumb-item">Products</li>
        <li class="breadcrumb-item">Edit Product</li>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="container mt-4">
                            <h3>Edit Product</h3>
                            <br>

                            <form action="<?php echo e(route('products.update', $product->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>

                                <div class="row">


                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="name_en" class="form-label">Name (English):</label>
                                                    <input type="text" class="form-control" id="name_en" name="name_en"
                                                           value="<?php echo e($product->name['en']); ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="name_ar" class="form-label">Name (Arabic):</label>
                                                    <input type="text" class="form-control" id="name_ar" name="name_ar"
                                                           value="<?php echo e($product->name['ar']); ?>">
                                                </div>
                                            </div>
                                        </div>

                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="price" class="form-label">Price:</label>
                                                    <input type="text" class="form-control" id="price" name="price"
                                                           value="<?php echo e($product->price); ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="oldprice" class="form-label">Old Price:</label>
                                                    <input type="text" class="form-control" id="oldprice"
                                                           name="oldprice" value="<?php echo e($product->oldprice); ?>">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="category_id" class="form-label">Category:</label>
                                                <select class="form-select" id="category_id" name="category_id">
                                                    <option
                                                        value="<?php echo e($product->category->id); ?>"><?php echo e($product->category->name['en']); ?>

                                                        , <?php echo e($product->category->name['ar']); ?></option>
                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name['en']); ?>

                                                            , <?php echo e($category->name['ar']); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <!-- Add more options dynamically based on available categories -->
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="country_id" class="form-label">Country:</label>
                                                <select class="form-select" id="country_id" name="country_id">
                                                    <option
                                                        value="<?php echo e($product->country->id); ?>"><?php echo e($product->country->name['en']); ?>

                                                        ,<?php echo e($product->country->name['ar']); ?></option>
                                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($country->id); ?>"><?php echo e($country->name['en']); ?>

                                                            , <?php echo e($country->name['ar']); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Update Product</button>
                                        <!-- Add more actions or buttons as needed -->
                                    </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php $__env->startPush('scripts'); ?>
    <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\viho-laravel-10\viho-laravel-10\resources\views/dashboard/products/edit.blade.php ENDPATH**/ ?>