

<?php $__env->startSection("page_header"); ?> <i class="fa fa-user"></i> Pelanggan <?php $__env->stopSection(); ?>

<?php $__env->startSection("page_breadcrumb"); ?>

<ol class="breadcrumb">
	<li><a href="<?php echo e(url('/dashboard')); ?>"> Dashboard</a></li>
	<li class="active">Pelanggan</li>
</ol>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("page_scripts"); ?>
<script type="text/javascript">
	function edit_pelanggan(id_pelanggan) {
		$.ajax({
			url : "<?php echo e(url('/pelanggan/edit')); ?>",
			type : "GET",
			data : { id_pelanggan : id_pelanggan },
			success : function(data) {
				$("#modal-content").html(data);
				return true;
			}
		});
	}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("page_content"); ?>

<?php if(session("sukses")): ?>
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-check"></i> Berhasil!</h4>
			<?php echo e(session("sukses")); ?>

		</div>
	</div>
</div>
<?php endif; ?>

<?php if(session("error")): ?>
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-ban"></i> Gagal!</h4>
			<?php echo e(session("error")); ?>

		</div>
	</div>
</div>
<?php endif; ?>

<?php if(count($errors) > 0): ?>
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-danger">
			<ul>
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li>
					<?php echo e($error); ?>

				</li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		</div>
	</div>
</div>
<?php endif; ?>

<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header">
				<?php if(Auth::user()->role == 1): ?>
				<h3 class="box-title"> Data Pelanggan </h3>
				<?php else: ?>
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">
					<i class="fa fa-plus"></i> Tambah Data
				</button>
				<?php endif; ?>
			</div>
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th class="text-center">ID Pelanggan</th>
							<th class="text-center">No. Meter</th>
							<th>Nama</th>
							<th class="text-center">Kode Tarif</th>
							<th class="text-center">Golongan</th>
							<th class="text-center">Tarif PerKwh</th>
							<th>Alamat</th>
							<?php if(Auth::user()->role == 1): ?>

							<?php else: ?>
							<th class="text-center">Aksi</th>
							<?php endif; ?>
						</tr>
					</thead>
					<tbody>
						<?php $no = 0 ?>

						<?php $__currentLoopData = $data_pelanggan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pelanggan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td class="text-center"><?php echo e(++$no); ?>.</td>
							<td class="text-center"><?php echo e($pelanggan->id_pelanggan); ?></td>
							<td class="text-center"><?php echo e($pelanggan->no_meter); ?></td>
							<td><?php echo e($pelanggan->nama); ?></td>
							<td class="text-center"><?php echo e($pelanggan->lpb_tarif->kode_tarif); ?></td>
							<td class="text-center"><?php echo e($pelanggan->lpb_tarif->golongan); ?></td>
							<td class="text-center">Rp. <?php echo e(number_format($pelanggan->lpb_tarif->tarif_perkwh)); ?></td>
							<td><?php echo e($pelanggan->alamat); ?></td>
							<?php if(Auth::user()->role == 1): ?>

							<?php else: ?>
							<td class="text-center">
								<?php if($pelanggan->lpb_penggunaan != NULL): ?>
								<button disabled class="btn btn-warning btn-sm">
									<i class="fa fa-pencil"></i> Edit
								</button>
								<button disabled class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i> Hapus
								</button>
								<?php else: ?>
								<button onclick="edit_pelanggan(<?php echo e($pelanggan->id_pelanggan); ?>)" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default-update">
									<i class="fa fa-pencil"></i> Edit
								</button>
								<a onclick="return confirm('Yakin ? Mau di Hapus ?')" href="<?php echo e(url('/pelanggan/'.$pelanggan->id_pelanggan.'/hapus')); ?>" class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i> Hapus
								</a>
								<?php endif; ?>
							</td>
							<?php endif; ?>
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
			<form method="POST" action="<?php echo e(url('/pelanggan')); ?>">
				<?php echo e(csrf_field()); ?>

				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="id_pelanggan">ID Pelanggan</label>
								<?php
									$data = DB::table("pelanggan")
										->count();

									if ($data == 0) {
										$kode_unik = 12350;
									} else {
										$id_pelanggan = DB::table("pelanggan")
										->max("id_pelanggan");
										
										$kode_unik = $id_pelanggan + 1;
									}
								?>
								<input type="text" class="form-control" name="id_pelanggan" value="<?php echo e($kode_unik); ?>" autocomplete="off" readonly>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>No. Meter</label>
								<input type="text" class="form-control" name="no_meter" autocomplete="off" placeholder="Masukkan No. Meter">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nama_pelanggan">Nama Pelanggan</label>
								<input type="text" class="form-control" id="nama_pelanggan" name="nama" autocomplete="off" placeholder="Masukkan Nama Pelanggan">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="id_tarif">Tarif</label>
								<select class="form-control" id="id_tarif" name="id_tarif">
									<option value="" disabled selected>- Pilih -</option>
									<?php $__currentLoopData = $data_tarif; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tarif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($tarif->id); ?>">
										<?php echo e($tarif->golongan); ?> - <?php echo e($tarif->daya); ?>

									</option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control" name="alamat" placeholder="Masukkan Alamat Pelanggan" rows="5"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-refresh"></i> Close</button>
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
				<h4 class="modal-title"><i class="fa fa-pencil"></i> Edit Data </h4>
			</div>
			<form method="POST" action="<?php echo e(url('/pelanggan')); ?>">
				<?php echo e(csrf_field()); ?>

				<?php echo e(method_field("PUT")); ?>

				<div class="modal-body" id="modal-content">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-refresh"></i> Close</button>
					<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan </button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make("content.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\Documents\Tugas_Tantangan\Aplikasi-Listrik-Pasca-Bayar\resources\views/content/pelanggan/pelanggan.blade.php ENDPATH**/ ?>