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

@include('pasien.edit.kerabat-search')
@include('pasien.edit.kerabat-create')
