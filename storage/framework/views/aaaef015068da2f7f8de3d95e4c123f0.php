

<?php $__env->startSection('title'); ?>
    Edit Category
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
            <h3>Edit Category</h3>
        <?php $__env->endSlot(); ?>
        <li class="breadcrumb-item">Categories</li>
        <li class="breadcrumb-item">Edit Category</li>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="container mt-4">

                            <form action="<?php echo e(route('category.update', $category->id)); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name_en" class="form-label">Name (English):</label>
                                            <input type="text" class="form-control" id="name_en" name="name_en" value="<?php echo e(old('name_en', $category->name['en'])); ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label for="name_ar" class="form-label">Name (Arabic):</label>
                                            <input type="text" class="form-control" id="name_ar" name="name_ar" value="<?php echo e(old('name_ar', $category->name['ar'])); ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label for="image" class="form-label">Image:</label>
                                            <input type="file" class="form-control" id="image" name="image">
                                            <?php if($category->image): ?>
                                                <div class="mt-2">
                                                    <img src="<?php echo e(asset('images/categories/'.$category->image)); ?>" alt="Category Image" style="width: 100px;">
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Update Category</button>
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

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\Volgato2\resources\views/dashboard/categories/edit.blade.php ENDPATH**/ ?>