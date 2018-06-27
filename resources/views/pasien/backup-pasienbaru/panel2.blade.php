<div class="text-center">  
    <label class="custom-control custom-radio"  ng-init="show_search_relatives=true">
        <input id="radio1" name="relatives_option" value="1" type="radio" class="custom-control-input" ng-click="show_search_relatives=false">
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description">Kerabat belum terdaftar</span>
    </label>
    <label class="custom-control custom-radio">
        <input id="radio1" name="relatives_option" value="2" type="radio" class="custom-control-input" ng-click="show_search_relatives=true" checked="">
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description">Kerabat telah terdaftar</span>
    </label>

    <hr>

</div>

@include('pasien.pasienbaru.panel2-search')

<div class="row" ng-show="!show_search_relatives">
    <div class="col-md-12">
        <p class="text-center">Daftarkan kerabat</p>
    </div> 
    <div class="col-md-6">
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Nama Lengkap</label>
                    <input class="form-control" type="text" name="relatives_name" placeholder="ex: Aldi Sujana" />
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Jenis Kelamin</label>

                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="relatives_gender" ng-model="gender" value="1" ng-checked="true">
                            <span class="form-check-sign"></span>
                            Laki laki
                        </label>
                    </div>

                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="relatives_gender" id="exampleRadios2" value="2">
                            <span class="form-check-sign"></span>
                            Perempuan
                        </label>
                    </div>

                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Status Pernikahan</label>

                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="relatives_marriage" ng-model="marriage" value="1" ng-checked="true">
                            <span class="form-check-sign"></span>
                            Single
                        </label>
                    </div>

                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="relatives_marriage" id="exampleRadios2" value="2">
                            <span class="form-check-sign"></span>
                            Menikah
                        </label>
                    </div>

                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="relatives_marriage" id="exampleRadios2" value="3">
                            <span class="form-check-sign"></span>
                            Duda/Janda
                        </label>
                    </div>

                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Tempat Lahir</label>
                    <input class="form-control" type="text" name="relatives_birthplace" placeholder="ex : Surabaya" />
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Tanggal Lahir</label>
                    <input type="text" class="form-control datepicker" name="relatives_birthdate" placeholder="ex : 02/14/2018">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Alamat</label>
                    <input class="form-control" type="text" name="relatives_address" placeholder="ex: Jalan Merpati no.11" />
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Kabupaten/Kota</label>
                    <select name="relatives_city" onchange="onClickCity('selectKotaRelatives','selectKecamatanRelatives')" class="form-control selectpicker" id="selectKotaRelatives" data-live-search="true">
                    </select>
                </div>
            </div>

        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Kecamatan</label>
                    <select name="relatives_district" class="form-control selectpicker" id="selectKecamatanRelatives" data-live-search="true">
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">No Telp</label>
                    <input class="form-control" type="text" name="relatives_phone" placeholder="HP/Nomor Rumah" />
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">No KTP</label>
                    <input class="form-control" type="text" name="relatives_ktp" placeholder="Nomor KTP" />
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Pekerjaan</label>
                    <input class="form-control" type="text" name="relatives_occupation" placeholder="ex: Aldi Sujana" />
                </div>
            </div>
        </div>
        <div class="row justify-content-center" >
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Hubungan Keluarga</label>
                    <select name="relatives_relationship" class="form-control selectpicker" data-size="5">
                        <option value="1">Pasangan</option>
                        <option value="2">Orang Tua</option>
                        <option value="3">Anak</option>
                        <option value="4">Saudara</option>
                        <option value="5">Kerabat</option>
                    </select>

                </div>
            </div>
        </div>
    </div>
</div>

