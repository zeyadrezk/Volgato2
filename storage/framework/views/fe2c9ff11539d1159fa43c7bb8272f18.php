<?php $__env->startSection('title'); ?>Products
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

    
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

  <?php $__env->startComponent('components.breadcrumb'); ?>
    <?php $__env->slot('breadcrumb_title'); ?>
      <h3>Products</h3>
    <?php $__env->endSlot(); ?>
    <li class="breadcrumb-item">Products</li>
  <?php echo $__env->renderComponent(); ?>

  <div class="container-fluid">
      <div class="row">
          <div class="col-sm-12">
              <div class="card">
                  <div class="card-header pb-0">
                          <h3>All Products</h3>
                          <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary">Add Product</a>
                  </div>
                  <div class="card-body">
                      <table class="table">
                          <thead>
                          <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Price</th>
                              <th>Old Price</th>
                              <th>Category</th>
                              <th>Country</th>
                              <!-- Add more columns as needed -->
                          </tr>
                          </thead>
                          <tbody>
                          <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                  <td><?php echo e($product->id); ?></td>
                                  <td>
                                      <a href="<?php echo e(route('products.show', $product->id)); ?>" class="text-primary">  en -> <?php echo e($product->name['en']); ?> , ar -> <?php echo e($product->name['ar']); ?> </a>




                                  </td>
                                  <td><?php echo e($product->price); ?></td>
                                  <td><?php echo e($product->oldprice); ?></td>
                                  <td>
                                     en-> <?php echo e($product->category->name['en']); ?><br> ar -><?php echo e($product->category->name['ar']); ?>

                                  </td>
                                  <td>
                                      en-><?php echo e($product->country->name['en'] ?? ""); ?>, ar -><?php echo e($product->country->name['ar'] ?? ""); ?>

                                  </td>
                                  <td>
                                      <div class="btn-group">

                                      <a href="<?php echo e(route('products.edit', $product->id)); ?>" class="btn btn-primary">Edit</a>
                                      <form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="POST" style="display: inline-block;">
                                          <?php echo csrf_field(); ?>
                                          <?php echo method_field('DELETE'); ?>
                                          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                      </form>
                                      </div>
                                  </td>
                              </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>


  <?php $__env->startPush('scripts'); ?>
  <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\new Volgato\resources\views/dashboard/products/index.blade.php ENDPATH**/ ?>