
<div class="content pt-0">
    <div class="row">
        <div class="col-lg-12 mb-20">
            <button type="button" class="btn btn-rounded btn-alt-primary min-width-125 float-right" data-toggle="modal" data-target="#modal-create-gizi"><i class="fa fa-pencil"></i> Buat Permintaan Makanan Baru</button>
        </div>

        <?php $i = 1; ?>
        @foreach ($orders as $o)

        <div class="col-md-12">
            <div class="block block-bordered">
                <div class="block-content block-header-default">
                    <h5 class="font-w300">Order: {{ $o->id_order }}</h5>
                </div>
                <div class="block-content">
                    <h5 class="font-w300">Diet: {{ $o->diet }}</h5>
                    <h5 class="font-w300">Untuk Tanggal: {{ $o->date_target }}</h5>
                    <div class="soap-item">
                        <div class="float-left mr-10">
                            <img class="img-avatar img-avatar-sm img-avatar-thumb" src="http://localhost/medifyhospital/public/assets/img/avatars/avatar5.jpg" alt="">
                        </div>
                        <h6 class="pt-10">
                            <small class="text-muted">Dibuat Oleh</small><br>
                            Nurse: {{ $o->nurse_name }}<br>
                            Created At: {{ $o->created_at }}
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <?php $i++; ?>
        @endforeach

    </div>
</div>