@extends('layouts.main',['app' => "pasien"])

@section('title')
Pasien - Medify
@endsection

@section('sidebarcomponent')
    @include('pasien.components.sidebar')
@endsection

@section('content')
<div class="container-fluid" ng-controller="PasienController">
    <div class="row">
        <div class="col-md-12 ml-auto mr-auto">


            <form id="pendaftaranPasienForm" method="POST" action="{{url()->current()}}">
                <div class="card card-wizard">

                    {{csrf_field()}}

                    <div class="card-header ">
                        <h3 class="card-title text-center">Pendaftaran Pasien Baru</h3>
                        <p class="card-category text-center">Anda akan mendaftarkan pasien baru kedalam rumah sakit</p>
                    </div>
                    
                    <div class="card-body ">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#tab1" data-toggle="tab" role="tab" aria-controls="tab1" aria-selected="true">Data Pasien</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tab2" data-toggle="tab" role="tab" aria-controls="tab2" aria-selected="true">Kerabat</a>
                            </li>
                        </ul>
                        <div class="tab-content">

                            <div class="tab-pane active" id="tab1" role="tabpanel">



                                @include('pasien.pasienbaru.panel1')

                            </div>
                            <div class="tab-pane fade" id="tab2" role="tabpanel">
                                @include('pasien.pasienbaru.panel2')
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="button" class="btn btn-default btn-wd btn-back pull-left">Back</button>
                        <button type="button" class="btn btn-info btn-wd btn-next pull-right">Next</button>
                        <button type="button" class="btn btn-info btn-wd btn-finish pull-right" onclick="onFinishWizard()">Finish</button>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>




</div>



@endsection

@section('css')

<style type="text/css">
    .hidden {
            display: none;
        }

        .bootstrap-select.btn-group .dropdown-menu.inner
        {
            max-height: 200px!important;
        }

</style>

@endsection

