<div class="modal fade" id="modal-update-identitas-medis" tabindex="-1" role="dialog" aria-labelledby="modal-fromright" aria-hidden="true">
    <div class="modal-dialog modal-dialog-fromright modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block rounded block-transparent mb-0">
                <div class="block-header">
                    <h3 class="block-title">Edit Identitas Medis</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content py-0">
                    <form class="js-validation-be-contact" action="{{url('kasus')}}/{{ $nomor_kasus }}/datamedis/identitas/medis/update" method="post">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <div class="col-12">
                                <input type="hidden" class="form-control form-control-lg" id="" name="identitas-id" placeholder="" value="{{ $identitas->id }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="be-contact-name">Tinggi Badan</label>
                                <input type="text" class="form-control form-control-lg" id="be-contact-name" name="tinggi-badan" placeholder="Enter your name.." value="{{ $identitas->tinggi_badan }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="be-contact-name">Berat Badan</label>
                                <input type="text" class="form-control form-control-lg" id="be-contact-name" name="berat-badan" placeholder="Enter your name.." value="{{ $identitas->berat_badan }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="example-tags1">Alergi</label>
                            <div class="col-lg-12">
                                <input type="text" class="js-tags-input form-control" data-height="34px"  name="alergi" value="{{$identitas->alergi}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn-alt btn-hero btn-primary min-width-175 pull-right">
                                    <i class="fa fa-send mr-5"></i> Update Identitas Medis
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>