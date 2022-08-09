

<?php $__env->startSection("page_header"); ?> <i class="fa fa-folder-open"></i> Tagihan Penggunaan <?php $__env->stopSection(); ?>

<?php $__env->startSection("page_breadcrumb"); ?>

<ol class="breadcrumb">
	<li><a href="<?php echo e(url('/dashboard')); ?>"> Dashboard</a></li>
	<li class="active">Tagihan Pengguna</li>
</ol>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("page_scripts"); ?>
<script type="text/javascript">
	function edit_tarif(id) {
		$.ajax({
			url : "<?php echo e(url('/edit_tarif')); ?>",
			type : "GET",
			data : { id : id },
			success : function(data) {
				$("#modal-content").html(data);
				return true;
			}
		});
	}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("page_content"); ?>

<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title"> Data Tagihan </h3>
			</div>
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th class="text-center">ID Penggunaan</th>
							<th class="text-center">ID Pelanggan</th>
							<th>Nama Pelanggan </th>
							<th class="text-center">Meter Awal</th>
							<th class="text-center">Meter Akhir</th>
							<th class="text-center">Tanggal Cek</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 0 ?>

						<?php $__currentLoopData = $data_penggunaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $penggunaan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td class="text-center"><?php echo e(++$no); ?>.</td>
							<td class="text-center"><?php echo e($penggunaan->id_penggunaan); ?></td>
							<td class="text-center"><?php echo e($penggunaan->lpb_pelanggan->id_pelanggan); ?></td>
							<td><?php echo e($penggunaan->lpb_pelanggan->nama); ?></td>
							<td class="text-center"><?php echo e($penggunaan->meter_awal); ?></td>
							<td class="text-center"><?php echo e($penggunaan->meter_akhir); ?></td>
							<td class="text-center"><?php echo e($penggunaan->tgl_cek); ?></td>
							<td class="text-center">
								<?php if($penggunaan->lpb_tagihan != NULL): ?>
								<a href="<?php echo e(url('/tagihan-pengguna/'.$penggunaan->id_penggunaan.'/lihat')); ?>" class="btn btn-success btn-sm">
									<i class="fa fa-map-marker"></i> Lihat 
								</a>
								<?php else: ?>
								<a href="<?php echo e(url('/tagihan-pengguna/'.$penggunaan->id_penggunaan.'/detail')); ?>" class="btn btn-info btn-sm">
									<i class="fa fa-search"></i> Detail
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

<!-- Modal Tambah -->
<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Data</h4>
			</div>
			<form method="POST" action="<?php echo e(url('/simpan_data_tarif')); ?>">
				<?php echo e(csrf_field()); ?>

				<div class="modal-body">
					<div class="form-group">
						<label>Kode Tarif</label>
						<input type="text" class="form-control" name="kode_tarif">
					</div>
					<div class="form-group">
						<label>Golongan</label>
						<input type="text" class="form-control" name="golongan">
					</div>
					<div class="form-group">
						<label>Daya</label>
						<input type="text" class="form-control" name="daya">
					</div>
					<div class="form-group">
						<label>Tarif PerKwh</label>
						<input type="text" class="form-control" name="tarif_perkwh">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah </button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End -->

<!-- Modal Update -->
<div class="modal fade" id="modal-default-update">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"><i class="fa fa-pencil"></i> Update Data </h4>
			</div>
			<form method="POST" action="<?php echo e(url('/update_data_tarif')); ?>">
				<?php echo e(csrf_field()); ?>

				<div class="modal-body" id="modal-content">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan </button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make("content.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\Documents\Tugas_Tantangan\Aplikasi-Listrik-Pasca-Bayar\resources\views/content/tagihan/tagihan.blade.php ENDPATH**/ ?>