<div class="row row-deck items-push js-gallery img-fluid-100" id="penunjangGallery">
    @forelse($penunjang as $item)
    @if($item->file_type == 0)
    <div class="caption" id="caption{{$item->id}}" style="display: none">
        <h4>{{$item->judul}}</h4><p>{{$item->caption}}</p>
    </div>

    <div class="col-xl-4 item-gallery animated fadeIn">
        <div class="options-container">
            <img class="img-fluid options-item" src="{{asset($item->file)}}" alt="">
            <div class="options-overlay bg-black-op-75">
                

                <div class="options-overlay-content">
                    <h3 class="h4 text-white mb-10">{{$item->judul}}</h3>
                    <a class="btn btn-sm btn-rounded btn-alt-info selector" href="{{asset($item->file)}}" data-sub-html="#caption{{$item->id}}">
                        <i class="fa fa-pencil"></i> View
                    </a>
                    <!--
                    <a class="btn btn-sm btn-rounded btn-alt-danger min-width-75" href="javascript:void(0)">
                        <i class="fa fa-times"></i> Edit
                    </a>-->
                </div>
            </div>
        </div>
    </div>
    @elseif($item->file_type == 4)
    <div class="col-xl-4">
        <a class="block block-link-shadow" href="{{$item->file}}">
            <div class="block-content block-content-full">
                <div class="text-center">
                    <div class="mb-20">
                        <i class="fa fa-flask fa-2x text-success"></i>
                    </div>
                    <div class="font-size-h5 font-w600">{{$item->judul}}</div>
                    <div class="font-size-sm font-w600 text-uppercase text-muted">{{$item->type}}</div>
                </div>
            </div>
        </a>
    </div>
    @endif

    @empty
    </div>
    <div class="col-12 text-center py-50">
        <h4 class="font-w400 mb-5">Belum ada permintaan</h4><br>
        <p>Klik tombol <b>Buat Permintaan</b> untuk menambahkan permintaan baru</p>
    </div>
    <div>
    @endforelse

</div>