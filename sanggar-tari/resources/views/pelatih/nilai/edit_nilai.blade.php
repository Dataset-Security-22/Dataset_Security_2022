<div class="form-group">
    <label for=""> Jenis Tari </label>
    <input readonly type="text" class="form-control" name="id_murid" value="{{ $edit->id_murid }}">
</div>
<div class="form-group">
    <label for=""> Jenis Tari </label>
    <input readonly type="text" class="form-control" name="jenis_tari" value="{{ $edit->jenis_tari }}">
</div>
<input type="hidden" name="id" value="{{ $edit->id }}">
<div class="form-group">
    <label for=""> Nilai </label>
    <input type="text" class="form-control" name="nilai" value="{{ $edit->nilai }}">
</div>