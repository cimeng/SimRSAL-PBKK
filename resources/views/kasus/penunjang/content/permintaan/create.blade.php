<div class="modal fade" id="permintaanRadiologi" tabindex="-1" role="dialog" aria-labelledby="modal-fromright" aria-hidden="true">
    <div class="modal-dialog modal-dialog-fromright modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form method="POST" action="{{url('kasus')}}/{{$kasus->nomor_kasus}}/permintaan-penunjang/create">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header ">
                        <h3 class="block-title">Permintaan Radiologi</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content row">
                        {{csrf_field()}}
                        <input type="hidden" name="kasus_id" value="{{$kasus->id}}">
                        <input type="hidden" name="departemen" value="radiologi">
                        @foreach($radiologi as $item)
                        <div class="col-12">
                            <label class="css-control css-control-primary css-checkbox">
                                <input type="checkbox" class="css-control-input" name="services[]" value="{{$item->id}}">
                                <span class="css-control-indicator"></span>  {{$item->name}} (Rp {{number_format($item->fee,0)}})
                            </label>
                        </div>

                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-alt-success">
                        <i class="fa fa-check"></i> Buat Permintaan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>