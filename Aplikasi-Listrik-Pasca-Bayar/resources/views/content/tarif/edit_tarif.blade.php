<input type="hidden" name="id" value="{{ $edit->id }}">
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label for="kode_tarif">Kode Tarif</label>
			<input type="text" class="form-control" id="kode_tarif" name="kode_tarif" value="{{ $edit->kode_tarif }}" readonly>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="golongan">Golongan</label>
			<input type="text" class="form-control" id="golongan" name="golongan" value="{{ $edit->golongan }}" autocomplete="off">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label for="daya">Daya</label>
			<input type="text" class="form-control" id="daya" name="daya" value="{{ $edit->daya }}" autocomplete="off">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="tarif_perkwh">Tarif PerKwh</label>
			<input type="text" class="form-control" id="tarif_perkwh" name="tarif_perkwh" value="{{ $edit->tarif_perkwh }}" autocomplete="off">
		</div>
	</div>
</div>