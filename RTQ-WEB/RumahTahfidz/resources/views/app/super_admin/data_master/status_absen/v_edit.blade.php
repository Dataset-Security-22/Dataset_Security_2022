<input type="hidden" name="id" id="id" value="{{ encrypt($edit->id) }}">
<div class="form-group">
    <label for="keterangan_absen"> Keterangan </label>
    <input type="text" class="form-control" name="keterangan_absen" id="keterangan_absen"
        placeholder="Masukkan Keterangan"
        value="{{ $edit->keterangan_absen ? $edit->keterangan_absen : old('keterangan_absen') }}">
</div>
