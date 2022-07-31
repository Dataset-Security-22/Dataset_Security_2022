<?php 
$invoice = mt_rand(10000000,99999999); 
foreach($kendaraan as $k) { 
	if ($k->jumlah != 0) { ?>
		<div class="col-sm-4">
			<div class="cs-card mb-3 cs-product-card">
				<img src="/storage/{!! $k->gambar !!}" alt="{!! $k->nama_kendaraan !!}" class="img-responsive" title="{!! $k->nama_kendaraan !!}" data-toggle="modal" data-target="#detail-modal" data-id="{!! $k->id !!}" id="detail">
				<div class="cs-card-content clearfix">
					<div class="pull-left" data-toggle="modal" data-target="#detail-modal" data-id="{!! $k->id !!}" id="detail">
						<h4 title="{!! $k->nama_kendaraan !!} - [ {!! $k->user->nama_lengkap !!} ]">{!! $k->nama_kendaraan !!} - [ {!! $k->user->nama_lengkap !!} ]</h4>
						<p>Rp. {!! rupiah($k->harga) !!}</p>
						<p>Jumlah {!! $k->jumlah !!}</p>
					</div>
					<div class="pull-right">
						<button class="btn btn-sm btn-round btn-2warning" data-toggle="modal" data-target="#detail-modal" data-id="{!! $k->id !!}" id="detail">Detail</button><br>
						<?php 
						if (Session::get('logged_in')) { 
							if (Session::get('logged_in')['id'] != $k->id_user) { ?>
								<button class="btn btn-sm btn-round btn-primary card-btn" data-toggle="modal" data-target="#inputpesanan-modal" data-id="{!! $k->id !!}" data-invoice="pesan_{{ $invoice }}" id="pesan">Pesan</button>
								<!-- <form action="/kendaraan/{!! $k->id !!}/pesan_{!! $invoice !!}" method="post">
									@csrf
									<button class="btn btn-sm btn-round btn-primary card-btn">Pesan</button>
								</form> -->
							<?php } ?>
							<?php 
						} else { ?>
							<a onclick="show_popup('login')" class="btn btn-sm btn-round btn-primary card-btn">Pesan</a>
							<?php 
						}
						?>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<?php } ?>
