

                        
        <div class="row row-deck">
            <div class="row items-push js-gallery img-fluid-100" id="penunjangGallery">
                @foreach($penunjang as $item)
                <div class="caption" id="caption{{$item->id}}" style="display: none">
                    <h4>{{$item->judul}}</h4><p>{{$item->caption}}</p>
                </div>

                <div class="col-xl-3 item-gallery animated fadeIn">
                    <div class="options-container">
                        <img class="img-fluid options-item" src="{{asset($item->file)}}" alt="">
                        <div class="options-overlay bg-black-op-75">


                            <div class="options-overlay-content">
                                <h3 class="h4 text-white mb-10">{{$item->judul}}</h3>
                                <a class="btn btn-sm btn-rounded btn-alt-info selector" href="{{asset($item->file)}}" data-sub-html="#caption{{$item->id}}">
                                    <i class="fa fa-pencil"></i> View
                                </a>
                                <a class="btn btn-sm btn-rounded btn-alt-danger min-width-75" href="javascript:void(0)">
                                    <i class="fa fa-times"></i> Edit
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @if(count($kasus) == 0)
            <div class="col-12">
                <h5 class="font-w400">Pasien ini belum memiliki penunjangGallery</h5>
            </div>
            @endif
        </div>