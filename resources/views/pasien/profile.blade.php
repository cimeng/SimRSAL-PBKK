@extends('pasien.layouts.main')

@section('title')
Pasien - Medify
@endsection

@section('subtitle')
{{$identitas->name}}
@endsection

@section('content')
<main id="main-container">
    @include('pasien.layouts.navbar')
    <div class="container">
        <div class="block">
            <div class="block-content">
                <div class="row mx-0 mb-20">
                    <div class="col-1 px-0">
                        <img src="{{asset('')}}/{{$identitas->photo_thumb}}" class="img-avatar-lg" >
                    </div>
                    <div class="col-11 pl-0" style="padding-top: 0px;">
                        <div class="btn-group float-right ml-10" role="group">
                            <button type="button" class="btn btn-primary dropdown-toggle" id="btnGroupDrop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-paper-plane"></i> Daftar Pelayanan</button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="{{url('rawatjalan/poliklinik/antrian/baru/')}}/{{$identitas->id}}">
                                    <i class="fa fa-fw fa-wheelchair mr-5"></i>Rawat Jalan
                                </a>
                                <a class="dropdown-item" href="{{url('/igd/transaksi/baru')}}/{{$identitas->id}}">
                                    <i class="fa fa-fw fa-ambulance mr-5"></i>IGD
                                </a>
                            </div>
                        </div>


                        <a href="{{url()->current()}}/edit" class="btn btn-warning pull-right"><i class="fa fa-pencil"></i> Edit</a>
                        <h4 class="title mb-5">{{$identitas->name}}</h4>
                        <h6 class="font-w400 mb-5">
                            @if($identitas->gender == 1) Laki laki
                            @else Perempuan
                            @endif
                            , 
                            {{$identitas->age}} tahun
                        </h6>
                        <h6 class="font-w400 mb-0">No Rekam Medis : #{{$identitas->id}}</h6>
                    </div>
                </div>
                <div class="block">
                    <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tabs-identitas">Identitas Pasien</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-kasus">Histori Kasus</a>
                        </li>
                        {{--
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-penunjang">Histori Penunjang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabs-resep">Histori Resep</a>
                        </li>
                        --}}
                    </ul>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="tabs-identitas" role="tabpanel">
                            @include('pasien.profile.identitas')
                        </div>
                        <div class="tab-pane" id="tabs-kasus" role="tabpanel">
                            @include('pasien.profile.histori-kasus')
                        </div>
                        <div class="tab-pane" id="tabs-penunjang" role="tabpanel">
                            @include('pasien.profile.histori-penunjang')
                        </div>
                        <div class="tab-pane" id="tabs-resep" role="tabpanel">
                            @include('pasien.profile.histori-resep')
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

@endsection


@section('angular')
@endsection