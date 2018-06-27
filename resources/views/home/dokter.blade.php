@extends('layouts.main-dashboard')
@section('content')

@include('layouts.components2.navbar')
<!-- Main Container -->
<main id="main-container">
    <div class="content">
        <div class="row">
            <div class="col-lg-3">
                <a class="block block-transparent mb-10" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix  p-0 pl-10">
                        <div class="float-left mr-10">
                            <i class="fa fa-h-square fa-2x"></i>
                        </div>
                        <div class="float-left text-left" style="margin-top: 3px;">
                            <h5 class="font-w600 mb-5">Medify Hospital </h5>
                        </div>
                    </div>
                </a>


                <div class="block block-rounded block-transparent">
                    <div class="content-side content-side-full">
                        <ul class="nav-main">
                            <li>
                                <a href="{{url('')}}"><i class="si si-home"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                            </li>
                            <li class="nav-main-heading"><span class="sidebar-mini-visible">UI</span><span class="sidebar-mini-hidden">Menu Utama</span></li>
                            <li>
                                <a href="{{url('pasien')}}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Pasien</span></a>
                            </li>
                            <li>
                                <a href="{{url('igd')}}"><i class="si si-cup"></i><span class="sidebar-mini-hide">IGD</span></a>
                            </li>
                            <li>
                                <a href="{{url('rawatinap')}}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Rawat Inap</span></a>
                            </li>
                            <li>
                                <a href="{{url('rawatjalan')}}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Rawat Jalan</span></a>
                            </li>
                            {{--<li>
                                <a href="{{url('')}}"><i class="fa fa-angle-double-down"></i><span class="sidebar-mini-hide">Menu Lainnya</span></a>
                            </li>
                            <li class="nav-main-heading"><span class="sidebar-mini-visible">UI</span><span class="sidebar-mini-hidden">Arsip</span></li>
                            <li>
                                <a href="{{url('')}}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Arsip Kasus</span></a>
                            </li>
                            <li>
                                <a href="{{url('')}}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Log Book</span></a>
                            </li>
                            <li>
                                <a href="{{url('')}}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Gaji & Jasa Medis</span></a>
                            </li> --}}
                            
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Updates -->
            <div class="col-lg-4 col-xl-6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="block">
                            <ul class="nav nav-tabs  nav-tabs-alt nav-justified" data-toggle="tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#kasus-rawatinap">Rawat Inap</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#kasus-poliklinik">Poliklinik</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#kasus-igd">IGD</a>
                                </li>
                            </ul>
                            <div class="block-content tab-content overflow-hidden">
                                <div class="tab-pane fade fade-left show active" id="kasus-rawatinap" role="tabpanel">
                                    <ul class="nav-users pull-all nav-users-big">
                                        @php $i = 0 @endphp
                                        @foreach($kasus as $item)
                                        @if($item->transaksi_global_detail->modul_id == 3)
                                        <li>
                                            <a href="{{url('kasus')}}/{{$item->nomor_kasus}}">
                                                <img class="img-avatar" src="{{asset($item->identitas->avatar_thumb)}}" alt="">
                                                {{$item->identitas->nama}}
                                                <div class="font-w400 font-size-xs text-muted">{{$item->identitas->gender}}, {{$item->identitas->age}} Tahun</div>
                                                <div class="font-w400 font-size-xs text-muted">RM : {{$item->pasien_id}} || {{$item->transaksi_global_detail->modul->name}}</div>
                                            </a>
                                        </li>
                                        @php $i = 1 @endphp
                                        @endif
                                        @endforeach

                                        @if($i == 0)
                                        <div class="col-12 text-center py-50">
                                            <h4 class="font-w400 mb-5">Belum ada kasus untuk Rawat Inap</h4>

                                        </div>
                                        @endif
                                    </ul>
                                    @if($i==0)
                                    <p class="text-center">
                                        <a class="link-effect" href="javascript:void(0)" data-toggle="modal" data-target="#modal-how-to-kasus">Bagaimana cara mendapatkan kasus?</a>
                                    </p>
                                    @endif
                                </div>
                                <div class="tab-pane fade fade-left" id="kasus-poliklinik" role="tabpanel">
                                    <ul class="nav-users pull-all nav-users-big">
                                        @php $i = 0 @endphp
                                        @foreach($kasus as $item)
                                        @if($item->transaksi_global_detail->modul_id == 2)
                                        <li>
                                            <a href="{{url('kasus')}}/{{$item->nomor_kasus}}">
                                                <img class="img-avatar" src="{{asset($item->identitas->avatar_thumb)}}" alt="">
                                                {{$item->identitas->nama}}
                                                <div class="font-w400 font-size-xs text-muted">{{$item->identitas->gender}}, {{$item->identitas->age}} Tahun</div>
                                                <div class="font-w400 font-size-xs text-muted">RM : {{$item->pasien_id}} || {{$item->transaksi_global_detail->modul->name}}</div>
                                            </a>
                                        </li>
                                        @php $i = 1 @endphp
                                        @endif
                                        @endforeach

                                        @if($i == 0)
                                        <div class="col-12 text-center py-50">
                                            <h4 class="font-w400 mb-5">Belum ada kasus untuk Rawat Jalan</h4>
                                        </div>
                                        @endif
                                    </ul>
                                    @if($i==0)
                                    <p class="text-center">
                                        <a class="link-effect" href="javascript:void(0)" data-toggle="modal" data-target="#modal-how-to-kasus">Bagaimana cara mendapatkan kasus?</a>
                                    </p>
                                    @endif
                                </div>
                                <div class="tab-pane fade fade-left" id="kasus-igd" role="tabpanel">
                                    <ul class="nav-users pull-all nav-users-big">
                                        @php $i = 0 @endphp
                                        @foreach($kasus as $item)
                                        @if($item->transaksi_global_detail->modul_id == 8)
                                        <li>
                                            <a href="{{url('kasus')}}/{{$item->nomor_kasus}}">
                                                <img class="img-avatar" src="{{asset($item->identitas->avatar_thumb)}}" alt="">
                                                {{$item->identitas->nama}}
                                                <div class="font-w400 font-size-xs text-muted">{{$item->identitas->gender}}, {{$item->identitas->age}} Tahun</div>
                                                <div class="font-w400 font-size-xs text-muted">RM : {{$item->pasien_id}} || {{$item->transaksi_global_detail->modul->name}}</div>
                                            </a>
                                        </li>
                                        @php $i = 1 @endphp
                                        @endif
                                        @endforeach

                                        @if($i == 0)
                                        <div class="col-12 text-center py-50">
                                            <h4 class="font-w400 mb-5">Belum ada kasus untuk IGD</h4>
                                        </div>
                                        @endif
                                    </ul>
                                    @if($i==0)
                                    <p class="text-center">
                                        <a class="link-effect" href="javascript:void(0)" data-toggle="modal" data-target="#modal-how-to-kasus">Bagaimana cara mendapatkan kasus?</a>
                                    </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Updates -->

            <!-- Extra -->
            <div class="col-lg-4 col-xl-3">
                {{--<!--
                <div class="js-slider slick-nav-black slick-nav-hover" data-dots="true" data-autoplay="true" data-arrows="true">
                    <div class="block text-center bg-white mb-0">
                        <div class="block-content block-content-full bg-success-light">
                            <i class="fa fa-stethoscope fa-5x text-success"></i>
                        </div>
                        <div class="block-content block-content-full block-content-sm bg-success">
                            <div class="font-size-h3 font-w400 text-white">Poli Umum</div>
                            <div class="text-white-op mb-10">Pukul 08.00</div>
                            <div class="mb-10"><a href="/poli" class="btn btn-alt-success">Menuju Poli</a></div>
                        </div>
                    </div>
                    <div class="block text-center bg-white mb-0">
                        <div class="block-content block-content-full bg-primary-lighter">
                            <i class="fa fa-files-o fa-5x text-primary"></i>
                        </div>
                        <div class="block-content block-content-full block-content-sm bg-primary">
                            <div class="font-size-h3 font-w400 text-white">Jadwal Operasi</div>
                            <div class="text-white-op mb-10">5 Ronde</div>
                            <div class="mb-10"><a href="/poli" class="btn btn-alt-info">Menuju Kamar Operasi</a></div>
                        </div>
                    </div>
                    <div class="block text-center bg-white mb-0">
                        <div class="block-content block-content-full bg-danger-light">
                            <i class="fa fa-server fa-5x text-danger"></i>
                        </div>
                        <div class="block-content block-content-full block-content-sm bg-danger">
                            <div class="font-size-h3 font-w400 text-white">IGD</div>
                            <div class="text-white-op mb-10">5 Pasien</div>
                            <div class="mb-10"><a href="/poli" class="btn btn-alt-danger">Menuju IGD</a></div>
                        </div>
                    </div>
                </div>-->
                <div class="block">
                    <div class="block-header">
                        <h3 class="block-title">
                            Kasus <small>Bulan ini</small>
                        </h3>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="pull-all">
                            <!-- Lines Chart Container -->
                            <canvas class="js-chartjs-dashboard-lines"></canvas>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="row items-push">
                            <div class="col-6 text-center">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">Kasus Baru <br>Bulan Ini</div>
                                <div class="font-size-h4 font-w600">720</div>
                                <div class="font-w600 text-success">
                                    <i class="fa fa-caret-up"></i> +16%
                                </div>
                            </div>
                            <div class="col-6 text-center">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">Rata Rata <br>Setiap Bulan</div>
                                <div class="font-size-h4 font-w600">24.3</div>
                                <div class="font-w600 text-success">
                                    <i class="fa fa-caret-up"></i> +9%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="block block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 text-success">$620</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Pendapatan Bulan Ini</div>
                        </div>
                    </div>
                </a>
                --}}
                <div class="block block-link-shadow">
                    <div class="block-content block-content-full">
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 text-success">{{$stat}}</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Kasus baru bulan ini</div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- END Extra -->
        </div>
    </div>
</main>

<div class="modal fade" id="modal-how-to-kasus" tabindex="-1" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popout" role="document">
        <div class="modal-content">
            <div class="block block-transparent mb-0">
                <div class="block-header">
                    <h3 class="block-title">Cara Mendapatkan Kasus</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content py-20">
                    <ul class="list-group">
                      <li class="list-group-item">1. Membuat kasus melalui IGD</li>
                      <li class="list-group-item">2. Membuat kasus melalui Rawat Jalan</li>
                      <li class="list-group-item">3. User lain menambahkan anda pada kolaborator di kasus</li>
                  </ul>
              </div>
          </div>
    </div>
</div>
</div>


@endsection

@section('js')
<script src="assets/js/pages/be_pages_dashboard.js"></script>
@endsection