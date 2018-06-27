
<div class="content pt-0">
    <div class="row">
        <div class="col-lg-12 mb-20">
            @if($kasus->my_role)
            <button type="button" class="btn-alt btn-primary min-width-125 float-right" data-toggle="modal" data-target="#modal-create-diagnosis"><i class="fa fa-pencil"></i> Buat Diagnosis</button>
            @endif
        </div>

        <?php $i = 1; ?>
        @forelse ($diagnosis as $d)

        <div class="col-md-12">
            <div class="block">
                <div class="block-content p-0">
                    <div class="row"> 
                        <div class="col-md-8"> 
                            @if($kasus->my_role)
                            <button type="button" class="btn btn-sm btn-circle btn-outline-danger mr-5 mb-5 float-right" onclick="diagnosisDeleteModal({{$d->id}})">
                                <i class="fa fa-trash"></i>
                            </button>
                            @endif
                            
                            @if ($d->utama == 1)
                            <h6 class="font-w400 text-muted mb-5">Diagnosis Utama</h6>
                            @else
                            <h6 class="font-w400 text-muted mb-5">Diagnosis</h6>
                            @endif
                            <h5 class=" mb-15"><span class="font-w600">{{ $d->icd10['code_icd'] }}</span> - <span class="font-w400">{{ $d->icd10['long_desc'] }}</span></h5>
                            <h6>
                                <small class="text-muted">Dibuat Oleh</small><br>
                                {{ $d->creator->name }}
                                <span class="float-right font-w400"><i class="fa fa-clock-o text-muted"></i> {{ $d->tanggal }}</span>
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
            <h4 class="font-w400 mb-5">Belum ada diagnosis</h4>
            <p>Klik tombol <b>Buat Diagnosis</b> untuk menambahkan tagihan baru</p>
        </div>

        @endforelse


    </div>
</div>