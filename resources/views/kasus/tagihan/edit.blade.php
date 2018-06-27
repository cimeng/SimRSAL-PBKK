<div class="modal fade" id="editTagihan" tabindex="-1" role="dialog" aria-labelledby="modal-fromright" aria-hidden="true">
    <div class="modal-dialog modal-dialog-fromright modal-dialog modal-sm" role="document">
        <div class="modal-content">

            <form method="POST" action="{{url('kasus')}}/{{$kasus->nomor_kasus}}/tagihan-detail/edit">
                <div class="block rounded block-transparent mb-0">
                    <div class="block-header ">
                        <h3 class="block-title">Edit Tagihan</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content px-0 row">
                        {{csrf_field()}}
                        <input type="hidden" name="id" id="tagihanEditID">
                        <input type="hidden" name="kasus_id" value="{{$kasus->id}}">
                        <input type="hidden" name="tagihan_id" id="tagihanEditTagihanID" value="{{$tagihan->id}}">
                        <input type="hidden" name="daftar_harga_id" id="tagihanEditDaftarHargaID">

                        <div class="form-group col-md-12">
                            <label>Deskripsi Tagihan</label>
                            <input type="text" id="tagihanEditDesc" class="tagihan-autocomplete-edit form-control form-control-lg"  name="desc" placeholder="Uraian Penagihan" value="" onchange="emptyEditDaftarHargaID()">
                        </div>

                        <div class="form-group col-md-12 ">
                            <label>Harga Satuan</label>
                            <input type="text" class="form-control form-control-lg" onchange="updateEditSubTotal()" id="tagihanEditUnitPrice" name="unit_price" placeholder="Harga Satuan" value="">

                        </div>


                        <div class="form-group col-md-12 ">
                            <label>Jumlah</label>
                            <input type="number" class="form-control form-control-lg" onchange="updateEditSubTotal()" id="tagihanEditQty" name="qty" placeholder="Uraian Penagihan" value="">
                        </div>


                        <div class="form-group col-md-12 ">
                            <label>Sub Total</label>
                            <input type="text" class="form-control form-control-lg"  id="tagihanEditSubTotalMask" placeholder="Total Penagihan" value="" disabled>
                        </div>

                    </div>
                </div>
                <div class="text-center py-10">
                    <button type="submit" class="btn-alt btn-grass">
                        <i class="fa fa-check"></i> Edit Tagihan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

