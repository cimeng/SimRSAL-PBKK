@extends('pasien.layouts.main')

@section('title')
Pasien - Medify
@endsection

@section('subtitle')
Perubahan Data Pasien
@endsection

@section('content')
<main id="main-container">
    @include('pasien.layouts.navbar')
    <div class="container">
        <div class="block">
            <div class="block-content">
                <h4 class="mb-0">Perubahan Data Pasien</h4>
                <hr>
                <form id="pasienSubmit">
                    <div class="row justify-content-center">
                        <div class="col-md-4 ">
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' id="avatar" name="avatar" accept=".png, .jpg, .jpeg" />
                                    <label for="avatar"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url({{asset('')}}/{{$pasien['identitas']->photo_thumb}});">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


            
                 <div class="row">
                     <div class="col-md-6">
                        <div class="row justify-content-center">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label class="control-label">Nama Lengkap</label>
                                    <input class="form-control" type="text" name="name" placeholder="ex: Aldi Sujana" value="{{$pasien['identitas']->name}}" />
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label class="control-label">Jenis Kelamin</label>

                                    <div class="custom-control custom-radio mb-5">
                                        <input class="custom-control-input" type="radio" name="gender" id="gender-1" value="1" onchange="changeGender(1)" 
                                        @if($pasien['identitas']->gender == 1) checked @endif
                                        > 
                                        <label class="custom-control-label" for="gender-1">Laki Laki</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5">
                                        <input class="custom-control-input" type="radio" id="gender-2" name="gender" value="2" onchange="changeGender(2)"
                                        @if($pasien['identitas']->gender == 2) checked @endif>
                                        <label class="custom-control-label" for="gender-2">Perempuan</label>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label class="control-label">Status Pernikahan</label>


                                    <div class="custom-control custom-radio mb-5">
                                        <input class="custom-control-input" type="radio" name="marriage" id="marriage-1" value="1" checked  onchange="changeMarriage(1)"
                                        @if($pasien['identitas']->marriage == 1) checked @endif>
                                        <label class="custom-control-label" for="marriage-1">Single</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5">
                                        <input class="custom-control-input" type="radio" name="marriage" id="marriage-2"  value="2"  onchange="changeMarriage(2)"
                                        @if($pasien['identitas']->marriage == 2) checked @endif>
                                        <label class="custom-control-label" for="marriage-2">Menikah</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5">
                                        <input class="custom-control-input" type="radio" name="marriage" id="marriage-3" value="3"  onchange="changeMarriage(3)"
                                        @if($pasien['identitas']->marriage == 3) checked @endif>
                                        <label class="custom-control-label" for="marriage-3">Duda/Janda</label>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label class="control-label">Tempat Lahir</label>
                                    <input class="form-control" type="text" name="birthplace" placeholder="ex : Surabaya"  value="{{$pasien['identitas']->place_of_birth}}" />
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label class="control-label">Tanggal Lahir</label>
                                    <input type="text" class="form-control datepicker" id="tanggal-lahir" name="birthdate" placeholder="ex : 02/14/2018"  value="{{$pasien['identitas']->date_of_birth}}" >
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label class="control-label">Alamat</label>
                                    <input class="form-control" type="text" name="address" placeholder="ex: Jalan Merpati no.11"  value="{{$pasien['identitas']->address}}" />
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12 ">
                                <div class="form-group row">
                                    <label class="col-12" for="example-select2">Kota/Kabutan</label>
                                    <div class="col-lg-12">
                                        <select class="js-select2 form-control" id="kotaSelect2" name="city" style="width: 100%;" data-placeholder="Pilih kota/kabupaten">
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label class="control-label">Kecamatan <i id="kecamatanLoading" class="fa fa-asterisk fa-spin text-info"></i></label>
                                    <select name="district" class="form-control js-select2" data-placeholder="Pilih Kecamatan" id="kecamatanSelect2">
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
                                    <input class="form-control" type="text" name="phone" placeholder="HP/Nomor Rumah"  value="{{$pasien['identitas']->phone}}" />
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label class="control-label">No KTP</label>
                                    <input class="form-control" type="text" name="ktp" placeholder="Nomor KTP"  value="{{$pasien['identitas']->ktp}}" />
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label class="control-label">Jenis Pasien</label>


                                    <div class="custom-control custom-radio mb-5">
                                        <input class="custom-control-input" type="radio" name="jenispasien" id="type-1" value="1" checked onchange="changeJenis(1)"
                                        @if($pasien['identitas']->type == 1) checked @endif>
                                        <label class="custom-control-label"  for="type-1">Umum</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5">
                                        <input class="custom-control-input" type="radio" name="jenispasien" id="type-2" value="2" onchange="changeJenis(2)"
                                        @if($pasien['identitas']->type == 2) checked @endif>
                                        <label class="custom-control-label"  for="type-2">Anggota TNI</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5">
                                        <input class="custom-control-input" type="radio" name="jenispasien" id="type-3" value="3" onchange="changeJenis(3)"
                                        @if($pasien['identitas']->type == 3) checked @endif>
                                        <label class="custom-control-label" for="type-3">Kerjasama</label>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center jenis-asuransi">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label class="control-label">Asuransi</label>
                                    <select name="asuransi" class="form-control js-select2" data-size="5" id="selectAsuransi">
                                        @foreach($asuransi as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center jenis-asuransi">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label class="control-label">No Asuransi</label>
                                    <input class="form-control" type="text" id="asuransiNomor" name="asuransi_nomor" placeholder="Nomor Asuransi"  
                                    @if($pasien['identitas']->type != 3)
                                    value="{{$pasien['identitas']->pasien_asuransi->number}}" 
                                    @endif
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center jenis-kerjasama">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label class="control-label">Perusahaan Kerjasama</label>
                                    <select name="perusahaan_kerjasama" class="form-control js-select2" data-size="5" id="selectPerusahaan">
                                        @foreach($perusahaan_kerjasama as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center jenis-kerjasama">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label class="control-label">No Identitas Pegawai</label>
                                    <input class="form-control" type="text" id="identitasPegawai" name="identitas_pegawai" placeholder="Nomor Identitas Pegawai"  

                                    @if($pasien['identitas']->type == 3)
                                    value="{{$pasien['identitas']->pasien_kerjasama->number}}"
                                    @endif

                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label class="control-label">Kelas Perawatan</label>
                                    <select name="kelas" id="selectKelas" class="form-control" data-size="2">
                                        <option value="1" @if($pasien['identitas']->treatment_class == 1) selected @endif >Kelas 1</option>
                                        <option value="2" @if($pasien['identitas']->treatment_class == 2) selected @endif>Kelas 2</option>
                                        <option value="3" @if($pasien['identitas']->treatment_class == 3) selected @endif>Kelas 3</option>
                                        <option value="vip" @if($pasien['identitas']->treatment_class == 'vip') selected @endif>Kelas VIP</option>
                                        <option value="vvip" @if($pasien['identitas']->treatment_class == 'vvip') selected @endif>Kelas VVIP</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label class="control-label">Pekerjaan</label>
                                    <input class="form-control" type="text" name="occupation" placeholder="ex: Aldi Sujana" value="{{$pasien['identitas']->job}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" style="height: 75px">
                        <button class="btn btn-success btn-hero pull-right" type="button" id="buttonSubmit"><i class="fa fa-check"></i> Simpan</button>
                        <button class="btn btn-alt-success btn-hero pull-right" style="display: none" type="button"  id="buttonLoading">
                            <i class="fa fa-asterisk fa-spin"></i> Loading
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</main>

@endsection


@section('angular')
<script type="text/javascript">
    $('#kotaSelect2').select2();
    $('#kecamatanSelect2').select2();
    $('#selectAsuransi').select2();
    $('#selectPerusahaan').select2();
    $('#select').select2();
    $('#tanggal-lahir').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
    $('.jenis-kerjasama').hide();

    @if($pasien["identitas"]->type == 1)
    changeJenis(1);
    $('#selectAsuransi').val('{{$pasien["identitas"]->pasien_asuransi->company_id}}').trigger('change');
    @elseif($pasien["identitas"]->type == 2)
    changeJenis(2);
    $('#selectAsuransi').val('{{$pasien["identitas"]->pasien_asuransi->company_id}}').trigger('change');
    @elseif($pasien["identitas"]->type == 3)
    changeJenis(3);
    $('#selectPerusahaan').val('{{$pasien["identitas"]->pasien_kerjasama->company_id}}').trigger('change');
    @endif
   
    var valGender = "{{$pasien['identitas']->gender}}";
    var valMarriage = "{{$pasien['identitas']->marriage}}";

    function getKota()
    {
        $.ajax({
            type:'GET',
            url:API_URL + '/pasien/alamat/kota/get/',
            dataType: 'json',
            success:function(data){
                console.log(data);
                data.forEach(function(item) {
                    var newOption = new Option(item.name, item.id, false, false);
                    $("#kotaSelect2").append(newOption).trigger('change');
                });
                $('#kotaSelect2').val('{{$pasien["identitas"]->city}}').trigger('change');
                setKecamatan('{{$pasien["identitas"]->city}}')
            },
            error:function(data){
                if(getKotaErrorCounter<3) getKota();
                else swalError()
                    getKotaErrorCounter++;
            }
        });
    }

    function setKecamatan(id)
    {
        $('#kecamatanLoading').show();
        $.ajax({
            type:'GET',
            url:API_URL + '/pasien/alamat/kecamatan/get/'+id,
            dataType: 'json',
            success:function(data){
                console.log(data);
                $('#kecamatanSelect2').html('').select2({data: [{id: '', text: ''}]});
                data.forEach(function(item) {
                    var newOption = new Option(item.name, item.id, false, false);
                    $("#kecamatanSelect2").append(newOption).trigger('change');
                });
                $('#kecamatanSelect2').val('{{$pasien["identitas"]->district}}').trigger('change');
                $('#kecamatanLoading').fadeOut();
            },
            error:function(data){
                console.log(data);
            }
        });
    }

    $( document ).ready(function() {
        getKota();
        $('#kotaSelect2').on("select2:select", function(e) { 
            id = $('#kotaSelect2').val()
            console.log(id)
            setKecamatan(id)
        });
    });

    function changeJenis(val)
    {
        valJenisPasien = val;
        if(val == 1)
        {
            $('.jenis-asuransi').show();
            $('.jenis-kerjasama').hide();
        }
        if(val == 2)
        {
            $('.jenis-asuransi').show();
            $('.jenis-kerjasama').hide();
        }
        if(val == 3)
        {
            $('.jenis-asuransi').hide();
            $('.jenis-kerjasama').show();
        }
    }

    function changeGender(val)
    {
        valGender = val;
    }

    function changeMarriage(val)
    {
        valMarriage = val;
    }




</script>

<script type="text/javascript">

    $('#buttonSubmit').click(function() {
    
    $('#buttonSubmit').hide();
    $('#buttonLoading').show();

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    id = "{{$pasien['identitas']->id}}"
    name = $("input[name='name']").val();
    gender = valGender
    marriage = valMarriage
    birthplace = $("input[name='birthplace']").val();
    birthdate = $("input[name='birthdate']").val();
    address = $("input[name='address']").val();
    city = $("#kotaSelect2").val();
    district = $("#kecamatanSelect2").val();
    phone = $("input[name='phone']").val();
    ktp = $("input[name='ktp']").val();
    type = valJenisPasien
    asuransi = $("#selectAsuransi").val();
    asuransi_nomor = $("input[name='asuransi_nomor']").val();
    perusahaan_kerjasama = $("#selectPerusahaan").val();
    identitas_pegawai = $("input[name='identitas_pegawai']").val();
    kelas = $("#selectKelas").val();
    occupation = $("input[name='occupation']").val();
    avatar =  $('#avatar').prop('files')[0]; 

    console.log(avatar);

    var formData = new FormData();
    formData.append('name', name);
    formData.append('gender', gender);
    formData.append('marriage', marriage);
    formData.append('birthplace', birthplace);
    formData.append('birthdate', birthdate);
    formData.append('address', address);
    formData.append('city', city);
    formData.append('district', district);
    formData.append('phone', phone);
    formData.append('ktp', ktp);
    formData.append('type', type);
    formData.append('asuransi', asuransi);
    formData.append('asuransi_nomor', asuransi_nomor);
    formData.append('perusahaan_kerjasama', perusahaan_kerjasama);
    formData.append('identitas_pegawai', identitas_pegawai);
    formData.append('kelas', kelas);
    formData.append('occupation', occupation);
    formData.append('avatar', avatar);
    formData.append('id', id);

    $.ajax({
        type: "POST",
        url: API_URL + "/pasien/edit",
        contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            success: function (response) {
                
                callSwalString(response);
                $('#buttonSubmit').show();
                $('#buttonLoading').hide();
            },
            error: function () {
                callSwal('error','Transaksi Gagal','Silahkan Coba Lagi',0);
                $('#buttonSubmit').show();
                $('#buttonLoading').hide();
            }
        });

        function callSwalString(string)
        {
            var response = jQuery.parseJSON(string);
            callSwal(response.type,response.title,response.text,response.url);
        }
    


});

</script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#avatar").change(function() {
        readURL(this);
    });
</script>
@endsection