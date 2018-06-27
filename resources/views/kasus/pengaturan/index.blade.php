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
                            <div class="block-content pb-15">
                                <h4 class="my-0">Pengaturan Kasus</h4>
                                <hr class="my-20">
                                <div class="block border">
                                    <div class="block-header">
                                        <h5 class="block-title">Tutup Kasus <small>(Pasien KRS)</small></h5>
                                        <div class="block-options">
                                            <!-- To toggle block's content, just add the following properties to your button: data-toggle="block-option" data-action="content_toggle" -->
                                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                                        </div>
                                    </div>
                                    <div class="block-content pb-10">
                                        @if($kasus->end==0)
                                        <p>Perawatan terhadap pasien selesai. Dan pasien telah pulang. </p><p>Data kasus dapat tetap ditambahkan walaupun kasus telah di tutup. Kasus dapat anda cari melalui fitur arsip kasus yang tersedia pada dashboard anda.</p>
                                        <div class="pb-50">
                                            <button class="btn btn-primary btn-hero float-right" onclick="submitClose()">Tutup Kasus</button>
                                        </div>
                                        @else
                                        <p>Kasus telah ditutup pasien telah dipulangkan</p>
                                        <h5 class="mb-10"><small>Dipulangkan Oleh :</small></h5>
                                        <span class="font-w600 h5 mb-5">{{$kasus->end_by_creator->name}}</span><br>
                                        <span>{{$kasus->end_at_tanggal}}</span><br>
                                        @endif
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



<!--MODAL-->

<form method="POST" action="{{url()->current()}}/tutup-kasus" id="formClose">
    {{csrf_field()}}
</form>



@endsection

@section('js')
<script type="text/javascript">
    function submitClose()
    {
        swal({
          title: 'Tutup Kasus?',
          text: "Anda akan menutup kasus, data tetap bisa anda akses pada arsip.",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Tutup Kasus!',
          confirmButtonClass: 'btn btn-primary ml-10',
          cancelButtonClass: 'btn btn-outline-danger ',
          buttonsStyling: false,
          reverseButtons: true
      }).then((result) => {
          if (result.value) {
            $('#formClose').submit();
        }
    })
  }
</script>

@endsection