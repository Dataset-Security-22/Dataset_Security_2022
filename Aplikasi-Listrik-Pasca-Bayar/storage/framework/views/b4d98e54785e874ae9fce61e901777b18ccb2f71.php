

<?php $__env->startSection("page_header"); ?> <i class="fa fa-pencil"></i> Penggunaan <?php $__env->stopSection(); ?>

<?php $__env->startSection("page_breadcrumb"); ?>

<ol class="breadcrumb">
	<li><a href="<?php echo e(url('/dashboard')); ?>">Dashboard</a></li>
	<li class="active">Penggunaan</li>
</ol>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("page_scripts"); ?>
<script type="text/javascript">
	function edit_penggunaan(id_penggunaan) {
		$.ajax({
			url : "<?php echo e(url('/penggunaan/edit')); ?>",
			type : "GET",
			data : { id_penggunaan : id_penggunaan },
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
				<h3 class="box-title"> Data Penggunaan </h3>
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
							<th class="text-center">ID Penggunaan</th>
							<th class="text-center">ID Pelanggan</th>
							<th>Nama Pelanggan</th>
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

								<?php if(Auth::user()->role == 1): ?>
									<a href="<?php echo e(url('/penggunaan/'.$penggunaan->id_penggunaan.'/detail')); ?>" class="btn btn-info btn-sm">
										<i class="fa fa-search"></i> Detail
									</a>
								<?php else: ?>
									<?php if($penggunaan->lpb_tagihan != NULL): ?>
									<button disabled onclick="edit_penggunaan(<?php echo e($penggunaan->id); ?>)" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default-update">
										<i class="fa fa-pencil"></i> Edit
									</button>
									<button disabled class="btn btn-danger btn-sm">
										<i class="fa fa-trash"></i> Hapus
									</button>
									<?php else: ?>
									<button onclick="edit_penggunaan(<?php echo e($penggunaan->id_penggunaan); ?>)" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default-update">
										<i class="fa fa-pencil"></i> Edit
									</button>
									<a onclick="return confirm('Yakin ? Mau di Hapus ?')" href="<?php echo e(url('/penggunaan/'.$penggunaan->id_penggunaan.'/hapus')); ?>" class="btn btn-danger btn-sm">
										<i class="fa fa-trash"></i> Hapus 
									</a>
									<?php endif; ?>
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
			<form method="POST" action="<?php echo e(url('/penggunaan')); ?>">
				<?php echo e(csrf_field()); ?>

				<input type="hidden" name="id_petugas" value="<?php echo e(Auth::user()->id); ?>">
				<div class="modal-body">
					<div class="form-group">
						<label for="id_penggunaan">ID Penggunaan</label>
						<?php
							$data = DB::table("penggunaan")
								->count();

							if ($data == 0) {
								$kode = 10042001;
							} else {
								$id_penggunaan = DB::table("penggunaan")
										->max("id_penggunaan");

								$kode = $id_penggunaan + 1;
							}
						?>
						<input type="text" class="form-control" id="id_penggunaan" name="id_penggunaan" value="<?php echo e($kode); ?>" readonly>
					</div>
					<div class="form-group">
						<label for="id_pelanggan">Nama Pelanggan</label>
						<select class="form-control" name="id_pelanggan">
							<option value="" disabled selected>- Pilih -</option>
							<?php $__currentLoopData = $data_pelanggan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pelanggan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php
									$data = DB::table("penggunaan")
										->where("id_pelanggan", $pelanggan->id_pelanggan)
										->where("bulan", date("m"))
										->where("tahun", date("Y"))
										->first();
								?>

								<?php if(!$data): ?>
								<option value="<?php echo e($pelanggan->id_pelanggan); ?>">
									<?php echo e($pelanggan->nama); ?>

								</option>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label> Bulan </label>
								<input type="text" class="form-control" name="bulan" value="<?php echo e(date('m')); ?>" readonly>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label> Tahun </label>
								<input type="text" class="form-control" name="tahun" value="<?php echo e(date('Y')); ?>" readonly>
							</div>							
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label> Meter Awal </label>
								<input type="number" class="form-control" name="meter_awal" placeholder="0">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label> Meter Akhir </label>
								<input type="number" class="form-control" name="meter_akhir" placeholder="0">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label> Tanggal Cek </label>
						<input type="date" class="form-control" name="tgl_cek" value="<?php echo e(date('Y-m-d')); ?>" readonly>
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
			<form method="POST" action="<?php echo e(url('/penggunaan')); ?>">
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
<?php echo $__env->make("content.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lenovo\Documents\Tugas_Tantangan\Aplikasi-Listrik-Pasca-Bayar\resources\views/content/penggunaan/penggunaan.blade.php ENDPATH**/ ?>