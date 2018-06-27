
<div class="content pt-0">
    <div class="row">
        <div class="col-lg-12">
            @if($kasus->my_role)
            <button type="button" class="btn-alt btn-rounded btn-primary min-width-125 pull-right" data-toggle="modal" data-target="#modal-create-lokasi"><i class="fa fa-pencil"></i> Pindahkan Pasien</button>
            @endif
        </div>

        <?php $i = 1; ?>
        @foreach ($lokasi as $l)
        <div class="col-md-8">
            <div class="block">
                <div class="block-content">
                    <h5 class="font-w600">{{ $l->lokasi }} @if($i==1) <small>(Lokasi Saat Ini)</small>  @endif</h5>
                    <p class="font-w300">{{ $l->alasan }}</p>
                    <h6>
                        <small class="text-muted">Dibuat Oleh</small><br>
                        {{ $l->creator->name }}
                        <span class="float-right font-w400"><i class="fa fa-clock-o text-muted"></i> {{ $l->tanggal }}</span>
                    </h6>
                    <hr>
                </div>
            </div>
        </div>
        <?php $i++; ?>
        @endforeach


    </div>
</div>