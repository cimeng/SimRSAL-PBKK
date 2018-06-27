<div class="modal fade" id="tambahTagihan" tabindex="-1" role="dialog" aria-labelledby="modal-fromright" aria-hidden="true">
    <div class="modal-dialog modal-dialog-fromright modal-dialog modal-sm" role="document">
        <div class="modal-content">

            <form method="POST" action="{{url('kasus')}}/{{$kasus->nomor_kasus}}/tagihan-detail/create">
                <div class="block rounded block-transparent mb-0">
                    <div class="block-header ">
                        <h3 class="block-title">Tambah Tagihan</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content px-0 row">
                        {{csrf_field()}}
                        <input type="hidden" name="kasus_id" value="{{$kasus->id}}">
                        <input type="hidden" name="tagihan_id" id="tagihanCreateTagihanID" value="{{$tagihan->id}}">
                        <input type="hidden" name="daftar_harga_id" id="tagihanCreateDaftarHargaID">

                        <div class="form-group col-md-12">
                            <label>Deskripsi Tagihan</label>
                            <input type="text" class="tagihan-autocomplete form-control form-control-lg"  name="desc" placeholder="Uraian Penagihan" value="" onchange="emptyDaftarHargaID()">
                        </div>

                        <div class="form-group col-md-12 ">
                            <label>Harga Satuan</label>
                            <input type="text" class="form-control form-control-lg" onchange="updateCreateSubTotal()" id="tagihanCreateUnitPrice" name="unit_price" placeholder="Harga Satuan" value="">

                        </div>


                        <div class="form-group col-md-12 ">
                            <label>Jumlah</label>
                            <input type="number" class="form-control form-control-lg" onchange="updateCreateSubTotal()" id="tagihanCreateQty" name="qty" placeholder="Uraian Penagihan" value="">
                        </div>


                        <div class="form-group col-md-12 ">
                            <label>Sub Total</label>
                            <input type="text" class="form-control form-control-lg"  id="tagihanCreateSubTotalMask" placeholder="Total Penagihan" value="" disabled>
                        </div>

                    </div>
                </div>
                <div class="text-center py-10">
                    <button type="submit" class="btn-alt btn-grass">
                        <i class="fa fa-check"></i> Tambah Tagihan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

