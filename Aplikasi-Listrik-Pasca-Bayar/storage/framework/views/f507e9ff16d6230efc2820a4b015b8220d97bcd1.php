

<?php $__env->startSection("page_header"); ?> <i class="fa fa-money"></i> Pembayaran <?php $__env->stopSection(); ?>

<?php $__env->startSection("page_breadcrumb"); ?>

<ol class="breadcrumb">
	<li><a href="<?php echo e(url('/dashboard')); ?>"> Dashboard</a></li>
	<li class="active">Pembayaran</li>
</ol>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("page_content"); ?>

<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Data Pembayaran </h3>
			</div>
			<div class="box-body">
				<div class="table table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th class="text-center">ID Tagihan</th>
								<th>Nama Pelanggan</th>
								<th class="text-center">Bulan Tagih</th>
								<th class="text-center">Pemakaian</th>
								<th class="text-center">Status Bayar</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 0 ?>

							<?php $__currentLoopData = $data_tagihan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tagihan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td class="text-center"><?php echo e(++$no); ?>.</td>
									<td class="text-center"><?php echo e($tagihan->id); ?></td>
									<td><?php echo e($tagihan->lpb_penggunaan->lpb_pelanggan->nama); ?></td>
									<td class="text-center"><?php echo e($tagihan->bulan); ?></td>
									<td class="text-center"><?php echo e($tagihan->jumlah_meter); ?></td>
									<td class="text-center"><?php echo e($tagihan->status); ?></td>
									<td class="text-center">
										<?php if($tagihan->status == "Sudah Bayar"): ?>
										<a href="<?php echo e(url('/pembayaran/'.$tagihan->id.'/detail-data-pembayaran')); ?>" class="btn btn-info btn-sm">
											<i class="fa fa-search"></i> Detail Data
										</a>
										<?php else: ?>
										<a href="<?php echo e(url('/pembayaran/'.$tagihan->id.'/bayar')); ?>" class="btn btn-success btn-sm">
											<i class="fa fa-search"></i> Bayar Tagihan
										</a>
										<?php endif; ?>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make("content.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\Documents\Tugas_Tantangan\Aplikasi-Listrik-Pasca-Bayar\resources\views/content/pembayaran/pembayaran.blade.php ENDPATH**/ ?>