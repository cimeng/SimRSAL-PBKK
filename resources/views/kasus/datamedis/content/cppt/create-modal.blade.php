<div class="modal fade" id="modal-create-cppt" tabindex="-1" role="dialog" aria-labelledby="modal-fromright" aria-hidden="true">
    <div class="modal-dialog modal-dialog-fromright modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block rounded block-transparent mb-0">
                <div class="block-header">
                    <h3 class="block-title">Buat CPPT Baru</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form class="js-validation-be-contact" action="{{url('kasus')}}/{{ $nomor_kasus }}/datamedis/cppt/create" method="post">
                        {{ csrf_field() }}
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
                        <div class="form-group row">
                            <label class="col-12" for="">Subjective</label>
                            <div class="col-12">
                                <textarea class="form-control form-control-lg" id="" name="subjective" rows="3" placeholder=""></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="">Objective</label>
                            <div class="col-12">
                                <textarea class="form-control form-control-lg" id="" name="objective" rows="3" placeholder=""></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="">Assessment</label>
                            <div class="col-12">
                                <textarea class="form-control form-control-lg" id="" name="assessment" rows="3" placeholder=""></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="">Plan</label>
                            <div class="col-12">
                                <textarea class="form-control form-control-lg" id="" name="plan" rows="3" placeholder=""></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="">Instruksi PPA</label>
                            <div class="col-12">
                                <textarea class="form-control form-control-lg" id="" name="instruksi-ppa" rows="3" placeholder=""></textarea>
                            </div>
                            <div class="col-12">
                                <label class="css-control css-control-primary css-checkbox">
                                    <input type="checkbox" name="todo" class="css-control-input" checked>
                                    <span class="css-control-indicator"></span> Tambahkan pada To Do
                                </label>
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn-alt btn-hero btn-primary min-width-175 float-right">
                                    <i class="fa fa-send mr-5"></i> Buat CPPT Baru
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>