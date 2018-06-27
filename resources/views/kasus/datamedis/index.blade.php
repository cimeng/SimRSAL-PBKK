@extends('kasus.layouts.main')

@section('content')

<!-- Main Container -->
<main id="main-container">
    @include('kasus.layouts.header')

    <div class="content">
        <div class="row">
            @include('kasus.layouts.sidebar')

            <!-- Updates -->
            <div class="col-lg-4 col-xl-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="block rounded p-0">
                            <ul class="nav nav-tabs nav-tabs-block nav-justified nav-primary" data-toggle="tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link 
                                    @if (session('active_nav') == 'identitas' || empty(session('active_nav')))
                                    active
                                    @endif
                                    " href="#identitas">Identitas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link
                                    @if (session('active_nav') == 'cppt')
                                    active
                                    @endif
                                    " href="#cppt">CPPT</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link
                                    @if (session('active_nav') == 'diagnosis')
                                    active
                                    @endif
                                    " href="#diagnosis">Diagnosis</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link
                                    @if (session('active_nav') == 'tindakan')
                                    active
                                    @endif
                                    " href="#tindakan">Tindakan</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link
                                    @if (session('active_nav') == 'resep')
                                    active
                                    @endif
                                    " href="#resep">Resep</a>
                                </li>
                                {{--
                                <li class="nav-item">
                                    <a class="nav-link
                                    @if (session('active_nav') == 'gizi')
                                    active
                                    @endif
                                    " href="#gizi">Gizi</a>
                                </li>
                                --}}
                                <li class="nav-item">
                                    <a class="nav-link
                                    @if (session('active_nav') == 'lokasi')
                                    active
                                    @endif
                                    " href="#lokasi">Lokasi</a>
                                </li>
                            </ul>
                            <div class="block-content tab-content overflow-hidden">
                                <div class="tab-pane fade fade-left
                                @if (session('active_nav') == 'identitas' || empty(session('active_nav')))
                                show active
                                @endif
                                " id="identitas" role="tabpanel">
                                @include('kasus.datamedis.content.identitas.index')
                                </div>
                                <div class="tab-pane fade fade-left
                                @if (session('active_nav') == 'cppt')
                                show active
                                @endif
                                " id="cppt" role="tabpanel">
                                @include('kasus.datamedis.content.cppt.index')
                                </div>
                                <div class="tab-pane fade fade-left
                                @if (session('active_nav') == 'diagnosis')
                                show active
                                @endif
                                " id="diagnosis" role="tabpanel">
                                @include('kasus.datamedis.content.diagnosis.index')
                                </div>
                                <div class="tab-pane fade fade-left
                                @if (session('active_nav') == 'tindakan')
                                show active
                                @endif
                                " id="tindakan" role="tabpanel">
                                @include('kasus.datamedis.content.tindakan.index')
                                </div>
                                <div class="tab-pane fade fade-left
                                @if (session('active_nav') == 'resep')
                                show active
                                @endif
                                " id="resep" role="tabpanel">
                                @include('kasus.datamedis.content.resep.index')
                                </div>

                                {{--
                                <div class="tab-pane fade fade-left
                                @if (session('active_nav') == 'gizi')
                                show active
                                @endif
                                " id="gizi" role="tabpanel">
                                @include('kasus.datamedis.content.gizi.index')
                                </div>
                                --}}
                                <div class="tab-pane fade fade-left
                                @if (session('active_nav') == 'lokasi')
                                show active
                                @endif
                                " id="lokasi" role="tabpanel">
                                @include('kasus.datamedis.content.lokasi.index')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Updates -->
        </div>
    </div>
</main>
<!-- END Main Container -->

@include('kasus.datamedis.content.identitas.edit-identitas-modal')
@include('kasus.datamedis.content.identitas.edit-identitas-medis-modal')

@include('kasus.datamedis.content.cppt.create-modal')
@include('kasus.datamedis.content.cppt.edit-modal')
@include('kasus.datamedis.content.cppt.delete-modal')

@include('kasus.datamedis.content.diagnosis.create-modal')
@include('kasus.datamedis.content.diagnosis.delete-modal')

@include('kasus.datamedis.content.tindakan.create-modal')
@include('kasus.datamedis.content.tindakan.delete-modal')
@include('kasus.datamedis.content.tindakan.edit-modal')

@include('kasus.datamedis.content.resep.create-modal')
@include('kasus.datamedis.content.resep.delete-modal')
@include('kasus.datamedis.content.resep.edit-modal')

@include('kasus.datamedis.content.lokasi.create-modal')

@include('kasus.datamedis.content.gizi.create-modal')

@endsection

@section('js')

