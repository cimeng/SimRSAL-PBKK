<div class="card">
    <div class="card-header">
        <h4 class="card-title">Histori Kasus</h4>
    </div>
    <div class="card-body">
        <div class="row row-deck">
            @foreach($kasus as $item)
            <div class="col-lg-4">
                <div class="bd-callout bd-callout-primary">
                    <div class=" mb-20">
                        <a class="link-effect h5" href="{{url('kasus')}}/{{$item->nomor_kasus}}">
                            {{$item->judul_kasus}}
                        </a>
                    </div>
                    <div class="">
                       
                        <i class="fa fa-stethoscope" data-toggle="tooltip" data-placement="left" title="DPJP">
                        </i> 

                        @if(!empty($item->dpjp))
                        {{$item->dpjp_detail->name}}
                        @else
                        -
                        @endif
                    </div>
                    <div class="">
                        <i class="fa fa-medkit" data-toggle="tooltip" data-placement="left" title="Layanan Terakhir"></i> 
                        @if(!empty($item->transaksi_global_detail->modul))
                        {{$item->transaksi_global_detail->modul->name}}
                        @else
                        -
                        @endif
                    </div>
                    <div class="">
                        <i class="fa fa-calendar" data-toggle="tooltip" data-placement="left" title="Tanggal Masuk"></i> 
                        {{ $item->created_at->format('d F Y') }}
                    </div>
                    <br> 

                    
                </div>
            </div>
            @endforeach
            @if(count($kasus) == 0)
                <div class="col-12">
                    <h5 class="font-w400">Pasien ini belum memiliki kasus</h5>
                </div>
            @endif
        </div>
    </div>
</div>