<div class="row">
	<div class="col-md-8">
		<table>
			<tr>
				<td>NIM</td>
				<td style="padding-left: 5px; padding-right: 5px;">:</td>
				<td>
					{{ $detail->data_anggota->nim }}
				</td>
			</tr>
			<td>&nbsp;</td>
			<tr>
				<td>Nama Anggota</td>
				<td style="padding-left: 5px; padding-right: 5px;">:</td>
				<td>
					{{ $detail->data_anggota->nama }}
				</td>
			</tr>
			<td>&nbsp;</td>
			<tr>
				<td>Prodi</td>
				<td style="padding-left: 5px; padding-right: 5px;">:</td>
				<td>
					{{ $detail->data_anggota->prodi->nama_prodi }}
				</td>
			</tr>
			<td>&nbsp;</td>
			<tr>
				<td>Tanggal Registrasi</td>
				<td style="padding-left: 5px; padding-right: 5px;">:</td>
				<td>
					{{ $detail->data_anggota->tgl_registrasi }}
				</td>
			</tr>
		</table>
	</div>
	<div class="col-md-4">
		<img src="{{ url('/public/images') }}/default.jpg" class="user-image" alt="User Image" width="100%">
	</div>
</div>

<hr>

<div class="row">
	<div class="col-md-8">
		<table>
			<tr>
				<td>Kode Buku</td>
				<td style="padding-left: 5px; padding-right: 5px;">:</td>
				<td>
					{{ $detail->data_buku->kode }}
				</td>
			</tr>
			<td>&nbsp;</td>
			<tr>
				<td>Judul</td>
				<td style="padding-left: 5px; padding-right: 5px;">:</td>
				<td>
					{{ $detail->data_buku->judul }}
				</td>
			</tr>
			<td>&nbsp;</td>
			<tr>
				<td>Penerbit</td>
				<td style="padding-left: 5px; padding-right: 5px;">:</td>
				<td>
					{{ $detail->data_buku->penerbit }}
				</td>
			</tr>
			<td>&nbsp;</td>
			<tr>
				<td>Pengarang</td>
				<td style="padding-left: 5px; padding-right: 5px;">:</td>
				<td>
					{{ $detail->data_buku->pengarang }}
				</td>
			</tr>
			<td>&nbsp;</td>
			<tr>
				<td>Tahun</td>
				<td style="padding-left: 5px; padding-right: 5px;">:</td>
				<td>
					{{ $detail->data_buku->tahun }}
				</td>
			</tr>
		</table>
	</div>
	<div class="col-md-4">
		<img src="{{ url('/public/picture/'.$detail->data_buku->img) }}" width="100%" height="200">
	</div>
</div>

<hr>

<div class="row">
	<div class="col-md-6">
		<table>
			<tr>
				<td>Tanggal Pinjam</td>
				<td style="padding-left: 5px; padding-right: 5px;">:</td>
				<td>
					{{ $detail->tgl_pinjam }}
				</td>
			</tr>
			<td>&nbsp;</td>
			<tr>
				<td>Tanggal Kembali</td>
				<td style="padding-left: 5px; padding-right: 5px;">:</td>
				<td>
					{{ $detail->tgl_kembali }}
				</td>
			</tr>
		</table>
	</div>
	<div class="col-md-6">
		<table>
			<tr>
				<td>Denda</td>
				<td style="padding-left: 5px; padding-right: 5px;">:</td>
				<td>
					Rp. {{ number_format($detail->denda) }}
				</td>
			</tr>
			<td>&nbsp;</td>
			<tr>
				<td>Tanggal Mengembalikan</td>
				<td style="padding-left: 5px; padding-right: 5px;">:</td>
				<td>
					@if($detail->tgl_mengembalikan == "")
					-
					@else
					{{ $detail->tgl_mengembalikan }}
					@endif
				</td>
			</tr>
		</table>
	</div>
</div>