<input type="hidden" name="id_absen" value="{{ $edit->id_absen }}">
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="id_murid"> Nama Murid </label>
      <select class="form-control select3" id="id_murid" name="id_murid" style="width: 100%;">
        <option value="">- Pilih -</option>
        @foreach($data_murid as $murid)
          @if($edit->id_murid == $murid->id)
          <option value="{{ $murid->id }}" selected>
            {{ $murid->nama_murid }}
          </option>
          @else
          <option value="{{ $murid->id }}">
            {{ $murid->nama_murid }}
          </option>
          @endif
        @endforeach
      </select>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label for="status"> Status </label>
      <select class="form-control" id="status" name="status">
        <option value="">- Pilih -</option>
        @if($edit->status == 1)
        <option value="1" selected>Hadir</option>
        <option value="2">Sakit</option>
        <option value="3">Izin</option>
        <option value="4">Alfa</option>
        @elseif($edit->status == 2)
        <option value="1">Hadir</option>
        <option value="2" selected>Sakit</option>
        <option value="3">Izin</option>
        <option value="4">Alfa</option>
        @elseif($edit->status == 3)
        <option value="1">Hadir</option>
        <option value="2">Sakit</option>
        <option value="3" selected>Izin</option>
        <option value="4">Alfa</option>
        @elseif($edit->status == 4)
        <option value="1">Hadir</option>
        <option value="2">Sakit</option>
        <option value="3">Izin</option>
        <option value="4" selected>Alfa</option>
        @else
        <option value="1">Hadir</option>
        <option value="2">Sakit</option>
        <option value="3">Izin</option>
        <option value="4">Alfa</option>
        @endif
      </select>
    </div>
  </div>
</div>
<div class="form-group">
  <label for="tanggal"> Tanggal </label>
  <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $edit->tanggal }}">
</div>
<div class="form-group">
  <label for="keterangan"> Keterangan </label>
  <textarea class="form-control" id="keterangan" name="keterangan" rows="5" placeholder="Masukkan Keterangan">{{ $edit->keterangan }}</textarea>
</div>
