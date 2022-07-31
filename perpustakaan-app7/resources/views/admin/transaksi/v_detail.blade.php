@extends('Layout.v_template')

@section('title','Detail')

@section('content')

<div class="row">
  <div class="col-md-12">
    <form method="POST" action="{{ url('/transaksi/update/') }}">
      {{ csrf_field() }}
      <input type="hidden" name="id_transaksi" value="{{ $transaksi->id_transaksi }}">
      <div class="box">
        <div class="box-header">
          Form Peminjaman
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label> Kode Transaksi </label>
                <input type="text" class="form-control" name="kode_transaksi" placeholder="Masukkan Kode Peminjaman" value="{{ $transaksi->kode_transaksi }}" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label> Nama Buku </label>
                <select class="form-control" name="" disabled>
                  <option value="">- Pilih -</option>
                  @foreach($data_buku as $buku)
                    @if($buku->kode_buku == $transaksi->kode_buku))
                    <option value="{{ $buku->kode_buku }}" selected>
                        {{ $buku->judul }}
                    </option>
                    @else
                    <option value="{{ $buku->kode_buku }}">
                        {{ $buku->judul }}
                    </option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label> Nama Anggota </label>
                <select class="form-control" name="" disabled>
                  <option value="">- Pilih -</option>
                  @foreach($data_anggota as $anggota)
                  @if($anggota->id_anggota == $transaksi->id_anggota))
                    <option value="{{ $anggota->id_anggota }}" selected>
                      {{ $anggota->nama_anggota }}
                    </option>
                     @else
                     <option value="{{ $anggota->id_anggota }}">
                        {{ $anggota->nama_anggota }}
                      </option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label> Tanggal Pinjam </label>
                <input type="date" class="form-control" name="tanggal_pinjam" value="{{ $transaksi->tanggal_pinjam }}" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label> Tanggal Kembali </label>
                <input type="date" class="form-control" name="tanggal_kembali" value="{{ $transaksi->tanggal_kembali }}"readonly>
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
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label> Tanggal Mengembalikan </label>
                    <input type="date" class="form-control" name="tanggal_mengembalikan" value="{{ $transaksi->tanggal_mengembalikan }}">
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
