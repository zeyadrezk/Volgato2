<?php $__env->startSection('title'); ?>Knowledgebase
 <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
	<?php $__env->startComponent('components.breadcrumb'); ?>
		<?php $__env->slot('breadcrumb_title'); ?>
			<h3>Knowledgebase</h3>
		<?php $__env->endSlot(); ?>
		<li class="breadcrumb-item active">Knowledgebase</li>
	<?php echo $__env->renderComponent(); ?>
	
	<div class="container-fluid faq-section">
		<div class="row">
		  <div class="col-12">
			<div class="knowledgebase-bg"><img class="bg-img-cover bg-center" src="<?php echo e(asset('assets/images/knowledgebase/bg_1.jpg')); ?>" alt="looginpage"></div>
			<div class="knowledgebase-search">
			  <div>
				<h3>How Can I help you?</h3>
				<form class="form-inline" action="#" method="get">
				  <div class="form-group w-100 mb-0"><i data-feather="search"></i>
					<input class="form-control-plaintext w-100" type="text" placeholder="Type question here" title="">
				  </div>
				</form>
			  </div>
			</div>
		  </div>
		  <div class="col-xl-4 xl-50 col-lg-6 box-col-6">
			<div class="card bg-primary">
			  <div class="card-body">
				<div class="media faq-widgets">
				  <div class="media-body">
					<h5>Articles</h5>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
				  </div><i data-feather="book-open"></i>
				</div>
			  </div>
			</div>
		  </div>
		  <div class="col-xl-4 xl-50 col-lg-6 box-col-6">
			<div class="card bg-primary">
			  <div class="card-body">
				<div class="media faq-widgets">
				  <div class="media-body">
					<h5>Knowledgebase</h5>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
				  </div><i data-feather="aperture"></i>
				</div>
			  </div>
			</div>
		  </div>
		  <div class="col-xl-4 col-lg-12 xl-100 box-col-12">
			<div class="card bg-primary">
			  <div class="card-body">
				<div class="media faq-widgets">
				  <div class="media-body">
					<h5>Support</h5>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
				  </div><i data-feather="file-text"></i>
				</div>
			  </div>
			</div>
		  </div>
		  <div class="col-lg-12 featured-tutorial">
			<div class="header-faq">
			  <h5 class="mb-0">Featured Tutorials</h5>
			</div>
			<div class="row">
			  <div class="col-xl-3 xl-50 col-sm-6 box-col-6">
				<div class="card features-faq product-box">
				  <div class="faq-image product-img"><img class="img-fluid" src="<?php echo e(asset('assets/images/faq/1.jpg')); ?>" alt="">
					<div class="product-hover">
					  <ul>
						<li><a href="knowledge-detail.html"><i class="icon-link"></i></a></li>
						<li><a href="knowledge-detail.html"><i class="icon-import"></i></a></li>
					  </ul>
					</div>
				  </div>
				  <div class="card-body"><a href="knowledge-detail.html">
					  <h6> Web Design</h6></a>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
				  </div>
				  <div class="card-footer"><span>Dec 15, 2019</span>
					<ul class="pull-right">
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star font-primary"></i></li>
					</ul>
				  </div>
				</div>
			  </div>
			  <div class="col-xl-3 xl-50 col-sm-6 box-col-6">
				<div class="card features-faq product-box">
				  <div class="faq-image product-img"><img class="img-fluid" src="<?php echo e(asset('assets/images/faq/2.jpg')); ?>" alt="">
					<div class="product-hover">
					  <ul>
						<li><a href="knowledge-detail.html"><i class="icon-link"></i></a></li>
						<li><a href="knowledge-detail.html"><i class="icon-import"></i></a></li>
					  </ul>
					</div>
				  </div>
				  <div class="card-body"><a href="knowledge-detail.html">
					  <h6>Web Development</h6></a>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
				  </div>
				  <div class="card-footer"><span>Dec 15, 2019</span>
					<ul class="pull-right">
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star-o font-primary"></i></li>
					</ul>
				  </div>
				</div>
			  </div>
			  <div class="col-xl-3 xl-50 col-sm-6 box-col-6">
				<div class="card features-faq product-box">
				  <div class="faq-image product-img"><img class="img-fluid" src="<?php echo e(asset('assets/images/faq/3.jpg')); ?>" alt="">
					<div class="product-hover">
					  <ul>
						<li><a href="knowledge-detail.html"><i class="icon-link"></i></a></li>
						<li><a href="knowledge-detail.html"><i class="icon-import"></i></a></li>
					  </ul>
					</div>
				  </div>
				  <div class="card-body"><a href="knowledge-detail.html">
					  <h6>UI Design</h6></a>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
				  </div>
				  <div class="card-footer"><span>Dec 15, 2019</span>
					<ul class="pull-right">
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star font-primary"></i></li>
					</ul>
				  </div>
				</div>
			  </div>
			  <div class="col-xl-3 xl-50 col-sm-6 box-col-6">
				<div class="card features-faq product-box">
				  <div class="faq-image product-img"><img class="img-fluid" src="<?php echo e(asset('assets/images/faq/4.jpg')); ?>" alt="">
					<div class="product-hover">
					  <ul>
						<li><a href="knowledge-detail.html"><i class="icon-link"></i></a></li>
						<li><a href="knowledge-detail.html"><i class="icon-import"></i></a></li>
					  </ul>
					</div>
				  </div>
				  <div class="card-body"><a href="knowledge-detail.html">
					  <h6>UX Design</h6></a>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
				  </div>
				  <div class="card-footer"><span>Dec 15, 2019</span>
					<ul class="pull-right">
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star-half-o font-primary"></i></li>
					</ul>
				  </div>
				</div>
			  </div>
			  <div class="col-xl-3 xl-50 col-sm-6 box-col-6">
				<div class="card features-faq product-box">
				  <div class="faq-image product-img"><img class="img-fluid" src="<?php echo e(asset('assets/images/faq/3.jpg')); ?>" alt="">
					<div class="product-hover">
					  <ul>
						<li><a href="knowledge-detail.html"><i class="icon-link"></i></a></li>
						<li><a href="knowledge-detail.html"><i class="icon-import"></i></a></li>
					  </ul>
					</div>
				  </div>
				  <div class="card-body"><a href="knowledge-detail.html">
					  <h6>UI Design</h6></a>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
				  </div>
				  <div class="card-footer"><span>Dec 15, 2019</span>
					<ul class="pull-right">
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star font-primary"></i></li>
					</ul>
				  </div>
				</div>
			  </div>
			  <div class="col-xl-3 xl-50 col-sm-6 box-col-6">
				<div class="card features-faq product-box">
				  <div class="faq-image product-img"><img class="img-fluid" src="<?php echo e(asset('assets/images/faq/4.jpg')); ?>" alt="">
					<div class="product-hover">
					  <ul>
						<li><a href="knowledge-detail.html"><i class="icon-link"></i></a></li>
						<li><a href="knowledge-detail.html"><i class="icon-import"></i></a></li>
					  </ul>
					</div>
				  </div>
				  <div class="card-body"><a href="knowledge-detail.html">
					  <h6>UX Design</h6></a>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
				  </div>
				  <div class="card-footer"><span>Dec 15, 2019</span>
					<ul class="pull-right">
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star-half-o font-primary"></i></li>
					</ul>
				  </div>
				</div>
			  </div>
			  <div class="col-xl-3 xl-50 col-sm-6 box-col-6">
				<div class="card features-faq product-box">
				  <div class="faq-image product-img"><img class="img-fluid" src="<?php echo e(asset('assets/images/faq/1.jpg')); ?>" alt="">
					<div class="product-hover">
					  <ul>
						<li><a href="knowledge-detail.html"><i class="icon-link"></i></a></li>
						<li><a href="knowledge-detail.html"><i class="icon-import"></i></a></li>
					  </ul>
					</div>
				  </div>
				  <div class="card-body"><a href="knowledge-detail.html">
					  <h6> Web Design</h6></a>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
				  </div>
				  <div class="card-footer"><span>Dec 15, 2019</span>
					<ul class="pull-right">
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star font-primary"></i></li>
					</ul>
				  </div>
				</div>
			  </div>
			  <div class="col-xl-3 xl-50 col-sm-6 box-col-6">
				<div class="card features-faq product-box">
				  <div class="faq-image product-img"><img class="img-fluid" src="<?php echo e(asset('assets/images/faq/2.jpg')); ?>" alt="">
					<div class="product-hover">
					  <ul>
						<li><a href="knowledge-detail.html"><i class="icon-link"></i></a></li>
						<li><a href="knowledge-detail.html"><i class="icon-import"></i></a></li>
					  </ul>
					</div>
				  </div>
				  <div class="card-body"><a href="knowledge-detail.html">
					  <h6>Web Development</h6></a>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
				  </div>
				  <div class="card-footer"><span>Dec 15, 2019</span>
					<ul class="pull-right">
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star font-primary"></i></li>
					  <li><i class="fa fa-star-o font-primary"></i></li>
					</ul>
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
<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Viho-laravel10/viho-laravel10_letest/resources/views/admin/miscellaneous/knowledgebase.blade.php ENDPATH**/ ?>