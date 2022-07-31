@extends("content.layouts")

@section("page_content")

@foreach($data_menu as $menu)
	<div class="col-md-4">
		<div class="panel panel-violet">
			<div class="panel-body">
				<img src="{{ url('/public/img_menu/'.$menu->foto_menu) }}" width="300">
				<br><br>
				<p>
					Menu : {{ $menu->nama_menu }} <br>
					Harga : Rp. {{ number_format($menu->harga_menu) }}
				</p>
				<a href="{{ url('/detail_menu/'.$menu->id.'/detail') }}" class="btn btn-primary btn-block">
					<i class="fa fa-search"></i> Detail Menu
				</a>
			</div>
		</div>
	</div>
@endforeach

@endsection