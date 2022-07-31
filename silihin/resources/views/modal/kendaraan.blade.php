<div id="kendaraan-modal" class="modal fade login-component" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-body">
                <div class="login-block">
                    <button type="button" class="close modal-close" data-dismiss="modal">&times;</button>
                    <div class="login-block-header text-center">Tambah Kendaraan</div>
                    <form action="/kendaraan" name="kendaraan_form" id="kendaraan_form" class="form-horizontal" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="nama" value="" id="nama" class="form-control form-control-lg" placeholder="Nama Kendaraan"  />
                        </div>
                        <div class="form-group">
                            <input type="number" name="harga" value="" id="harga" class="form-control form-control-lg" placeholder="Harga"  />
                        </div>
                        <div class="form-group">
                            <input type="number" name="jumlah" value="" id="jumlah" class="form-control form-control-lg" placeholder="Jumlah Kendaraan"  />
                        </div>
                        <div class="form-group">
                            <textarea name="keterangan" value="" id="keterangan" class="form-control form-control-lg" placeholder="Keterangan" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="file" name="gambar" id="gambar" class="form-control form-control-lg" placeholder="Upload Gambar">
                        </div>

                        <div class="form-group">
                            <button type="submit" name="kendaraan" class="btn btn-primary btn-block "><b>Tambah</b></button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>

<div id="edit-kendaraan-modal" class="modal fade login-component" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-body">
                <div class="login-block">
                    <button type="button" class="close modal-close" data-dismiss="modal">&times;</button>
                    <div class="login-block-header text-center">Edit Kendaraan</div>
                    <form action="" name="edit_kendaraan_form" id="edit_kendaraan_form" class="form-horizontal" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <input type="text" name="edit_nama" value="" id="edit_nama" class="form-control form-control-lg" placeholder="Nama Kendaraan"  />
                            <input type="hidden" name="gambar_sebelumnya" value="" id="gambar_sebelumnya" class="form-control form-control-lg" />
                        </div>
                        <div class="form-group">
                            <input type="number" name="edit_harga" value="" id="edit_harga" class="form-control form-control-lg" placeholder="Harga"  />
                        </div>
                        <div class="form-group">
                            <input type="number" name="edit_jumlah" value="" id="edit_jumlah" class="form-control form-control-lg" placeholder="Jumlah Kendaraan"  />
                        </div>
                        <div class="form-group">
                            <textarea name="edit_keterangan" value="" id="edit_keterangan" class="form-control form-control-lg" placeholder="Keterangan" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <img id="img" src="" height="250">
                        </div>

                        <div class="form-group">
                            <input type="file" name="edit_gambar" id="edit_gambar" class="form-control form-control-lg" placeholder="Upload Gambar">
                        </div>

                        <div class="form-group">
                            <button type="submit" name="kendaraan" class="btn btn-primary btn-block "><b>Simpan</b></button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>