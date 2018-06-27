<div class="row justify-content-center" ng-show="show_search_relatives" ng-init="search_menu=false">
    <div ng-show="!search_menu" class="text-center">    
        <p class="text-center"> Kerabat pasien yang terpilih </p>
        <div class="card">
            <div class="card-body card-block">
                <h3 class="card-title">@{{chosenRelatives.name}}</h3>
                <p class="card-text">@{{chosenRelatives.address}}</p>
            </div>
        </div>
        <input type="text" name="relatives_id" ng-model="chosenRelatives.id" style="display: none;">

        <div class="row justify-content-center" >
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label">Hubungan Keluarga</label>
                    <select name="chosen_relatives_relationship" class="form-control selectpicker" data-size="5">
                        <option value="1" @if($pasien->relatives_type==1) selected @endif >Pasangan</option>
                        <option value="2" @if($pasien->relatives_type==2) selected @endif >Orang Tua</option>
                        <option value="3" @if($pasien->relatives_type==3) selected @endif >Anak</option>
                        <option value="4" @if($pasien->relatives_type==4) selected @endif >Saudara</option>
                        <option value="5" @if($pasien->relatives_type==5) selected @endif >Kerabat</option>
                    </select>

                </div>
            </div>
        </div>

        <button class="btn btn-danger" type="button" ng-click="search_menu = true">Ganti orang lain</button>
    </div>

    <div ng-show="search_menu">
        <p class="text-center">Cari Kerabat dari daftar pasien</p>
        <div class="col-lg-12">
            <div class="input-group">
                <input class="form-control" type="text" name="relatives_name" placeholder="Cari Kerabat Pasien" ng-blur="onBlurChange()" ng-model="keyword"/>
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="button" style="width: 200px;" ng-click="onSubmit()">Cari</button>
                </span>
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
                    <tr ng-repeat="item in filteredPasien" class="clickable-row"> 
                        <td>@{{item.id}}</td>
                        <td>@{{item.name}}</td>
                        <td>@{{item.address}}</td>
                        <td>
                            <span ng-if="item.gender == 1">Laki laki </span>
                            <span ng-if="item.gender == 2">Perempuan </span>
                        </td>
                        <td>@{{item.age}}</td>
                        <td>
                            <button class="btn btn-primary" type="button" ng-click="chooseRelatives(item.id,$index)">Pilih</button>
                        </td>
                    </tr>
                </tbody> 
            </table> 
            <div class="text-center">
                <pagination max-size="5" total-items="totalitems"  ng-model="pagination.currentPage" ng-change="pageChanged()" boundary-links="true">
                </pagination>
            </div>
        </div>
    </div>


</div>