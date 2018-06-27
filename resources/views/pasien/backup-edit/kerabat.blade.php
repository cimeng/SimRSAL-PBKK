@extends('layouts.main',['app' => "pasien"])

@section('title')
Pasien - Medify
@endsection

@section('sidebarcomponent')
    @include('pasien.components.sidebar')
@endsection

@section('content')
<div class="container-fluid" ng-controller="PasienController" ng-cloak>
    <div class="row">
        <div class="col-md-12 ml-auto mr-auto">


            <form id="pendaftaranPasienForm" method="POST" action="{{url()->current()}}">
                <div class="card card-wizard">

                    {{csrf_field()}}

                    <div class="card-header ">
                        <h3 class="card-title text-center">Ubah Data Kerabat Pasien</h3>
                        <p class="card-category text-center">Anda akan mengubah data kerabat milik pasien <b>{{$pasien->name}}</b></p>
                    </div>
                    
                    <div class="card-body ">
                        <ul class="nav nav-tabs">
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab2" role="tabpanel">
                                @include('pasien.edit.kerabat-menu')
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-info btn-wd btn-finish pull-right">Simpan</button>
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

        $scope.chosenRelatives = [];
        $scope.chosenRelatives['id'] = '{{$pasien->kerabat->id}}';
        $scope.chosenRelatives['name'] = '{{$pasien->kerabat->name}}';
        $scope.chosenRelatives['address'] = '{{$pasien->kerabat->address}}';

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


    </script>
    @endsection