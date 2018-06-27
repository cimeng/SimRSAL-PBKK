@extends('kasus.layouts.main')

@section('title')
  {{$kasus->judul_kasus}}  - Penunjang - Kasus
@endsection

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
                        <div class="block">
                            <ul class="nav nav-tabs nav-tabs-block nav-justified nav-primary" data-toggle="tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#permintaan">Permintaan Penunjang</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#galeri">Galeri Hasil Penunjang</a>
                                </li>
                               
                            </ul>
                            <div class="block-content tab-content overflow-hidden">
                                <div class="tab-pane fade fade-left show active" id="permintaan" role="tabpanel">
                                    @include('kasus.penunjang.content.permintaan.index')
                                </div>
                                <div class="tab-pane fade fade-left" id="galeri" role="tabpanel">
                                    @include('kasus.penunjang.content.galeri.index')
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


<!--MODAL-->
@include('kasus.penunjang.content.permintaan.create')
@include('kasus.penunjang.content.permintaan.permintaan-labpk')




@endsection

@section('js')

<script type="text/javascript">
    function showModal() {
        $('#modal').modal('show');
    }
</script>
@endsection