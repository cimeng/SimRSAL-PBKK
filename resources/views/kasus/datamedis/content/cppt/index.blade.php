
<div class="content pt-0">

    <div class="row">
		<div class="col-lg-12 mb-20">
            @if($kasus->my_role)
			<button type="button" class="btn-alt btn-primary min-width-125 float-right" data-toggle="modal" data-target="#modal-create-cppt"><i class="fa fa-pencil"></i> Buat CPPT</button>
            @endif
		</div>


        <?php $i = sizeof($cppts); ?>
        @forelse ($cppts as $cppt)

        <div class="col-md-12">
            <div class="block block-bordered {{ $i != sizeof($cppts) ? 'block-mode-hidden' : ''}}">
                <div class="block-header block-header-default">
                    <h3 class="block-title">CPPT {{ $i }}</h3>

                    @if($kasus->my_role)
                    <button type="button" class="btn-block-option" data-toggle="tooltip" data-placement="top" title="Print" onclick="cpptPrint({{$cppt->id}})">
                        <i class="si si-printer"></i>
                    </button>

                    <button type="button" class="btn-block-option " data-toggle="tooltip" data-placement="top" title="Hapus" onclick="cpptDeleteModal({{$cppt->id}},{{$i}})">
                        <i class="si si-trash"></i>
                    </button>

                    <button type="button" class="btn-block-option" data-toggle="tooltip" data-placement="top" title="Edit" onclick="cpptEditModal({{$cppt->id}},{{$i}})">
                        <i class="si si-pencil"></i>
                    </button>
                    @endif

                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                    </div>
                </div>
                <div class="block-content soap-item" id="cppt-item-{{$i}}">
                    <h5 class="font-w400">
                        <small>SUBJECTIVE</small>
                        <br>
                        {{ $cppt->subjective }}
                    </h5>
                    <h5 class="font-w400">
                        <small>OBJECTIVE</small>
                        <br>
                        {{ $cppt->objective }}
                    </h5>
                    <h5 class="font-w400">
                        <small>ASSESSMENT</small>
                        <br>
                        {{ $cppt->assessment }}
                    </h5>
                    <h5 class="font-w400">
                        <small>PLAN</small>
                        <br>
                        {{ $cppt->plan }}
                    </h5>
                    <h5 class="font-w400">
                        <small>INSTRUKSI PPA</small>
                        <br>
                        {{ $cppt->ppa }}
                    </h5>
                    <h6 class="p-10">
                        <small class="text-muted">Dibuat Oleh</small><br>
                        {{ $cppt->creator->name }}<br>
                        <span class="font-w400"> {{ $cppt->tanggal }}</span>
                    </h6>
                </div>
            </div>
        </div>
        <?php $i--; ?>
        @empty
        <div class="col-12 text-center py-50">
            <h4 class="font-w400 mb-5">Belum ada cppt</h4>
            <p>Klik tombol <b>Buat CPPT</b> untuk menambahkan tagihan baru</p>
        </div>
        @endforelse


	</div>
</div>

