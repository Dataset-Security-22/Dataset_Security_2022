@extends("content.layouts.app")

@section("page_content")

<div class="row">
	<div class="col-md-12 mb-4">
		<div class="card border-left-info shadow h-100 py-2">
			<div class="card-body">
				Selamat Datang <b>{{ Auth::user()->name }}</b>!
				<br>
				di Aplikasi Sarana dan Prasarana SMK INFORMATIKA AL - IRSYAD AL - ISLAMIYYAH KOTA CIREBON.
				<br>
				Silahkan pilih menu, untuk memulai program.
			</div>
		</div>
	</div>
</div>

<img src="{{ url('images/Cirebon-Waterland-Taman-Ade-Irma-Suryani-300x169.jpg') }}" align="left">

@endsection
