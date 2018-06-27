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

                        {{--
                        <div class="col-md-12 alert alert-dark">
                        <h5 class="mb-0">{{$current_transaksi_utama->modul->name}}
                            {{$current_transaksi_utama->id}}</h5>
                        </div>
                        --}}

                        @if($current_transaksi_utama->modul_id != 3)
                        <div class="col-md-4 text-center">
                            <a class="block block-link-pop block-themed" href="{{url()->current()}}/rawatinap/daftar">
                                <div class="block-header">
                                    <h3 class="block-title">Rawat Inap</h3>
                                </div>
                                <div class="block-content">
                                    <p class="mt-5 mb-10">
                                        <i class="fa fa-bed fa-4x "></i>
                                    </p>
                                    <h5 class="mb-5">Daftar Rawat Inap</h5>
                                    <p>Daftarkan pasien untuk di rawat inapkan</p>
                                </div>
                            </a>
                        </div>
                        @endif


                        @if($current_transaksi_utama->modul_id == 3)
                        <div class="col-md-4 text-center">
                           <a class="block block-link-pop block-themed" href="javascript:void(0)" onclick="pindahRawatInap()">
                            <div class="block-header">
                                <h3 class="block-title">Rawat Inap</h3>
                            </div>
                            <div class="block-content">
                                <p class="mt-5 mb-10">
                                    <i class="fa fa-bed fa-4x "></i>
                                </p>
                                <h5 class="mb-5 ">Pindah Ruang Rawat Inap</h5>
                                <p class="">Pasien dapat pindah ke ruangan rawat inap lain.</p>
                            </div>
                        </a>
                    </div>
                    @endif


                    @if($current_transaksi_utama->modul_id == 2)
                    <div class="col-md-4 text-center">
                        <a class="block block-link-pop block-themed" href="{{url()->current()}}/rawatjalan/rujuk">
                            <div class="block-header bg-success">
                                <h3 class="block-title">Rawat Jalan</h3>
                            </div>
                            <div class="block-content">
                                <p class="mt-5 mb-10">
                                    <i class="fa fa-stethoscope fa-4x "></i>
                                </p>
                                <h5 class="mb-5">Rujuk ke Poli Lain</h5>
                                <p>Rujukkan pasien ke poli lain</p>
                            </div>
                        </a>
                    </div>
                    @endif


                    @if($current_transaksi_utama->modul_id == 8)
                    <div class="col-md-4 text-center">
                        <a class="block block-link-pop block-themed" href="{{url()->current()}}/igd/pindah" onclick="">
                            <div class="block-header bg-pulse">
                                <h3 class="block-title">IGD</h3>
                            </div>
                            <div class="block-content">
                                <p class="mt-5 mb-10">
                                    <i class="fa fa-plus fa-4x "></i>
                                </p>
                                <h5 class="mb-5">Pindah Ruangan IGD</h5>
                                <p>Pindahkan pasien ke ruang IGD lain</p>
                            </div>
                        </a>
                    </div>
                    @endif


                    @if($current_transaksi_utama->modul_id == 3 || $current_transaksi_utama->modul_id == 8)
                    <div class="col-md-4 text-center">
                        <a class="block block-link-pop block-themed" href="javascript:void(0)">
                            <div class="block-header bg-warning">
                                <h3 class="block-title">ICU</h3>
                            </div>
                            <div class="block-content">
                                <p class="mt-5 mb-10">
                                    <i class="fa fa-heartbeat fa-4x "></i>
                                </p>
                                <h5 class="mb-5">Rujuk ke ICU</h5>
                                <p>Daftarkan pasien ke ICU untuk mendapatkan perawatan intensif</p>
                            </div>
                        </a>
                    </div>
                    @endif


                    <div class="col-md-4 text-center">
                        <a class="block block-link-pop block-themed" href="javascript:void(0)">
                            <div class="block-header bg-corporate-dark">
                                <h3 class="block-title">Rujuk</h3>
                            </div>
                            <div class="block-content">
                                <p class="mt-5 mb-10">
                                    <i class="fa fa-ambulance fa-4x "></i>
                                </p>
                                <h5 class="mb-5">Rujuk ke Rumah Sakit Lain</h5>
                                <p>Anda akan mendapatkan resume lengkap untuk rumah sakit tujuan.</p>
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
<script type="text/javascript">

    function pindahRawatInap()
    {
        swal({
          title: 'Apakah anda yakin untuk memindahkan pasien ke ruangan lain?',
          text: "Anda tidak dapat mengembalikan pasien ke ruangan sebelumnya",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Pindahkan Pasien!',
          confirmButtonClass: 'btn btn-primary ml-10',
          cancelButtonClass: 'btn btn-outline-danger ',
          buttonsStyling: false,
          reverseButtons: true
      }).then((result) => {
          if (result.value) {
            window.location.href = "{{url()->current()}}/rawatinap/pindah"
        }
    })
  }

</script>
@endsection