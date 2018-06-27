<div class="modal fade" id="modal-update-identitas" tabindex="-1" role="dialog" aria-labelledby="modal-fromright" aria-hidden="true">
    <div class="modal-dialog modal-dialog-fromright modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block rounded block-transparent mb-0">
                <div class="block-header">
                    <h3 class="block-title">Edit Identitas</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content py-0">
                    <form class="js-validation-be-contact" action="{{url('kasus')}}/{{ $nomor_kasus }}/datamedis/identitas/update" method="post">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <div class="col-12">
                                <input type="hidden" class="form-control form-control-lg" id="" name="identitas-id" placeholder="" value="{{ $identitas->id }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="be-contact-name">Nama Pasien</label>
                                <input type="text" class="form-control form-control-lg" id="be-contact-name" name="nama" placeholder="Enter your name.." value="{{ $identitas->nama }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="example-select">Jenis Kelamin</label>
                            <div class="col-md-12">
                                <select class="form-control" id="example-select" name="jenis-kelamin" disabled>
                                    <option value="L" {{ $identitas->jenis_kelamin == 'L' ? 'selected' : ''}}>Laki-Laki</option>
                                    <option value="P" {{ $identitas->jenis_kelamin == 'P' ? 'selected' : ''}}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="example-select">Status Pernikahan</label>
                            <div class="col-md-12">
                                <select class="form-control" id="example-select" name="status">
                                    <option value="1" {{ $identitas->status == 1 ? 'selected' : ''}}>Menikah</option>
                                    <option value="0" {{ $identitas->status == 0 ? 'selected' : ''}}>Tidak Menikah</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="be-contact-name" >Tempat Lahir</label>
                                <input type="text" class="form-control form-control-lg" id="be-contact-name" name="tempat-lahir" placeholder="Enter your name.." value="{{ $identitas->tempat_lahir }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="example-datepicker1">Tanggal Lahir</label>
                            <div class="col-lg-12">
                                <input type="text" class="js-datepicker form-control" id="example-datepicker1" name="tanggal-lahir" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="" value=" {{$identitas->tanggal_lahir}} " disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="be-contact-name">Alamat</label>
                                <input type="text" class="form-control form-control-lg" id="be-contact-name" name="alamat" placeholder="Enter your name.." value="{{ $identitas->alamat }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="be-contact-name">No HP</label>
                                <input type="text" class="form-control form-control-lg" id="be-contact-name" name="hp" placeholder="Enter your name.." value="{{ $identitas->no_hp }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="be-contact-name">No KTP</label>
                                <input type="text" class="form-control form-control-lg" id="be-contact-name" name="ktp" placeholder="Enter your name.." value="{{ $identitas->no_identitas }}">
                            </div>
                        </div>
                        <div class="">
                            <div class="">
                                <input type="hidden" class="form-control form-control-lg" id="id-asuransi" name="id-asuransi" placeholder="" value="99">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="be-contact-name">Asuransi</label>
                                <select class="form-control" id="identitas-edit-asuransi" name="asuransi">
                                    <option value="0">Tidak menggunakan asuransi</option>
                                    @foreach ($insurances as $insurance)
                                    <option value="{{$insurance->id}}" 
                                        @if(!empty($identitas->insurance->name))
                                        @if($identitas->insurance->name == $insurance->name) selected @endif}
                                        @endif>
                                        {{$insurance->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row" id="container-identitas-edit-noasuransi">
                            <div class="col-12" >
                                <label for="be-contact-name">No Asuransi</label>
                                <input type="text" class="form-control form-control-lg" id="identitas-edit-noasuransi" name="no-asuransi" placeholder="Enter your name.." value="{{ $identitas->no_asuransi }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="be-contact-name">Pekerjaan</label>
                                <input type="text" class="form-control form-control-lg" id="be-contact-name" name="pekerjaan" placeholder="Enter your name.." value="{{ $identitas->pekerjaan }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn-alt btn-hero btn-primary min-width-175 pull-right">
                                    <i class="fa fa-send mr-5"></i> Update Identitas
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>