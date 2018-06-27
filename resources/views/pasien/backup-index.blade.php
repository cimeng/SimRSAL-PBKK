@extends('layouts.main',['app' => "pasien"])

@section('title')
Pasien - Medify
@endsection

@section('sidebarcomponent')
    @include('pasien.components.sidebar')
@endsection

@section('content')
<div class="row page-title-container">  
    <div class="icon">  
        <i class="fa fa-exchange"></i>  
    </div>  
    <div class="title">  
        Pasien<br><small>Daftar Pasien</small>
    </div>  
</div>  
<div class="card main-content transaction-index"  ng-controller="PasienController">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-12"> 

                <a href="{{url('pasien/baru')}}" class="btn btn-fill btn-round btn-primary pull-right"><i class="fa fa-plus"></i> Daftarkan Pasien Baru</a>
                <h4 class="card-title">Daftar Pasien</h4>
                <p class="card-category">Pasien yang telah terdaftar dirumah sakit</p>


                <form ng-submit="onSubmit()" style="margin-top: 10px">
                    <input type="text" class="form-control" placeholder="Cari Pasien" ng-model="keyword" ng-blur="onBlurChange()">
                </form>
            </div> 
        </div>
    </div>
    <div class="card-body table-full-width" > 
        <table class="table table-striped"> 
            <thead>
                <tr class="header" ng-click="getCurrentPage()">
                    <th>#</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Usia</th>
                    <th>Jenis Pasien</th>
                </tr>
            </thead>
            <tbody> 
                <tr ng-repeat="item in filteredPasien" ng-click="goTo('{{url('pasien/')}}/'+item.id)" class="clickable-row"> 
                    <td>@{{item.id}}</td>
                    <td>@{{item.name}}</td>
                    <td>@{{item.address}}</td>
                    <td>
                        <span ng-if="item.gender == 1">Laki laki </span>
                        <span ng-if="item.gender == 2">Perempuan </span>
                    </td>
                    <td>@{{item.age}}</td>
                    <td>
                        <span ng-if="item.type == 1">Umum </span>
                        <span ng-if="item.type == 2">TNI </span>
                        <span ng-if="item.type == 3">Kerjasama </span>
                    </td>
                </tr>
            </tbody> 
        </table> 
        <div class="text-center">
            <pagination 
            max-size="5"  
            total-items="totalitems" 
            ng-model="pagination.currentPage" 
            ng-change="pageChanged()"
            boundary-links="true">
            </pagination>
        </div>
    </div>
</div>


@endsection


@section('angular')
<script type="text/javascript">
    app.controller('PasienController', function($scope,$http) {

        $scope.pagination = {
            currentPage:  1
        };
        $scope.keyword = '';


        $scope.loadData = function(){
            $http.get(API_URL + '/pasien/get/?page='+$scope.pagination.currentPage + '&keyword=' + $scope.keyword)
            .then(function (response){
                $scope.filteredPasien = response.data.data;
                $scope.totalitems = response.data.total;
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

        }

        $scope.pageChanged = function() {
            $scope.loadData();
        }

        $scope.goTo = function(url)
        {
            window.location = url;
        }

    });

</script>
@endsection