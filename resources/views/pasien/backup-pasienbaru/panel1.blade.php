 <p class="text-center">Isi data diri pasien berikut</p>

 <div class="row">
     <div class="col-md-6">
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Nama Lengkap</label>
                    <input class="form-control" type="text" name="name" placeholder="ex: Aldi Sujana" />
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Jenis Kelamin</label>

                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="gender" ng-model="gender" value="1" ng-checked="true">
                            <span class="form-check-sign"></span>
                            Laki laki
                        </label>
                    </div>

                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="2">
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
                            <input class="form-check-input" type="radio" name="marriage" ng-model="marriage" value="1" ng-checked="true">
                            <span class="form-check-sign"></span>
                            Single
                        </label>
                    </div>

                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="marriage" id="exampleRadios2" value="2">
                            <span class="form-check-sign"></span>
                            Menikah
                        </label>
                    </div>

                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="marriage" id="exampleRadios2" value="3">
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
                    <input class="form-control" type="text" name="birthplace" placeholder="ex : Surabaya" />
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Tanggal Lahir</label>
                    <input type="text" class="form-control datepicker" name="birthdate" placeholder="ex : 02/14/2018">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Alamat</label>
                    <input class="form-control" type="text" name="address" placeholder="ex: Jalan Merpati no.11" />
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Kabupaten/Kota</label>
                    <select name="city" onchange="onClickCity('selectKota','selectKecamatan')" class="form-control selectpicker" id="selectKota" data-live-search="true">
                    </select>
                </div>
            </div>

        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Kecamatan</label>
                    <select name="district" class="form-control selectpicker" id="selectKecamatan" data-live-search="true">
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
                    <input class="form-control" type="text" name="phone" placeholder="HP/Nomor Rumah" />
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">No KTP</label>
                    <input class="form-control" type="text" name="ktp" placeholder="Nomor KTP" />
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Jenis Pasien</label>

                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="type" ng-model="type" ng-change="onClickPatientType()" value="1" ng-checked="true">
                            <span class="form-check-sign"></span>
                            Umum
                        </label>
                    </div>

                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="type" ng-model="type" ng-change="onClickPatientType()" value="2">
                            <span class="form-check-sign"></span>
                            Anggota TNI
                        </label>
                    </div>

                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="type" ng-model="type" ng-change="onClickPatientType()" value="3">
                            <span class="form-check-sign"></span>
                            Kerjasama
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center" ng-show="show_asuransi">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Asuransi</label>
                    <select name="asuransi" class="form-control selectpicker" data-size="5" data-live-search="true" id="selectAsuransi">
                        @foreach($asuransi as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    
                </div>
            </div>
        </div>

        <div class="row justify-content-center" ng-show="show_asuransi">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">No Asuransi</label>
                    <input class="form-control" type="text" id="asuransiNomor" name="asuransi_nomor" placeholder="Nomor Asuransi" />
                </div>
            </div>
        </div>

        <div class="row justify-content-center" ng-show="show_kerjasama">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Perusahaan Kerjasama</label>
                    <select name="perusahaan_kerjasama" class="form-control selectpicker" data-size="5" data-live-search="true">
                        @foreach($perusahaan_kerjasama as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    
                </div>
            </div>
        </div>

        <div class="row justify-content-center" ng-show="show_kerjasama">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">No Identitas Pegawai</label>
                    <input class="form-control" type="text" id="identitasPegawai" name="identitas_pegawai" placeholder="Nomor Identitas Pegawai" />
                </div>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Kelas Perawatan</label>
                    <select name="class" class="form-control selectpicker" data-size="2">
                        <option value="1">Kelas 1</option>
                        <option value="2">Kelas 2</option>
                        <option value="3">Kelas 3</option>
                        <option value="vip">Kelas VIP</option>
                        <option value="vvip">Kelas VVIP</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Pekerjaan</label>
                    <input class="form-control" type="text" name="occupation" placeholder="ex: Aldi Sujana" />
                </div>
            </div>
        </div>



    </div>
</div>

