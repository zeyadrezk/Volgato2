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
                            <h1>Create Product</h1>


                            <form action="<?php echo e(route('products.store')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name_en" class="form-label">Name (English):</label>
                                            <input type="text" class="form-control" id="name_en" name="name_en" value="<?php echo e(old('name_en')); ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label for="name_ar" class="form-label">Name (Arabic):</label>
                                            <input type="text" class="form-control" id="name_ar" name="name_ar" value="<?php echo e(old('name_ar')); ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label for="price" class="form-label">Price:</label>
                                            <input type="text" class="form-control" id="price" name="price" value="<?php echo e(old('price')); ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label for="oldprice" class="form-label">Old Price:</label>
                                            <input type="text" class="form-control" id="oldprice" name="oldprice" value="<?php echo e(old('oldprice')); ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label for="image" class="form-label">Image:</label>
                                            <input type="file" class="form-control" id="image" name="image">
                                        </div>

                                        <div class="mb-3">
                                            <label for="secondImage" class="form-label">Second Image:</label>
                                            <input type="file" class="form-control" id="secondImage" name="secondImage">
                                        </div>

                                        <div class="mb-3">
                                            <label for="Video" class="form-label">Video URL:</label>
                                            <input type="text" class="form-control" id="Video" name="Video" value="<?php echo e(old('Video')); ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label for="quantity" class="form-label">Quantity:</label>
                                            <input type="text" class="form-control" id="quantity" name="quantity" value="<?php echo e(old('quantity')); ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label for="total_rate" class="form-label">Total Rate:</label>
                                            <input type="text" class="form-control" id="total_rate" name="total_rate" value="<?php echo e(old('total_rate')); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="short_description_en" class="form-label">Short Description (English):</label>
                                            <input type="text" class="form-control" id="short_description_en" name="short_description_en" value="<?php echo e(old('short_description_en')); ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label for="short_description_ar" class="form-label">Short Description (Arabic):</label>
                                            <input type="text" class="form-control" id="short_description_ar" name="short_description_ar" value="<?php echo e(old('short_description_ar')); ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label for="description_en" class="form-label">Description (English):</label>
                                            <textarea class="form-control" id="description_en" name="description_en"><?php echo e(old('description_en')); ?></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="description_ar" class="form-label">Description (Arabic):</label>
                                            <textarea class="form-control" id="description_ar" name="description_ar"><?php echo e(old('description_ar')); ?></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="details_en" class="form-label">Details (English):</label>
                                            <textarea class="form-control" id="details_en" name="details_en"><?php echo e(old('details_en')); ?></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="details_ar" class="form-label">Details (Arabic):</label>
                                            <textarea class="form-control" id="details_ar" name="details_ar"><?php echo e(old('details_ar')); ?></textarea>
                                        </div>

                                        <!-- Add more fields as needed -->

                                        <div class="mb-3">
                                            <label for="category_id" class="form-label">Category:</label>
                                            <select class="form-select" id="category_id" name="category_id">
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name['en']); ?>

                                                        , <?php echo e($category->name['ar']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="country_id" class="form-label">Country:</label>
                                            <select class="form-select" id="country_id" name="country_id">
                                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($country->id); ?>"><?php echo e($country->name['en']); ?>

                                                        ,<?php echo e($country->name['ar']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Create Product</button>
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

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\new Volgato\resources\views/dashboard/products/create.blade.php ENDPATH**/ ?>