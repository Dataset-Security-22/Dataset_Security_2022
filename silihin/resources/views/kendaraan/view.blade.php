<?php foreach($kendaraan as $kendaraan) { ?>
	<div class="col-md-3 items-block">
		<div class="cs-card mb-3 cs-product-card">
			<img src="/storage/{!! $kendaraan->gambar !!}" alt="{!! $kendaraan->nama_kendaraan !!}" class="img-responsive" title="{!! $kendaraan->nama_kendaraan !!}">
			<div class="cs-card-content clearfix">
				<div class="pull-left">
					<h4 title="Sports drink">{!! $kendaraan->nama_kendaraan !!}</h4>
					<p>Rp. {!! rupiah($kendaraan->harga) !!}</p>
				</div>
				<div class="pull-right">
					<a class="btn btn-sm btn-round btn-2warning card-btn" data-toggle="modal" data-target="#edit-kendaraan-modal" data-id="{!! $kendaraan->id !!}" id="edit">Edit</a>
					@method("delete")
					<button class="btn btn-sm btn-round btn-2danger card-btn" onclick="konfirmasi('{!! $kendaraan->nama_kendaraan !!}', {!! $kendaraan->id !!})">Hapus</button>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>