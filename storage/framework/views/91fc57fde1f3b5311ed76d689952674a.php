

<?php $__env->startSection('title'); ?>
    Add Category
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>




    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3>Add Category</h3>
        <?php $__env->endSlot(); ?>
        <li class="breadcrumb-item">Category</li>
        <li class="breadcrumb-item">Add Category</li>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">

                        <h2>Create Category</h2>

                        
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        
                        <form action="<?php echo e(route('category.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            
                            <div class="form-group">
                                <label for="name_en">Name (English):</label>
                                <input type="text" class="form-control" id="name_en" name="name_en" value="<?php echo e(old('name.en')); ?>" required>
                            </div>

                            
                            <div class="form-group">
                                <label for="name_ar">Name (Arabic):</label>
                                <input type="text" class="form-control" id="name_ar" name="name_ar" value="<?php echo e(old('name.ar')); ?>" required>
                            </div>

                            
                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>

                            
                            <button type="submit" class="btn btn-primary">Create Category</button>
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

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hesabatt/public_html/resources/views/dashboard/categories/create.blade.php ENDPATH**/ ?>