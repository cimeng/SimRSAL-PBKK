<div class="modal fade" id="modal-create-diagnosis" tabindex="-1" role="dialog" aria-labelledby="modal-fromright" aria-hidden="true">
    <div class="modal-dialog modal-dialog-fromright modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block rounded block-transparent mb-0">
                <div class="block-header">
                    <h3 class="block-title">Buat Diagnosis Baru</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form class="js-validation-be-contact" action="{{url('kasus')}}/{{ $nomor_kasus }}/datamedis/diagnosis/create" method="post">
                        {{ csrf_field() }}
                        <div class="col-xl-12">
                            <div class="form-group row">
                                <label class="col-12" for="example-autocomplete1">Diagnosis</label>
                                <div class="col-lg-12">
                                    <input type="text" class="diagnosis-autocomplete form-control" id="nama-diagnosis" name="nama-diagnosis" placeholder="Ketikkan diagnosis...">
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="">
                                <input type="hidden" class="form-control form-control-lg" id="" name="identitas-id" placeholder="" value="{{ $identitas->id }}">
                            </div>
                        </div>
                        <div class="">
                            <div class="">
                                <input type="hidden" class="form-control form-control-lg" id="" name="nomor-kasus" placeholder="" value="{{ $nomor_kasus }}">
                            </div>
                        </div>
                        <div class="">
                            <div class="">
                                <input type="hidden" class="form-control form-control-lg" id="id-diagnosis" name="id-diagnosis" placeholder="" value="99">
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="css-control css-control-primary css-checkbox">
                                <input type="checkbox" name="utama" class="css-control-input">
                                <span class="css-control-indicator"></span> Diagnosis Utama
                            </label>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn-alt btn-hero btn-primary float-right min-width-175">
                                    <i class="fa fa-send mr-5"></i> Buat Diagnosis Baru
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>