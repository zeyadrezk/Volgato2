

<?php $__env->startSection('title'); ?>
    <?php echo e($page->title['en']); ?><?php $__env->stopSection(); ?>

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
            <h3> <?php echo e($page->title['en']); ?></h3>
        <?php $__env->endSlot(); ?>
        <li class="breadcrumb-item">pages</li>
        <li class="breadcrumb-item"><?php echo e($page->title['en']); ?></li>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">

                        <div class="mb-4">
                            <h2><?php echo e($page->title['en']); ?></h2>
                            <br>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <h4>English Title: <?php echo e($page->title['en']); ?></h4>
                                            <h4>Arabic Title: <?php echo e($page->title['ar']); ?></h4>
                                            <p>English Description: <?php echo e($page->description['en']); ?></p>
                                            <p>Arabic Description: <?php echo e($page->description['ar']); ?></p>

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

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hesabatt/public_html/resources/views/dashboard/staticPage/show.blade.php ENDPATH**/ ?>