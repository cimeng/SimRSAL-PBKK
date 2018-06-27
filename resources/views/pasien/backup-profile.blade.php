@extends('layouts.main',['app' => "pasien"])

@section('title')
Pasien - Medify
@endsection

@section('sidebarcomponent')
    @include('pasien.components.sidebar')
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-1">
                <img src="{{asset('assets/img/placeholder.jpg')}}" class="img-circle img-responsive" height="75">
            </div>
            <div class="col-11" style="padding-top: 0px;">
                <button class="btn btn-primary pull-right" style="margin-left: 10px"><i class="fa fa-paper-plane"></i> Daftar Pelayanan</button>
                <a href="{{url()->current()}}/edit" class="btn btn-warning pull-right"><i class="fa fa-pencil"></i> Edit</a>
                <h4 class="title">{{$pasien->name}}</h4>
                
                <small class="text-muted"  style="line-height: 1">
                    @if($pasien->gender) Laki laki
                    @else Perempuan
                    @endif
                    , 
                    {{$pasien->age}} tahun
                </small><br>
                <small>NO IDENTITAS : #{{$pasien->id}}</small>
            </div>
            <div class="col-12">
                <hr>
            </div>
        </div>

        <nav class="nav nav-pills flex-column flex-sm-row " role="tablist">
            <a class="flex-sm-fill text-sm-center nav-link active" id="tab-identitas" href="#identitas" role="tab" data-toggle="tab" aria-expanded="false">
                <i class="fa fa-user"></i>
                Data Diri
            </a>
            <a class="flex-sm-fill text-sm-center nav-link" id="tab-rekam-medis" href="#rekammedis"  role="tab" data-toggle="tab" aria-expanded="true">
                <i class="fa fa-heartbeat"></i>
                Rekam Medis
            </a>
        </nav>


        <div class="tab-content">
            @include('pasien.profile.identitas')
            @include('pasien.profile.rekammedis')
        </div>



    </div>
</div>


@endsection


@section('angular')
@endsection