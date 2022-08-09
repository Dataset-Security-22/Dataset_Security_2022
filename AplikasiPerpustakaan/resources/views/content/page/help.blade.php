@extends ("content.page.layouts.template")

@section("page_title", "Help")

@section("page_header") <i class="fa fa-gears"></i> Help @stop

@section("page_breadcrumb")

<ol class="breadcrumb">
	<li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li class="active">Help</li>
</ol>

@stop

@section("page_title","Dashboard")

@section("page_content")

<div class="row">
	<div class="col-md-6">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-bolt"></i> Tujuan </h3>
			</div>
			<div class="box-body">
				<p>
					- Memudahkan pengelola dalam mendata buku.
					<br><br>
					- Mempercepat pelayanan dalam meminjam buku.
					<br><br>
					- Mengatasi keterbatasan waktu.
				</p>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-magic"></i> Manfaat </h3>
			</div>
			<div class="box-body">
				<p>
					- Meningkatkan Layanan.
					<br><br>
					- Memperingan pekerjaan.
					<br><br>
					- Mempermudah akses informasi.
				</p>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="box box-danger">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-lightbulb-o"></i> Ide Pembuatan Aplikasi </h3>
			</div>
			<div class="box-body">
				<p style="text-align: justify;">
					Alur dari <b>Aplikasi Perpustakaan</b> ini terinspirasi dari sistem perpustakaan yang ada di <b>SMK INFORMATIKA AL - IRSYAD AL - ISLAMIYYAH KOTA CIREBON</b>, dimana setiap pengunjung perpustakaan, apabila ingin meminjam buku, mereka harus di daftarkan dulu yaitu sebagai <b>anggota</b>. Jika anggota sudah meminjam buku, maka buku tersebut wajib di kembalikan sampai batas waktu yang telah di tentukan. Apabila anggota tersebut belum mengembalikan sampai waktu yang telah di tentukan, maka anggota tersebut akan di kenakan <b>denda</b>. Anggota tidak bisa meminjam buku , apabila buku yang sebelum nya belum di kembalikan kepada <b>petugas perpustakaan</b>. Aplikasi ini dibuat <b>sederhana</b> sekali, agar pihak pengelola dapat mengoperasikan nya dengan mudah , cepat dan efektif. 
				</p>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="box box-warning">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-tasks"></i> Cara Penggunaan Aplikasi</h3>
			</div>
			<div class="box-body">
			@if(Auth::user()->level == 1)
			<p>
				1). <b>Admin</b> melakukan login terlebih dahulu.
				<br>
				2). Setelah login, maka akan dialihkan ke <b>Menu Dashboard</b>.
				<br>
				3). <b>Admin</b> dapat melakukan proses <b><i>CRUD</i> Prodi</b>.
				<br>
				4). <b>Admin</b> dapat melihat data seperti : Anggota, Buku, Peminjaman Buku, Pengembalian Buku dan Laporan.
				<br>
				5). <b>Admin</b> data melakukan proses <b><i>CRUD</i> Users</b>.
				<br>
				6). Jika sudah selesai, maka <b>Admin</b> dapat logout. 
			</p>
			@else
			<p>
				1). <b>Petugas</b> melakukan login terlebih dahulu.
				<br>
				2). Setelah login, petugas dapat melakukan proses <b><i>CRUD</i></b> Kategori, Rak, dan Buku.
				<br>
				3). Kemudian, petugas dapat mendaftarkan pengunjung apabila ingin meminjam buku, yaitu sebagai <b>anggota</b>.
				<br>
				4). Lalu, setelah di daftarkan sebagai anggota, pengunjung dapat meminjam buku yang di ingin baca.
				<br>
				5). Apabila buku tersebut ingin di bawa pulang ataupun yang lainnya, maka wajib anggota tersebut untuk melakukan <b>peminjaman</b>. Peminjaman dapat di lakukan sampai batas waktu yang telah di tentukan oleh <b>petugas</b>.
				<br>
				6). Apabila buku tersebut telah selesai di pinjam, maka anggota wajib untuk melakukan <b>pengembalian</b>. Jika, pengembalian buku telah melewati batas yang telah di tentukan oleh petugas. Maka anggota tersebut wajib untuk membayar <b>denda</b>.
				<br>
				7). Jika anggota tersebut ingin meminjam buku yang lain, maka wajib untuk mengembalikan buku yang sebelumnya di pinjam.
				<br>
				8). Setelah selesai, <b>petugas</b> dapat <b><i>logout</i></b> dari aplikasi ini.
			</p>
			@endif
			
			</div>
		</div>
	</div>
</div>

@endsection