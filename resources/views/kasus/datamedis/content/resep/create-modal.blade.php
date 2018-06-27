<div class="modal fade" id="modal-create-resep" tabindex="-1" role="dialog" aria-labelledby="modal-fromright" aria-hidden="true">
    <div class="modal-dialog modal-dialog-fromright modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header">
                    <h3 class="block-title">Tambah Resep</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form action="{{url('kasus')}}/{{ $nomor_kasus }}/datamedis/resep/create" method="post">
                        {{ csrf_field() }}
                        <div class="row" style="display: none">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Pilih Apotek Tujuan</label>
                                    <select class="form-control" id="nama-apotek" name="nama-apotek">
                                        @foreach ( $pharmacies as $pharmacy )
                                        <option value="{{ $pharmacy->id }}">{{ $pharmacy->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                 <label class="col-12">Kategori</label>
                                 <div class="col-12">
                                     <div class="custom-control custom-radio custom-control-inline mb-5">
                                         <input class="custom-control-input" type="radio" name="kategori" id="example-inline-radio1" value="generik" checked>
                                         <label class="custom-control-label" for="example-inline-radio1">Obat Generik/Paten</label>
                                     </div>
                                     <div class="custom-control custom-radio custom-control-inline mb-5">
                                         <input class="custom-control-input" type="radio" name="kategori" id="example-inline-radio2" value="racikan">
                                         <label class="custom-control-label" for="example-inline-radio2">Racikan</label>
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

                            <div class="form-group row" id="resep-obat" style="">
                                <label class="col-12" for="">Obat</label>
                                <div class="col-12">
                                    <input type="text" class="resep-autocomplete form-control form-control-lg" id="" name="nama-obat" placeholder="" value="">
                                </div>
                            </div>
                            <div class="form-group row" id="resep-racikan" style="display:none;">
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
                                <button type="button" class="btn btn-success mr-5 mb-5" id="button-tambah-obat">
                                    <i class="fa fa-plus mr-5"></i>Tambah Obat
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group row" id="daftar-obat">
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