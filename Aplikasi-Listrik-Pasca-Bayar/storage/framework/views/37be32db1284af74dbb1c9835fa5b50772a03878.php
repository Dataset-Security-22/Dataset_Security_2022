

<?php $__env->startSection("page_header"); ?> <i class="fa fa-dashboard"></i> Dashboard <?php $__env->stopSection(); ?>

<?php $__env->startSection("page_breadcrumb"); ?>

<ol class="breadcrumb">
	<li class="active">Dashboard</li>
</ol>


<?php $__env->stopSection(); ?>

<?php $__env->startSection("page_content"); ?>

<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title"> Selamat Datang <b><?php echo e(Auth::user()->name); ?></b></h3>
			</div>
			<div class="box-body">
				<p>
					di <b>Aplikasi Listrik Pasca Bayar Berbasis Web.</b> Silahkan Pilih menu untuk memulai program.
				</p>
			</div>
		</div>
	</div>
</div>

<?php if(Auth::user()->role == 1): ?>

<div class="row">
	<div class="col-lg-4">
		<!-- small box -->
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3><?php echo e($tarif); ?></h3>

				<p>Tarif</p>
			</div>
			<div class="icon">
				<i class="fa fa-fax"></i>
			</div>
			<a href="<?php echo e(url('/tarif')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-lg-4">
		<!-- small box -->
		<div class="small-box bg-green">
			<div class="inner">
				<h3><?php echo e($pelanggan); ?></h3>

				<p>Pelanggan</p>
			</div>
			<div class="icon">
				<i class="fa fa-user"></i>
			</div>
			<a href="<?php echo e(url('/pelanggan')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-lg-4">
		<!-- small box -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3><?php echo e($penggunaan); ?></h3>

				<p>Penggunaan</p>
			</div>
			<div class="icon">
				<i class="fa fa-pencil"></i>
			</div>
			<a href="<?php echo e(url('/penggunaan')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-4">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3><?php echo e($tagihan); ?></h3>

				<p>Tagihan</p>
			</div>
			<div class="icon">
				<i class="fa fa-folder-open"></i>
			</div>
			<a href="<?php echo e(url('/tagihan-pengguna')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-lg-4">
		<!-- small box -->
		<div class="small-box bg-purple">
			<div class="inner">
				<h3><?php echo e($pembayaran); ?></h3>

				<p>Pembayaran</p>
			</div>
			<div class="icon">
			<i class="fa fa-money"></i>
			</div>
			<a href="<?php echo e(url('/pembayaran')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-lg-4">
		<!-- small box -->
		<div class="small-box bg-gray">
			<div class="inner">
				<h3><?php echo e($petugas); ?></h3>

				<p>Petugas</p>
			</div>
			<div class="icon">
			<i class="fa fa-users"></i>
			</div>
			<a href="<?php echo e(url('/petugas')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
</div>

<?php else: ?>

<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("content.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\Documents\Tugas_Tantangan\Aplikasi-Listrik-Pasca-Bayar\resources\views/content/dashboard.blade.php ENDPATH**/ ?>