@extends("content.layouts.app")

@section("page_header") <i class="fa fa-search"></i> Detail Penggunaan @stop

@section("page_breadcrumb")

<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="#"><i class="fa fa-money"></i> Penggunaan</a></li>
	<li class="active">Detail Penggunaan</li>
</ol>

@endsection

@section("page_content")

<div class="row">
	<div class="col-md-6">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-user"></i> Data Pelanggan </h3>
			</div>
			<div class="box-body">
				<table>
					<tr>
						<td>ID Pelanggan</td>
						<td style="padding-left: 5px;">:</td>
						<td style="padding-left: 5px;">
							{{ $detail->lpb_pelanggan->id_pelanggan }}
						</td>
					</tr>
					<tr>
						<td>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td>No. Meter</td>
						<td style="padding-left: 5px;">:</td>
						<td style="padding-left: 5px;">
							{{ $detail->lpb_pelanggan->no_meter }}
						</td>
					</tr>
					<tr>
						<td>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td>Nama Pelanggan</td>
						<td style="padding-left: 5px;">:</td>
						<td style="padding-left: 5px;">
							{{ $detail->lpb_pelanggan->nama }}
						</td>
					</tr>
					<tr>
						<td>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td style="padding-left: 5px;">:</td>
						<td style="padding-left: 5px;">
							{{ $detail->lpb_pelanggan->alamat }}
						</td>
					</tr>
					<tr>
						<td>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td>Kode Tarif</td>
						<td style="padding-left: 5px;">:</td>
						<td style="padding-left: 5px;">
							{{ $detail->lpb_pelanggan->lpb_tarif->kode_tarif }}
						</td>
					</tr>
					<tr>
						<td>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td>Golongan</td>
						<td style="padding-left: 5px;">:</td>
						<td style="padding-left: 5px;">
							{{ $detail->lpb_pelanggan->lpb_tarif->golongan }}
						</td>
					</tr>
					<tr>
						<td>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td>Daya / Tarif</td>
						<td style="padding-left: 5px;">:</td>
						<td style="padding-left: 5px;">
							{{ $detail->lpb_pelanggan->lpb_tarif->daya }} / Rp. {{ number_format($detail->lpb_pelanggan->lpb_tarif->tarif_perkwh) }}
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-money"></i> Data Penggunaan</h3>
			</div>
			<div class="box-body">
				<table>
					<tr>
						<td>ID Penggunaan</td>
						<td style="padding-left: 5px;">:</td>
						<td style="padding-left: 5px;">
							{{ $detail->id_penggunaan }}
						</td>
					</tr>
					<tr>
						<td>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td>Bulan</td>
						<td style="padding-left: 5px;">:</td>
						<td style="padding-left: 5px;">
							{{ $detail->bulan }}
						</td>
					</tr>
					<tr>
						<td>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td>Tahun</td>
						<td style="padding-left: 5px;">:</td>
						<td style="padding-left: 5px;">
							{{ $detail->tahun }}
						</td>
					</tr>
					<tr>
						<td>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td>Meter Awal</td>
						<td style="padding-left: 5px;">:</td>
						<td style="padding-left: 5px;">
							{{ $detail->meter_awal }}
						</td>
					</tr>
					<tr>
						<td>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td>Meter Akhir</td>
						<td style="padding-left: 5px;">:</td>
						<td style="padding-left: 5px;">
							{{ $detail->meter_akhir }}
						</td>
					</tr>
					<tr>
						<td>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td>Tanggal Cek</td>
						<td style="padding-left: 5px;">:</td>
						<td style="padding-left: 5px;">
							{{ $detail->tgl_cek }}
						</td>
					</tr>
					<tr>
						<td>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td>Nama Petugas</td>
						<td style="padding-left: 5px;">:</td>
						<td style="padding-left: 5px;">
							{{ $detail->lpb_user->nama }}
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>

<a href="{{ url('/penggunaan') }}" class="btn btn-danger btn-sm">
	<i class="fa fa-refresh"></i> Kembali
</a>

@endsection