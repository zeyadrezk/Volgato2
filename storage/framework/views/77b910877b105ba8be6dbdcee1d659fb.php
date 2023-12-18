

<?php $__env->startSection('title'); ?>
    Edit page
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
            <h3>Edit page</h3>
        <?php $__env->endSlot(); ?>
        <li class="breadcrumb-item">pages</li>
        <li class="breadcrumb-item">Edit page</li>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="container mt-4">

                                <form action="<?php echo e(route('page.update', $page->id)); ?>" method="POST" >
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name_en" class="form-label">title (English):</label>
                                                <input type="text" class="form-control" id="name_en" name="name_en" value="<?php echo e(old('name_en', $page->title['en'])); ?>">
                                            </div>

                                            <div class="mb-3">
                                                <label for="name_ar" class="form-label">title (Arabic):</label>
                                                <input type="text" class="form-control" id="name_ar" name="name_ar" value="<?php echo e(old('name_ar', $page->title['ar'])); ?>">
                                            </div>

                                            <div class="mb-3">
                                                <label for="description_en" class="form-label">Description (English):</label>
                                                <textarea class="form-control" id="description_en" name="description_en"><?php echo e(old('description_en', $page->description['en'])); ?></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="description_ar" class="form-label">Description (Arabic):</label>
                                                <textarea class="form-control" id="description_ar" name="description_ar"><?php echo e(old('description_ar', $page->description['ar'])); ?></textarea>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Update page</button>
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

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hesabatt/public_html/resources/views/dashboard/staticPage/edit.blade.php ENDPATH**/ ?>