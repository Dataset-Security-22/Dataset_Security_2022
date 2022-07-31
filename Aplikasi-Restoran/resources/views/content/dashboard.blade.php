@extends("content.layouts")

@section("page_content")

<div class="col-sm-12 col-md-12">
	<div class="panel panel-violet">
		<div class="panel-heading">
			Selamat Datang <b>{{ Auth::user()->name }}</b>
		</div>
		<div class="panel-body">
			di Aplikasi Restoran Kami. Silahkan Pilih menu untuk memulai program
		</div>
	</div>
</div>


@foreach($data_menu as $menu)
	<div class="col-md-4 col-sm-4">
		<div class="panel panel-violet">
			<div class="panel-heading">
				{{ $menu->nama_menu }}
			</div>
			<div class="panel-body">
				<img src="{{ url('/public/img_menu/'.$menu->foto_menu) }}" width="100%" height="300px">
				<hr>
				<p>
					<b>Kode Menu : </b> {{ $menu->kode_menu }}
					<hr>
					<b>Harga : </b> Rp. {{ number_format($menu->harga_menu) }}
					<hr>
				</p>
				<a href="{{ url('/detail_menu/'.$menu->id.'/detail') }}" class="btn btn-success btn-block">
					<i class="fa fa-search"></i> Detail
				</a>
			</div>
		</div>
	</div>
@endforeach

@endsection