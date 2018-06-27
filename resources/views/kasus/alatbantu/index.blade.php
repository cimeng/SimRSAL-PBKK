@extends('kasus.layouts.main')

@section('title')
{{$kasus->judul_kasus}}  - Administrasi - Kasus
@endsection

@section('content')

<!-- Main Container -->
<main id="main-container">
    @include('kasus.layouts.header')

    <div class="content">
        <div class="row">
            @include('kasus.layouts.sidebar')

            <!-- Updates -->
            <div class="col-lg-9 col-xl-9">
                <div class="row row-deck">


                        <div class="col-md-4 text-center">
                            <a class="block block-link-pop block-themed" href="{{url()->current()}}/mews">
                                <div class="block-header">
                                    <h3 class="block-title">MEWS</h3>
                                </div>
                                <div class="block-content">
                                    <p class="mt-5 mb-10">
                                        <i class="fa fa-calculator fa-4x "></i>
                                    </p>
                                    <h5 class="mb-5">MEWS</h5>
                                    <p>Modified Early Warning Score (MEWS) adalah skor fisiologis sederhana yang memungkinkan perbaikan kualitas dan keamanan manajemen yang diberikan kepada pasien.</p>
                                </div>
                            </a>
                        </div>


                        <div class="col-md-4 text-center">
                           <a class="block block-link-pop block-themed" href="{{url()->current()}}/apgar">
                            <div class="block-header bg-info">
                                <h3 class="block-title">APGAR</h3>
                            </div>
                            <div class="block-content">
                                <p class="mt-5 mb-10">
                                    <i class="fa fa-calculator fa-4x "></i>
                                </p>
                                <h5 class="mb-5 ">APGAR</h5>
                                <p class="">Penilaian sederhana terhadap bayi, yang menentukan apakah bayi memerlukan penanganan medis atau tidak.</p>
                            </div>
                        </a>
                    </div>


                    <div class="col-md-4 text-center">
                        <a class="block block-link-pop block-themed" href="{{url()->current()}}/poedji">
                            <div class="block-header bg-success">
                                <h3 class="block-title">Poedji Rochjati</h3>
                            </div>
                            <div class="block-content">
                                <p class="mt-5 mb-10">
                                    <i class="fa fa-calculator fa-4x "></i>
                                </p>
                                <h5 class="mb-5">Poedji Rochjati</h5>
                                <p>Penilaian terhadap ibu hamil. Sehingga anda bisa mengetahui resiko ibu hamil, dengan cepat dan mudah.</p>
                            </div>
                        </a>
                    </div>


                </div>
            </div>
            <!-- END Updates -->
        </div>
    </div>
</main>
<!-- END Main Container -->    
@endsection

@section('js')
@endsection