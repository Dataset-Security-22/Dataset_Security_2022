@extends('Layout.v_template')
@section('title','Konfirmasi Denda')
@section('content')

<div class="row">
    <div class="col-xs-4">
        <form action="{{ url('/transaksi/bayar_denda/simpan') }}" method="POST">
            @csrf
            <input type="hidden" name="id_transaksi" value="{{ $detail->id_transaksi }}">
            <div class="form-group">
                <label for="denda"> Denda </label>
                <?php
					$date = date("Y-m-d");
					$awal = strtotime($detail->tanggal_kembali);
					$kembali = strtotime($date);
					$diff = $kembali - $awal;
					$hari = floor($diff / 864 / 100);
					$denda = 5000 * $hari;
				?>
                <input type="text" class="form-control" name="denda" value="<?php echo $denda; ?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Bayar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