@section('angular')
<script type="text/javascript">

    $(document).ready(function() {
        initLBDWizard();
        $('.datepicker').datetimepicker({
            format: 'DD/MM/YYYY',
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }
        });

        $('.selectpicker').selectpicker({
            size: 5
        });

    });



    app.controller('PasienController', function($scope,$http) {
        $scope.show_asuransi = true;

        $scope.onClickPatientType = function(){
            if($scope.type == 1)
            {
                $scope.show_asuransi = true;
                $scope.show_kerjasama = false;
                $('#selectAsuransi').removeAttr('disabled');
                $('#selectAsuransi').selectpicker('refresh');
                $('#identitasPegawai').val('0');
                $('#asuransiNomor').val('');
            }
            else if($scope.type == 2)
            {
                $scope.show_asuransi = true;
                $scope.show_kerjasama = false;
                $('#selectAsuransi').prop('selectedIndex',0);
                $('#selectAsuransi').attr('disabled',true);
                $('#selectAsuransi').selectpicker('refresh');
                $('#identitasPegawai').val('0');
                $('#asuransiNomor').val('');
            }
            else if($scope.type == 3)
            {
                $scope.show_asuransi = false;
                $scope.show_kerjasama = true;
                $('#asuransiNomor').val('0');
                $('#identitasPegawai').val('');
            }

        };

        $scope.filteredPasien = [];

        $scope.pagination = {
            currentPage:  1,
            itemsPerPage: 9
        };
        $scope.keyword = '';


        $scope.loadData = function(){
            $http.get(API_URL + '/pasien/get/?page='+$scope.pagination.currentPage + '&keyword=' + $scope.keyword)
            .then(function (response){
                $scope.filteredPasien = response.data.data;
                $scope.totalitems = response.data.total;
                console.log($scope.filteredPasien);
            }, function (error)
            {
                console.log(error.status);
            });

        }

        $scope.loadData();

        $scope.onSubmit = function(){
            $scope.pagination.currentPage = 1;
            $scope.pageChanged();
        }


        $scope.onBlurChange = function(){
            if($scope.keyword == '')
            {
                $scope.pagination.currentPage = 1;
                $scope.pageChanged();
            }
            else
            {
                $scope.onSubmit();
            }

        }

        $scope.pageChanged = function() {
            $scope.loadData();
        }

        $scope.chooseRelatives = function(id,index)
        {
            $scope.chosenRelatives = $scope.filteredPasien[index];
            $scope.search_menu = false;
        }

    });


    $(document).ready(function() {
        var select = document.getElementById("selectKota");
        var selectRelatives = document.getElementById("selectKotaRelatives");



        
        var getKotaErrorCounter = 0;
        function getKota()
        {
            $.ajax({
            type:'GET',
            url:API_URL + '/pasien/alamat/kota/get/',
            dataType: 'json',
            success:function(data){
                console.log(data);
                data.forEach(function(item) {
                    select.options.add(new Option(item.name, item.id, true));
                    selectRelatives.options.add(new Option(item.name, item.id, true));
                });

                $('.selectpicker').selectpicker('refresh');

                setKecamatan("selectKecamatan");
                setKecamatan("selectKecamatanRelatives");
            },
            error:function(data){
                if(getKotaErrorCounter<3) getKota();
                else swalError()
                getKotaErrorCounter++;
            }
        });
        }

        getKota();





    });

    function setKecamatan(id)
    {
        var select = document.getElementById(id);

        $.ajax({
            type:'GET',
            url:API_URL + '/pasien/alamat/kecamatan/get/1',
            dataType: 'json',
            success:function(data){
                console.log(data);
                data.forEach(function(item) {
                    select.options.add(new Option(item.name, item.id, true));
                });

                $('.selectpicker').selectpicker('refresh');
            },
            error:function(data){
                console.log(data);
            }
        });
    }



    function onClickCity(kota,kecamatan) {
        var select = document.getElementById(kecamatan);
        var selectkota = document.getElementById(kota);


        for (var i = 0; i < 50; i++) {
                select.options[0] = null;
            }
        select.options.add(new Option("Pilih", "", false));




        var selectedCity = $('#'+kota).val();

        $.ajax({
            type:'GET',
            url:API_URL + '/pasien/alamat/kecamatan/get/'+ selectedCity,
            dataType: 'json',
            success:function(data){
                console.log(data);
                data.forEach(function(item) {
                    select.options.add(new Option(item.name, item.id, true));
                });

                $('.selectpicker').selectpicker('refresh');
                $('.selectpicker').selectpicker({
                    size: 5
                });
            },
            error:function(data){
                console.log(data);
            }
        });


    }


    function onFinishWizard(){
        $('#pendaftaranPasienForm').submit();
    }

    function initLBDWizard() {
            // Code for the Validator
            var $validator = $('#pendaftaranPasienForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    birthplace: {
                        required: true,
                    },
                    birthdate: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },
                    city: {
                        required: true,
                    },
                    asuransi_nomor: {
                        required: true,
                    },
                    identitas_pegawai: {
                        required: true,
                    },
                    occupation: {
                        required: true,
                    },
                    relatives_name: {
                        required: true,
                    },
                    relatives_birthplace: {
                        required: true,
                    },
                    relatives_birthdate: {
                        required: true,
                    },
                    relatives_address: {
                        required: true,
                    },
                    relatives_phone: {
                        required: true,
                    },
                    relatives_ktp: {
                        required: true,
                    },
                    relatives_occupation: {
                        required: true,
                    },
                },
                highlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                },
                success: function(element) {
                    $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                },

                // errorPlacement: function(error, element) {
                //     $(element).parent('div').addClass('has-danger');
                //  }
            });

            // Wizard Initialization
            $('.card-wizard').bootstrapWizard({
                'tabClass': 'nav nav-pills',
                'nextSelector': '.btn-next',
                'previousSelector': '.btn-previous',

                onNext: function(tab, navigation, index) {
                    var $valid = $('#pendaftaranPasienForm').valid();
                    if (!$valid) {
                        $validator.focusInvalid();
                        return false;
                    }
                },

                onInit: function(tab, navigation, index) {
                    //check number of tabs and fill the entire row
                    var $total = navigation.find('li').length;
                    var $wizard = navigation.closest('.card-wizard');

                    $first_li = navigation.find('li:first-child a').html();
                    $moving_div = $('<div class="moving-tab">' + $first_li + '</div>');
                    $('.card-wizard .wizard-navigation').append($moving_div);

                    refreshAnimation($wizard, index);

                    $('.moving-tab').css('transition', 'transform 0s');
                },

                onTabClick: function(tab, navigation, index) {
                    var $valid = $('#pendaftaranPasienForm').valid();

                    if (!$valid) {
                        return false;
                    } else {
                        return true;
                    }
                },

                onTabShow: function(tab, navigation, index) {
                    var $total = navigation.find('li').length;
                    var $current = index + 1;

                    var $wizard = navigation.closest('.card-wizard');
                    //console.log($current);

                    // If it's the last tab then hide the last button and show the finish instead
                    if ($current >= $total) {
                        $($wizard).find('.btn-next').hide();
                        $($wizard).find('.btn-finish').show();
                        $($wizard).find('.btn-previous').show();
                    } else {
                        $($wizard).find('.btn-next').show();
                        $($wizard).find('.btn-finish').hide();
                        $($wizard).find('.btn-previous').hide();
                    }

                    button_text = navigation.find('li:nth-child(' + $current + ') a').html();

                    setTimeout(function() {
                        $('.moving-tab').text(button_text);
                    }, 150);

                    var checkbox = $('.footer-checkbox');

                    if (!index == 0) {
                        $(checkbox).css({
                            'opacity': '0',
                            'visibility': 'hidden',
                            'position': 'absolute'
                        });
                    } else {
                        $(checkbox).css({
                            'opacity': '1',
                            'visibility': 'visible'
                        });
                    }

                    refreshAnimation($wizard, index);
                }
            });


            // Prepare the preview for profile picture
            $("#wizard-picture").change(function() {
                readURL(this);
            });

            $('[data-toggle="wizard-radio"]').click(function() {
                wizard = $(this).closest('.card-wizard');
                wizard.find('[data-toggle="wizard-radio"]').removeClass('active');
                $(this).addClass('active');
                $(wizard).find('[type="radio"]').removeAttr('checked');
                $(this).find('[type="radio"]').attr('checked', 'true');
            });

            $('[data-toggle="wizard-checkbox"]').click(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active');
                    $(this).find('[type="checkbox"]').removeAttr('checked');
                } else {
                    $(this).addClass('active');
                    $(this).find('[type="checkbox"]').attr('checked', 'true');
                }
            });

            $('.set-full-height').css('height', 'auto');

            //Function to show image before upload

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $(window).resize(function() {
                $('.card-wizard').each(function() {
                    $wizard = $(this);

                    index = $wizard.bootstrapWizard('currentIndex');
                    refreshAnimation($wizard, index);

                    $('.moving-tab').css({
                        'transition': 'transform 0s'
                    });
                });
            });

            function refreshAnimation($wizard, index) {
                $total = $wizard.find('.nav li').length;
                $li_width = 100 / $total;

                total_steps = $wizard.find('.nav li').length;
                move_distance = $wizard.width() / total_steps;
                index_temp = index;
                vertical_level = 0;

                mobile_device = $(document).width() < 600 && $total > 3;

                if (mobile_device) {
                    move_distance = $wizard.width() / 2;
                    index_temp = index % 2;
                    $li_width = 50;
                }

                $wizard.find('.nav li').css('width', $li_width + '%');

                step_width = move_distance;
                move_distance = move_distance * index_temp;

                $current = index + 1;

                if ($current == 1 || (mobile_device == true && (index % 2 == 0))) {
                    move_distance -= 8;
                } else if ($current == total_steps || (mobile_device == true && (index % 2 == 1))) {
                    move_distance += 8;
                }

                if (mobile_device) {
                    vertical_level = parseInt(index / 2);
                    vertical_level = vertical_level * 38;
                }

                $wizard.find('.moving-tab').css('width', step_width);
                $('.moving-tab').css({
                    'transform': 'translate3d(' + move_distance + 'px, ' + vertical_level + 'px, 0)',
                    'transition': 'all 0.5s cubic-bezier(0.29, 1.42, 0.79, 1)'

                });
            }
        }

    </script>
    @endsection