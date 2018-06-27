
<div class="content pt-0">
    <div class="row">
        <div class="col-lg-12 mb-20">
            @if($kasus->my_role)
            <button type="button" class="btn-alt btn-rounded btn-primary min-width-125 float-right" data-toggle="modal" data-target="#modal-create-resep"><i class="fa fa-pencil"></i> Buat Resep</button>
            @endif
        </div>
    </div>
    <div class="row row-deck">
        @forelse ($resep as $r)
        <div class="col-md-6">
            <div class="block block-rounded block-bordered">
                <div class="block-header block-header-default">
                    <h4 class="block-title font-w600">Resep</h4>

                    @if($kasus->my_role)
                    <button type="button" class="btn-block-option " data-toggle="tooltip" data-placement="top" title="Hapus" onclick="resepDelete({{$r->id}})">
                        <i class="si si-trash"></i>
                    </button>
                    
                    <button type="button" class="btn-block-option" data-toggle="tooltip" data-placement="top" title="Edit" onclick="resepEdit({{$r->id}})">
                        <i class="si si-pencil"></i>
                    </button>

                    <button type="button" class="btn-block-option" data-toggle="tooltip" data-placement="top" title="Print" onclick="resepPrint({{$r->id}})">
                        <i class="si si-printer"></i>
                    </button>
                    @endif


                </div>

                <div class="block-content">

                    @foreach ( $r->resepDetail as $resepDetail )

                    <span class="text-muted font-w400"> {{ $resepDetail->type }} </span>
                    @if($resepDetail->kategori == 'racikan')
                    <h6 class="font-w600 mb-5" style="white-space: pre;">{{ $resepDetail->racikan }} </h6>
                    @else
                    <h6 class="font-w600 mb-5 mt-5"> {{ $resepDetail->obat_name }} </h6>
                    @endif
                    <span>Jumlah : {{ $resepDetail->jumlah }}</span><br>
                    <span>Aturan : {{ $resepDetail->aturan }}</span>
                    <hr>

                    @endforeach

                    <h6 class="pt-10">
                        <small class="text-muted">Dibuat Oleh</small><br>
                        <span class="float-right"> {{ $r->tanggal }} </span>
                        {{ $r->doctor['name'] }}
                    </h6>

                </div>
            </div>
        </div>
        @empty
        </div>
        <div class="row">
            <div class="col-12 text-center py-50">
                <h4 class="font-w400 mb-5">Belum ada resep</h4><br>
                <p>Klik tombol <b>Buat Resep</b> untuk menambahkan resep baru</p>
            </div>
        </div>
        <div>
        @endforelse

        <!--        <div class="block-content soap-item">-->
            <!--            <div class="float-left mr-10">-->
                <!--                <img class="img-avatar img-avatar-sm img-avatar-thumb" src="http://localhost/medifyhospital/public/assets/img/avatars/avatar5.jpg" alt="">-->
                <!--            </div>-->
                <!--            <h6 class="pt-10">-->
                    <!--                <small class="text-muted">Dibuat Oleh</small>-->
                    <!--                <br>-->
                    <!--                <br>-->
                    <!--            </h6>-->
                    <!--        </div>-->

                </div>
            </div>