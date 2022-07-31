<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rekap Surat Keterangan Tidak Mampu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Tanggal Mulai</label>
                                <input type="date" name="tglm" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Tanggal Selesai</label>
                                @csrf
                                <input type="date" name="tgls" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input type="button" id="cek1" value="Cek" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>Tgl Mulai</th>
                            <th>Tgl Selesai</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>

                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>
