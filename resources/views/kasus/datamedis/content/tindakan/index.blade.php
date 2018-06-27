
<div class="content pt-0">
    <div class="row">
        <div class="col-lg-12 mb-20">
            @if($kasus->my_role)
            <button type="button" class="btn-alt btn-primary min-width-125 float-right" data-toggle="modal" data-target="#modal-create-tindakan"><i class="fa fa-pencil"></i> Buat Tindakan</button>
            @endif
        </div>

        <?php $i = 1; ?>
        @forelse ($tindakan as $t)

        <div class="col-md-12">
            <div class="block">
                <div class="block-content p-0">
                    <div class="row"> 
                        <div class="col-md-8"> 

                            @if($kasus->my_role)
                            <button type="button" class="btn btn-sm btn-circle btn-outline-info mr-5 mb-5 float-right" onclick="tindakanEditModal({{$t->id}})">
                                <i class="fa fa-pencil"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-circle btn-outline-danger mr-5 mb-5 float-right" onclick="tindakanDeleteModal({{$t->id}})">
                                <i class="fa fa-trash"></i>
                            </button>
                            @endif
                            
                            <h6 class="font-w400 text-muted mb-5">Tindakan</h6>
                            <h5 class=" mb-0"><span class="font-w400">{{ $t->desc}}</span></h5>
                            <h5 class="mb-15"><small class="font-w400">Biaya : Rp {{ number_format($t->price,0) }}</small></h5>
                            <h6>
                                <small class="text-muted">Dibuat Oleh</small><br>
                                {{ $t->creator->name }}
                                <span class="float-right font-w400"><i class="fa fa-clock-o text-muted"></i> {{ $t->tanggal }}</span>
                            </h6>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <?php $i++; ?>
        @empty

        <div class="col-12 text-center py-50">
            <h4 class="font-w400 mb-5">Belum ada tindakan</h4>
            <p>Klik tombol <b>Buat Tindakan</b> untuk menambahkan tagihan baru</p>
        </div>

        @endforelse


    </div>
</div>