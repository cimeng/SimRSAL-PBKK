<div class="modal fade" id="modalTambahKolaborator" tabindex="-1" role="dialog" aria-labelledby="modal-fromright" aria-hidden="true">
    <div class="modal-dialog modal-dialog-fromright modal-dialog" role="document">
        <div class="modal-content">
            <div class="block rounded block-transparent mb-0">
                <div class="block-header">
                    <h3 class="block-title">Tambah Kolaborator Baru</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form action="{{url('kasus')}}/{{ $kasus->nomor_kasus }}/kolaborator/create" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="example-input-normal">Cari Pengguna Lain</label>
                            <input type="text" class="form-control" id="inputSearch" name="keyword" placeholder="Cari.." autocomplete="off">
                        </div>
                        <div id="daftarPengguna" style="min-height: 300px;">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>