
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Identitas Pasien</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <h6 class="text-muted">INFORMASI DASAR</h6>
                <hr>
                <div class="row mb-10">
                    <div class="col-3">
                        <label>Nama</label>
                    </div>
                    <div class="col">
                        {{$identitas->name}}
                    </div>
                </div>
                <div class="row mb-10">
                    <div class="col-3">
                        <label>Jenis Kelamin</label>
                    </div>
                    <div class="col">
                        @if($identitas->gender == 1) Laki laki
                        @else Perempuan
                        @endif
                    </div>
                </div>
                <div class="row mb-10">
                    <div class="col-3">
                        <label>Usia</label>
                    </div>
                    <div class="col">
                        {{$identitas->age}} tahun
                    </div>
                </div>
                <div class="row mb-10">
                    <div class="col-3">
                        <label>Tanggal Lahir</label>
                    </div>
                    <div class="col">
                        {{$identitas->place_of_birth}}, {{date('d F Y', strtotime($identitas->date_of_birth))}}
                    </div>
                </div>
                <div class="row mb-10">
                    <div class="col-3">
                        <label>Status Pernikahan</label>
                    </div>
                    <div class="col">
                        @if($identitas->marriage == 1 ) Single
                        @elseif($identitas->marriage == 2 ) Menikah
                        @elseif($identitas->marriage == 3 ) Duda/Janda
                        @else -
                        @endif
                    </div>
                </div>
                <div class="row mb-10">
                    <div class="col-3">
                        <label>Pekerjaan</label>
                    </div>
                    <div class="col">
                        {{$identitas->job}}
                    </div>
                </div>

                <div class="row mb-10">
                    <div class="col-3">
                        <label>No KTP</label>
                    </div>
                    <div class="col">
                        {{$identitas->ktp}}
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div>
                    <h6 class="text-muted">INFORMASI KONTAK</h6>
                    <hr>
                    <div class="row mb-10">
                        <div class="col-3">
                            <label>Alamat</label>
                        </div>
                        <div class="col">
                            {{$identitas->address}}, 
                            @if(!empty($identitas->alamat_kecamatan))
                            {{$identitas->alamat_kecamatan->name}}, {{$identitas->alamat_kota->name}} 
                            @endif
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-3">
                            <label>No HP</label>
                        </div>
                        <div class="col">
                            {{$identitas->phone}}
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="row mt-20">
            <div class="col-6">
                <div class="mt-20">
                    <h6 class="text-muted">INFORMASI PEMBAYARAN</h6>
                    <hr>
                    <div class="row mb-10">
                        <div class="col-3">
                            <label>Jenis Pasien</label>
                        </div>
                        <div class="col">
                            @if($identitas->type==1) Umum
                            @elseif($identitas->type==2) Anggota TNI
                            @elseif($identitas->type==3) Kerjasama
                            @endif
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-3">
                            <label>Kelas Pelayanan</label>
                        </div>
                        <div class="col">
                            <span class="uppercase">{{$identitas->treatment_class}}</span>
                        </div>
                    </div>

                    @if($identitas->type!=3)
                    <div class="row mb-10">
                        <div class="col-3">
                            <label>Asuransi</label>
                        </div>
                        <div class="col">
                            @if(!empty($identitas->pasien_asuransi))
                            {{$identitas->pasien_asuransi->company->name}} <br>
                            Nomor : {{$identitas->pasien_asuransi->number}}
                            @else
                            -
                            @endif
                        </div>
                    </div>
                    @else
                    <div class="row mb-10">
                        <div class="col-3">
                            <label>Kerjasama</label>
                        </div>
                        <div class="col">
                            @if(!empty($identitas->pasien_kerjasama))
                            {{$identitas->pasien_kerjasama->company->name}}<br>
                            Nomor : {{$identitas->pasien_kerjasama->number}}
                            @else
                            <p>-</p>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-6">
                <div class="mt-20">
                    <a href="{{url()->current()}}/edit/kerabat" class="btn btn-warning pull-right"><i class="fa fa-pencil"></i> Ubah</a>
                    <h6 class="text-muted">INFORMASI PENANGGUNG JAWAB</h6>
                    <hr>
                    @if(!empty($identitas->relatives_id) && !empty($identitas->wali->name) )
                    <div class="row mb-10">
                        <div class="col-3">
                            <label>Nama</label>
                        </div>
                        <div class="col">
                            {{$identitas->wali->name}}
                        </div>
                    </div>


                    <div class="row mb-10">
                        <div class="col-3">
                            <label>Jenis Kelamin</label>
                        </div>
                        <div class="col">
                        @if($identitas->wali->gender) Laki laki
                        @else Perempuan
                        @endif
                        </div>
                    </div>


                    <div class="row mb-10">
                        <div class="col-3">
                            <label>Tanggal Lahir</label>
                        </div>
                        <div class="col">
                            {{$identitas->wali->birthplace}}, {{date('d F Y', strtotime($identitas->wali->birthdate))}}
                        </div>
                    </div>


                    <div class="row mb-10">
                        <div class="col-3">
                            <label>Alamat</label>
                        </div>
                        <div class="col">
                            {{$identitas->wali->address}}, 
                            @if(!empty($identitas->wali->alamat_kecamatan))
                            {{$identitas->wali->alamat_kecamatan->name}}, {{$identitas->wali->alamat_kota->name}} 
                            @endif
                        </div>
                    </div>


                    <div class="row mb-10">
                        <div class="col-3">
                            <label>No HP</label>
                        </div>
                        <div class="col">
                            {{$identitas->wali->phone}}
                        </div>
                    </div>

                    <div class="row mb-10">
                        <div class="col-3">
                            <label>Hubungan</label>
                        </div>
                        <div class="col">
                            @if($identitas->relatives_type == 1) Pasangan
                            @elseif($identitas->relatives_type == 2) Orang Tua
                            @elseif($identitas->relatives_type == 3) Anak
                            @elseif($identitas->relatives_type == 4) Saudara                                    
                            @else  Kerabat
                            @endif
                        </div>
                    </div>
                    @else
                    <div class="text-center">
                        Pasien tidak memiliki penanggung jawab pembayaran
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>