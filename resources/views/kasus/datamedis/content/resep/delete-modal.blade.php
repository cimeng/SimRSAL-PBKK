<div class="modal fade" id="resepModalDelete" tabindex="-1" role="dialog" aria-labelledby="modal-fromright" aria-hidden="true">
    <div class="modal-dialog modal-dialog-fromright modal-dialog" role="document">
        <div class="modal-content">
            <div class="block rounded block-transparent mb-0">
                <div class="block-header">
                    <h3 class="block-title">Resep <span id="title-number"></span></h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form class="js-validation-be-contact" action="{{url('kasus')}}/{{ $nomor_kasus }}/datamedis/resep/delete" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" id="resepDeleteId" name="id">

                        <h5 class="font-w400">
                            Apakah anda yakin akan menghapus data Resep ini?
                        </h5>

                        <div class="form-group row">
                            <div class="col-12">
                                <button type="button" data-dismiss="modal" class="btn-alt btn-hero btn-regular min-width-100 float-right">Batal
                                </button>
                                <button type="submit" class="btn-alt btn-hero btn-primary min-width-100 float-right">
                                    <i class="fa fa-send mr-5"></i> Hapus Resep
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>