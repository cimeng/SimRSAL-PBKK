
<div class="bg-image" style="background-image: url('{{asset('assets/img/bg8.jpg')}}');">
    <div class="bg-black-op-75">
        <div class="content content-full">
            <div class="row gutters-tiny py-20">
                <div class="col-1">
                    <img class="img-avatar img-avatar-thumb" src="{{asset($kasus->pasien->photo_thumb)}}" alt="">
                </div>
                <div class="col-10">
                    <h1 class="h3 font-w700 text-white mb-5">{{$kasus->pasien->name}}</h1>
                    <h2 class="h5 font-w400 text-white-op mb-0">
                        @if($kasus->pasien->gender == 1)
                        Laki laki
                        @else
                        Perempuan
                        @endif
                        , 

                        {{$kasus->pasien->age}} tahun
                    </h2>
                    <h2 class="h5 font-w400 text-white-op mb-0">{{$kasus->transaksi_global_detail->modul->name}} - 
                        {{$kasus->lokasi->lokasi}}
                    </h2>
                    <h2 class="h5 font-w400 text-white-op mb-0">
                        Kelas <span class="uppercase">{{$kasus->kelas}}</span>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>