<script type="text/javascript">

    function showModal() {
        $('#modal').modal('show');
    }

    jQuery(function () {
        Codebase.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs']);
    });

    /*IDENTITAS*/
    if($('#identitas-edit-asuransi').val() == 0)
    {
        $('#container-identitas-edit-noasuransi').hide();
    }


    $('#identitas-edit-asuransi').on('change', function() {
        if(this.value != 0)
        {
            $('#container-identitas-edit-noasuransi').show();
        }
        else
        {
            $('#container-identitas-edit-noasuransi').hide();
        }
    })

    /*CPPT*/
    function cpptEditModal(id,index)
    {
        $('#loading-top').fadeIn();
        $.ajax({
            url: API_URL + '/kasus/{{$kasus->nomor_kasus}}/datamedis/cppt/'+ id,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#cpptModalEdit #title-number').html('' + index);
                var subj = data.subjective
                var obj = data.objective
                var ass = data.assessment
                var plan = data.plan
                var ppa = data.ppa

                $('#cppt-edit-id').val(id)
                $('#cppt-edit-s').val(subj)
                $('#cppt-edit-o').val(obj)
                $('#cppt-edit-a').val(ass)
                $('#cppt-edit-p').val(plan)
                $('#cppt-edit-ppa').val(ppa)
                $('#cpptModalEdit').modal('show');
                $('#loading-top').hide();
            },
            error: function() {
                alert('error');
            },
        });
    }


    function cpptDeleteModal(id,index)
    {
        $('#cpptModalDelete #title-number').html('' + index);
        $('#cppt-delete-id').val(id)
        $('#cpptModalDelete').modal('show');
    }

    /* PRINT VIA BROWSER PAKE JQUERY MAIN HIDE SAMA SHOW
    function cpptPrint(index)
    {
        $('#print-container').html($("#cppt-item-"+index).html());
        $('#page-container').hide();
        $('footer').hide();
        window.print();
        $('#print-container').html('');
        $('#page-container').show();
        $('footer').show();
    }
    */

    function cpptPrint(id)
    {
        window.open('{{url('')}}/kasus/{{$kasus->nomor_kasus}}/datamedis/cppt/print/'+id, '_blank');
    }

    /*DIAGNOSIS*/
    function diagnosisDeleteModal(id,index)
    {
        $('#diagnosisDeleteModal #diagnosis-id').val(id)
        $('#diagnosisDeleteModal').modal('show');
    }


    /*TINDAKAN*/
    function tindakanDeleteModal(id)
    {
        $('#tindakanDeleteModal #tindakan-id').val(id)
        $('#tindakanDeleteModal').modal('show');
    }

    function tindakanEditModal(id)
    {
        $('#loading-top').fadeIn();
        $.ajax({
            url: API_URL + '/kasus/{{$kasus->nomor_kasus}}/datamedis/tindakan/'+ id,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var price = data.price
                var desc = data.desc

                $('#modal-edit-tindakan #input-id').val(id)
                $('#modal-edit-tindakan #input-desc').val(desc)
                $('#modal-edit-tindakan #input-price').val(price)
                $('#modal-edit-tindakan').modal('show');
                $('#loading-top').hide();
            },
            error: function() {
                alert('error');
            },
        });
    }

    var createTagihanLastDesc = '';

    var AutoCompleteCreateTindakan = function() {

        var ListLayanan = {};

        var initAutoComplete = function(){
            jQuery('#modal-create-tindakan .tindakan-autocomplete').autoComplete({
                minChars: 3,
                source: function(term, suggest){
                    term = term.toLowerCase();
                    var search_tindakan_url = API_URL+"/daftarharga/get?keyword="+term+"&kelas={{$kasus->kelas}}&type=1"

                    $.ajax({
                        url: search_tindakan_url,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            data = response.data
                            for (i = 0; i < data.length; i++) {
                                ListLayanan[data[i].name] = data[i];
                                suggestions.push(data[i].name);
                            }
                            suggest(suggestions);
                        },
                        error: function() {
                            alert('error');
                        },
                    });

                    var suggestions    = [];


                },
                onSelect: function(event, term, item) {
                    $("#tindakan-input-create-price").val(ListLayanan[term].harga)
                    $("#tindakan-input-create-daftar-id").val(ListLayanan[term].id);
                    createTagihanLastDesc = ListLayanan[term].name;
                }
            });
        };

        return {
            init: function () {
                initAutoComplete();
            }
        };
    }();

    var AutoCompleteEditTindakan = function() {

        var ListLayanan = {};

        var initAutoComplete = function(){
            jQuery('#modal-edit-tindakan .tindakan-autocomplete').autoComplete({
                minChars: 3,
                source: function(term, suggest){
                    term = term.toLowerCase();
                    var search_tindakan_url = API_URL+"/daftarharga/get?keyword="+term+"&kelas={{$kasus->kelas}}&type=1"

                    $.ajax({
                        url: search_tindakan_url,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            data = response.data
                            for (i = 0; i < data.length; i++) {
                                ListLayanan[data[i].name] = data[i];
                                suggestions.push(data[i].name);
                            }
                            suggest(suggestions);
                        },
                        error: function() {
                            alert('error');
                        },
                    });

                    var suggestions    = [];


                },
                onSelect: function(event, term, item) {
                    $("#modal-edit-tindakan #input-price").val(ListLayanan[term].harga)
                    $("#tindakan-input-edit-daftar-id").val(ListLayanan[term].id);
                    createTagihanLastDesc = ListLayanan[term].name;
                }
            });
        };

        return {
            init: function () {
                initAutoComplete();
            }
        };
    }();

    jQuery( function() {
        AutoCompleteCreateTindakan.init();
        AutoCompleteEditTindakan.init();
    });

    function emptyDaftarHargaID()
    {
        var current_desc = $(".tindakan-autocomplete").val();

        if(current_desc !== createTagihanLastDesc)
        {
            $("#tindakan-input-create-daftar-id").val('');
        }
    }


    /*RESEP*/
    URL = '{{url('')}}'
    nomor_kasus = '{{$kasus->nomor_kasus}}'


</script>

<script src="{{asset('js/diagnosis/function.js')}}"></script>
<script src="{{asset('js/resep/function.js')}}"></script>
<script src="{{asset('js/gizi/function.js')}}"></script>

@endsection
