<div class="modal fade" id="resepModalEdit" tabindex="-1" role="dialog" aria-labelledby="modal-fromright" aria-hidden="true">
    <div class="modal-dialog modal-dialog-fromright modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header">
                    <h3 class="block-title">Ubah Resep</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form action="{{url('kasus')}}/{{ $nomor_kasus }}/datamedis/resep/edit" method="post">
                        <input type="hidden" id="resepEditId" name="id">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="col-12">Kategori</label>
                                    <div class="col-12">
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="kategori" id="edit-kategori-1" value="generik" checked>
                                            <label class="custom-control-label" for="edit-kategori-1">Obat Generik/Paten</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="kategori" id="edit-kategori-2" value="racikan">
                                            <label class="custom-control-label" for="edit-kategori-2">Racikan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12" for="example-select">Tipe</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="tipe-obat" name="tipe-obat">
                                            <option value="caps">caps</option>
                                            <option value="tab">tab</option>
                                            <option value="inj">inj</option>
                                            <option value="syr">syr</option>
                                            <option value="pil">pil</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row" id="editObat" style="">
                                    <label class="col-12" for="">Obat</label>
                                    <div class="col-12">
                                        <input type="text" class="resep-autocomplete form-control form-control-lg" id="" name="nama-obat" placeholder="" value="">
                                    </div>
                                </div>
                                <div class="form-group row" id="editRacikanObat" style="display:none;">
                                    <label class="col-12" for="">Racikan</label>
                                    <div class="col-12">
                                        <textarea class="form-control form-control-lg" id="racikanObat" name="racikan-obat" rows="3" placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12" for="">Jumlah Obat</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control form-control-lg" id="" name="jumlah" placeholder="" value="">
                                    </div>
                                </div>
                                <div class="form-group row" id="">
                                    <label class="col-12" for="">Aturan Penggunaan</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control form-control-lg" id="" name="aturan" placeholder="" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <button type="button" class="btn btn-success mr-5 mb-5" id="editResep-ButtonTambahObat">
                                            <i class="fa fa-plus mr-5"></i>Tambah Obat
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row" id="editModalDaftarObat">
                                    <label class="col-12">Daftar Obat Pada Resep</label>
                                    <div class="col-12"><hr></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-hero btn-alt-primary min-width-175">
                                    <i class="fa fa-send mr-5"></i> Buat Resep Baru
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>