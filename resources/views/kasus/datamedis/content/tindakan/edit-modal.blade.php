<div class="modal fade" id="modal-edit-tindakan" tabindex="-1" role="dialog" aria-labelledby="modal-fromright" aria-hidden="true">
    <div class="modal-dialog modal-dialog-fromright modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block rounded block-transparent mb-0">
                <div class="block-header">
                    <h3 class="block-title">Edit Tindakan</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="block-content">
                            <form class="js-validation-be-contact" action="{{url('kasus')}}/{{ $nomor_kasus }}/datamedis/tindakan/edit" method="post">
                                {{ csrf_field() }}

                                <input type="hidden" name="daftar_harga_id" id="tindakan-input-edit-daftar-id">

                                <div class="form-group row">
                                    <label class="col-12" for="">Tindakan</label>
                                    <div class="col-12">
                                        <input type="text" class="tindakan-autocomplete form-control form-control-lg" id="input-desc" name="desc" placeholder="Deskripsi Tindakan" value="" onchange="emptyDaftarHargaID()">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12" for="">Biaya</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control form-control-lg" id="input-price" name="price" placeholder="Biaya tindakan dalam rupiah" value="">
                                    </div>
                                    <small>*Mengubah data tindakan akan mengubah tindakan yang ada pada tagihan</small>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input type="hidden" class="form-control form-control-lg" id="input-id" name="id" placeholder="Biaya tindakan dalam rupiah" value="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn-alt btn-hero btn-primary min-width-175 float-right">
                                            <i class="fa fa-send mr-5"></i> Buat Tindakan Baru
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>