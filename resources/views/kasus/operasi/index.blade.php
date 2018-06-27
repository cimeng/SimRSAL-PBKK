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
                            <div class="block-content ">
                                <div class="content pt-0">
                                    <div class="row">
                                        <div class="col-lg-12 mb-10">
                                            @if($kasus->my_role)
                                            <button type="button" class="btn-alt btn-primary min-width-125 float-right" onclick="permintaan()"><i class="fa fa-plus"></i> Permintaan Operasi Baru</button>
                                            <h4>Permintaan Operasi</h4>
                                            @endif
                                        </div>
                                        @forelse($permintaan as $item)
                                        <div class="col-lg-12">
                                            <div class="block">
                                                <div class="block-content">
                                                    <div class="row">
                                                        <div class="col-md-12 mb-10">
                                                            <h5 class="mb-10"><strong>Permintaan no. #{{$item->transaksi_id}}:
                                                            </strong></h5>
                                                            @if(!empty($item->transaksi->jadwal_operasi))
                                                            <label class="mb-0">Tanggal</label>
                                                            <p class="mt-0">{{date('d F Y', strtotime($item->transaksi->jadwal_operasi))}}</p>

                                                            <label class="mb-0">Ruang Operasi</label>
                                                            <p class="mt-0">{{$item->transaksi->ruangan->name}}</p>
                                                            @else
                                                            <span class="badge badge-danger mb-20">Belum Dijadwalkan</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    @if(!empty($item->transaksi->jadwal_operasi))
                                                    <a href="{{url('kamaroperasi/pelaksanaan/')}}/{{$item->transaksi->id}}" target="_blank" class="btn btn-hero btn-alt-success text-uppercase float-right mt-15">Lihat Hasil Operasi</a> 
                                                    @endif

                                                    <div class="float-left mr-10">
                                                        <img class="img-avatar img-avatar-sm img-avatar-thumb" src="http://localhost/medifyhospital/public/assets/img/avatars/avatar5.jpg" alt="">
                                                    </div>
                                                    <h6 class="pt-10">
                                                        <small class="text-muted">Dibuat Oleh</small><br>
                                                        {{$item->creator->name}}<br>
                                                        {{date('d F Y, H:i', strtotime($item->created_at))}}
                                                    </h6>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                        @empty

                                        <div class="col-12 text-center py-50">
                                            <h4 class="font-w400 mb-5">Belum ada Permintaan Operasi</h4>
                                            <p>Klik tombol <b>Permintaan Operasi Baru</b> untuk melakukan permintaan jadwal operasi</p>
                                        </div>
                                        @endforelse

                                    </div>
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
<form method="POST" action="{{url()->current()}}/permintaan" id="formPermintaan">
    {{csrf_field()}}
</form>



<!--MODAL-->




@endsection

@section('js')

<script type="text/javascript">
    function permintaan()
    {
        swal({
          title: 'Permintaan operasi?',
          text: "Anda akan meminta jadwal operasi kepada kamar operasi. Dan anda tidak dapat membatalkan permintaan operasi",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Minta Jadwal Operasi!',
          confirmButtonClass: 'btn btn-primary ml-10',
          cancelButtonClass: 'btn btn-outline-danger ',
          buttonsStyling: false,
          reverseButtons: true
      }).then((result) => {
          if (result.value) {
            $('#formPermintaan').submit();
        }
    })
  }
</script>

@endsection