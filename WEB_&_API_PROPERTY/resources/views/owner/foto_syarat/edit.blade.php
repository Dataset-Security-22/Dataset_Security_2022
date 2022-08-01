<input type="hidden" name="id" value="{{ $edit->id }}">
<input type="hidden" name="oldGambar" value="{{ $edit->image }}">
<div class="form-group">x
    <label for="foto">Foto</label>
    @if ($edit->image)
        <img class="img-preview img-fluid mb-3 col-sm-5 d-block" src="{{ url('storage/image/' . $edit->image) }}">
    @else
        <img class="img-preview img-fluid mb-3 col-sm-5">
    @endif
    <input type="file" name="image" class="form-control" id="image" placeholder="Masukan Foto/Gambar"
        onchange="viewImage()">
</div>
