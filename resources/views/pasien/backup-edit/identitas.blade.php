 <p class="text-center">Isi data diri pasien berikut</p>

 <div class="row">
     <div class="col-md-6">
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Nama Lengkap</label>
                    <input class="form-control" type="text" name="name" value="{{$pasien->name}}" placeholder="ex: Aldi Sujana" />
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Jenis Kelamin</label>

                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="gender" ng-model="gender" value="1" @if($pasien->gender==1) ng-checked="true" @endif>
                            <span class="form-check-sign"></span>
                            Laki laki
                        </label>
                    </div>

                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="gender" ng-model="gender" value="2" @if($pasien->gender==2) ng-checked="true" @endif>
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
                            <input class="form-check-input" type="radio" name="marriage" ng-model="marriage" value="1" @if($pasien->marriage==1) ng-checked="true" @endif>
                            <span class="form-check-sign"></span>
                            Single
                        </label>
                    </div>

                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="marriage" id="exampleRadios2" value="2" @if($pasien->marriage==2) ng-checked="true" @endif>
                            <span class="form-check-sign"></span>
                            Menikah
                        </label>
                    </div>

                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="marriage" id="exampleRadios2" value="3" @if($pasien->marriage==3) ng-checked="true" @endif>
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
                    <input class="form-control" type="text" name="birthplace" value="{{$pasien->place_of_birth}}" placeholder="ex : Surabaya" />
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Tanggal Lahir</label>
                    <input type="text" class="form-control datepicker" value="{{date('d/m/Y', strtotime($pasien->date_of_birth))}}" name="birthdate" placeholder="ex : 02/14/2018">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Alamat</label>
                    <input class="form-control" type="text" name="address" placeholder="ex: Jalan Merpati no.11" value="{{$pasien->place_of_birth}}"/>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Kabupaten/Kota</label>
                    <select name="city" onchange="onClickCity('selectKota','selectKecamatan')" class="form-control selectpicker" id="selectKota" data-live-search="true">
                        @foreach($kota as $item)
                            <option value="{{$item->id}}" @if($pasien->city == $item->id) selected @endif>{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Kecamatan</label>
                    <select name="district" class="form-control selectpicker" id="selectKecamatan" data-live-search="true">
                        @foreach($kecamatan as $item)
                            <option value="{{$item->id}}" @if($pasien->district == $item->id) selected @endif>{{$item->name}}</option>
                        @endforeach

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
                    <input class="form-control" type="text" name="phone" placeholder="HP/Nomor Rumah" value="{{$pasien->phone}}" />
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">No KTP</label>
                    <input class="form-control" type="text" name="ktp" placeholder="Nomor KTP" value="{{$pasien->ktp}}"/>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Jenis Pasien</label>

                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="type" ng-model="type" ng-change="onClickPatientType()" value="1" 
                                @if($pasien->type==1) ng-checked="true" @endif
                                @if(empty($pasien->type)) ng-checked="true" @endif >
                            <span class="form-check-sign"></span>
                            Umum
                        </label>
                    </div>

                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="type" ng-model="type" ng-change="onClickPatientType()" value="2" @if($pasien->type==2) ng-checked="true" @endif>
                            <span class="form-check-sign"></span>
                            Anggota TNI
                        </label>
                    </div>

                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="type" ng-model="type" ng-change="onClickPatientType()" value="3" @if($pasien->type==3) ng-checked="true" @endif>
                            <span class="form-check-sign"></span>
                            Kerjasama
                        </label>
                    </div>
                </div>
            </div>
        </div>


        @if($pasien->type==3))
        <div ng-init="show_asuransi=false;show_kerjasama=true"></div>
        @else
        <div ng-init="show_asuransi=true;show_kerjasama=false"></div>
        @endif

        @if(!empty($pasien->pasien_asuransi))
            @php $pasien_asuransi = $pasien->pasien_asuransi->company_id; @endphp
            @php $pasien_asuransi_number = $pasien->pasien_asuransi->number @endphp
        @else
            @php $pasien_asuransi = 10; @endphp
            @php $pasien_asuransi_number = '' @endphp
        @endif


        <div class="row justify-content-center" ng-show="show_asuransi">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Asuransi</label>
                    <select name="asuransi" class="form-control selectpicker" data-size="5" data-live-search="true" id="selectAsuransi" @if($pasien->type==2) disabled @endif>
                        @foreach($asuransi as $item)
                            <option value="{{$item->id}}" @if($pasien_asuransi == $item->id) selected @endif>{{$item->name}} </option>
                        @endforeach
                    </select>
                    
                </div>
            </div>
        </div>

        <div class="row justify-content-center" ng-show="show_asuransi">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">No Asuransi</label>
                    <input class="form-control" type="text" id="asuransiNomor" value="{{$pasien_asuransi_number}}" name="asuransi_nomor" placeholder="Nomor Asuransi" />
                </div>
            </div>
        </div>

        @if(!empty($pasien->pasien_kerjasama))
            @php $pasien_kerjasama = $pasien->pasien_kerjasama->company_id; @endphp
            @php $pasien_kerjasama_number = $pasien->pasien_kerjasama->number @endphp
        @else
            @php $pasien_kerjasama = 10; @endphp
            @php $pasien_kerjasama_number = '' @endphp
        @endif

        <div class="row justify-content-center" ng-show="show_kerjasama">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Perusahaan Kerjasama</label>
                    <select name="perusahaan_kerjasama" class="form-control selectpicker" data-size="5" data-live-search="true">
                        @foreach($perusahaan_kerjasama as $item)
                            <option value="{{$item->id}}" @if($pasien_kerjasama == $item->id) selected @endif>{{$item->name}} </option>
                        @endforeach
                    </select>
                    
                </div>
            </div>
        </div>

        <div class="row justify-content-center" ng-show="show_kerjasama">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">No Identitas Pegawai</label>
                    <input class="form-control" type="text" id="identitasPegawai" name="identitas_pegawai" placeholder="Nomor Identitas Pegawai" value="{{$pasien_kerjasama_number}}" />
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Kelas Perawatan</label>
                    <select name="class" class="form-control selectpicker" data-size="2">
                        <option value="1" @if($pasien->treatment_class == 1) selected @endif>Kelas 1</option>
                        <option value="2" @if($pasien->treatment_class == 2) selected @endif>Kelas 2</option>
                        <option value="3" @if($pasien->treatment_class == 3) selected @endif>Kelas 3</option>
                        <option value="vip" @if($pasien->treatment_class == 'vip') selected @endif>Kelas VIP</option>
                        <option value="vvip" @if($pasien->treatment_class == 'vvip') selected @endif>Kelas VVIP</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Pekerjaan</label>
                    <input class="form-control" type="text" name="occupation" placeholder="ex: Pegawai Negeri" value="{{$pasien->job}}" />
                </div>
            </div>
        </div>

        <div class="">    
            <label>Kerabat</label>
            <div class="card">
                <div class="card-body card-block">
                    <h3 class="card-title">{{$pasien->kerabat->name}}</h3>
                    <p class="card-text">{{$pasien->kerabat->address}}<br>
                        @if($pasien->relatives_type == 1) Pasangan
                        @elseif($pasien->relatives_type == 2) Orang Tua
                        @elseif($pasien->relatives_type == 3) Anak
                        @elseif($pasien->relatives_type == 4) Saudara                                    
                        @else  Kerabat
                        @endif
                    </p>
                    <a href="{{url()->current()}}/kerabat" class="btn btn-danger">Ganti Kerabat</a>

                </div>
            </div>
            <input type="text" name="relatives_id" value="{{$pasien->kerabat->id}}" style="display: none;">


        </div>




    </div>
</div>

