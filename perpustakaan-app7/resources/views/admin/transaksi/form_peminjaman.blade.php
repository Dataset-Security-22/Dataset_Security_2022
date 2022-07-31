@extends('Layout.v_template')

@section('title','Transaksi')

@section('content')

<div class="row">
  <div class="col-md-12">
    <form method="POST" action="{{ url('/transaksi/simpan_peminjaman') }}">
      {{ csrf_field() }}
      <div class="box">
        <div class="box-header">
          Form Peminjaman
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label> Kode Peminjaman </label>
                <input type="text" class="form-control" name="kode_transaksi" placeholder="Masukkan Kode Peminjaman" value="{{ $kode }}" readonly>
                <div class="text-danger">
                    @error('kode_transaksi')
                    {{ $message }}
                    @enderror
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label> Nama Buku </label>
                <select class="form-control select2" name="kode_buku">
                  <option value="">- Pilih -</option>
                  @foreach($data_buku as $buku)
                  <?php
                    $transaksi = DB::table("transaksi")
                            ->where('tanggal_mengembalikan',null)
                            ->where("kode_buku", $buku->kode_buku)
                            ->count();

                    $stok_terbaru = $buku->stok - $transaksi;
                    ?>

                @if ($stok_terbaru > 0)
                <option value="{{ $buku->kode_buku }}">
                    {{ $buku->judul }}  ({{ $buku->kode_buku}})
                  </option>
                @endif

                  @endforeach
                </select>
                <div class="text-danger">
                    @error('kode_buku')
                    {{ $message }}
                    @enderror
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label> Nama Anggota </label>
                <select class="form-control select2" name="id_anggota" width="100%">
                  <option value="">- Pilih -</option>
                  @foreach($data_anggota as $anggota)
                    <option value="{{ $anggota->id_anggota }}">
                      {{ $anggota->nama_anggota }} ({{ $anggota->nis}})
                    </option>
                  @endforeach
                </select>
                <div class="text-danger">
                    @error('id_anggota')
                    {{ $message }}
                    @enderror
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label> Tanggal Pinjam </label>
                <input type="date" class="form-control" name="tanggal_pinjam">
                <div class="text-danger">
                    @error('tanggal_pinjam')
                    {{ $message }}
                    @enderror
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label> Tanggal Kembali </label>
                <input type="date" class="form-control" name="tanggal_kembali">
                <div class="text-danger">
                    @error('tanggal_kembali')
                    {{ $message }}
                    @enderror
                </div>
              </div>
            </div>
            {{-- <div class="col-md-4">
              <div class="form-group">
                <label> Tanggal pengembalian </label>
                <input type="date" class="form-control" name="tanggal_pengembalian">
              </div>
            </div> --}}
            <div class="col-md-4">
              <div class="form-group">
                <label> ID petugas </label>
                <input type="text" class="form-control" name="id_petugas" value="{{ auth()->user()->id }}" readonly>
                <div class="text-danger">
                    @error('id_petugas')
                    {{ $message }}
                    @enderror
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-plus"></i> Pinjam
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection
