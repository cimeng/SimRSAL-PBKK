
<div class="col-lg-4 col-xl-3">
    <div class="block block-rounded ">
        <div class="non-block-content">
            <div class="list-group push">
                <a class="list-group-item list-group-item-action justify-content-between align-items-center svg @if(empty($sidebar_active)) active @endif" href="{{url('kasus')}}/{{$kasus->nomor_kasus}}">
                    <svg class="icon sm">
                        <use xlink:href="#construction-2" />
                    </svg> 
                    <span class="title">Home</span>
                </a>
                <a class="list-group-item list-group-item-action justify-content-between align-items-center svg @if($sidebar_active == 'datamedis') active @endif" href="{{url('kasus')}}/{{$kasus->nomor_kasus}}/datamedis">
                    <svg class="icon sm">
                        <use xlink:href="#medical-history-1" />
                    </svg> 
                    <span class="title">Data Medis</span>
                </a>
                <a class="list-group-item list-group-item-action justify-content-between align-items-center svg @if($sidebar_active == 'penunjang') active @endif" href="{{url('kasus')}}/{{$kasus->nomor_kasus}}/penunjang">
                    <svg class="icon sm">
                        <use xlink:href="#x-rays" />
                    </svg> 
                    <span class="title">Penunjang</span>
                </a>
                <a class="list-group-item list-group-item-action justify-content-between align-items-center svg @if($sidebar_active == 'operasi') active @endif" href="{{url('kasus')}}/{{$kasus->nomor_kasus}}/operasi">
                    <svg class="icon sm">
                        <use xlink:href="#medical-36" />
                    </svg> 
                    <span class="title">Operasi</span>
                </a>
                <a class="list-group-item list-group-item-action justify-content-between align-items-center svg @if($sidebar_active == 'tagihan') active @endif" href="{{url('kasus')}}/{{$kasus->nomor_kasus}}/tagihan">
                    <svg class="icon sm">
                        <use xlink:href="#budget" />
                    </svg> 
                    <span class="title">Tagihan</span>
                    <span class="badge badge-pill badge-primary"></span>
                </a>
                <a class="list-group-item list-group-item-action justify-content-between align-items-center svg @if($sidebar_active == 'alat') active @endif" href="{{url('kasus')}}/{{$kasus->nomor_kasus}}/alat-bantu">
                    <svg class="icon sm">
                        <use xlink:href="#medical-10" />
                    </svg> 
                    <span class="title">Alat Bantu</span>
                </a>
                @if($kasus->my_role)
                <a class="list-group-item list-group-item-action justify-content-between align-items-center svg @if($sidebar_active == 'administrasi') active @endif" href="{{url('kasus')}}/{{$kasus->nomor_kasus}}/administrasi">
                    <svg class="icon sm">
                        <use xlink:href="#clinic-history" />
                    </svg> 
                    <span class="title">Administrasi</span>
                </a>
                @endif
                <a class="list-group-item list-group-item-action justify-content-between align-items-center svg @if($sidebar_active == 'histori') active @endif" href="{{url('kasus')}}/{{$kasus->nomor_kasus}}/histori">
                    <svg class="icon sm">
                        <use xlink:href="#medical-history-2" />
                    </svg> 
                    <span class="title">Histori Rekam Medis</span>
                </a>

                <a class="list-group-item list-group-item-action justify-content-between align-items-center svg @if($sidebar_active == 'kolaborator') active @endif" href="{{url('kasus')}}/{{$kasus->nomor_kasus}}/kolaborator">
                    <svg class="icon sm">
                        <use xlink:href="#cardiogram" />
                    </svg> 
                    <span class="title">Kolaborator</span>
                </a>
                <a class="list-group-item list-group-item-action justify-content-between align-items-center svg @if($sidebar_active == 'pengaturan') active @endif" href="{{url('kasus')}}/{{$kasus->nomor_kasus}}/pengaturan">
                    <svg class="icon sm">
                        <use xlink:href="#cogwheel" />
                    </svg> 
                    <span class="title">Pengaturan</span>
                </a>

                <!--
                <a class="list-group-item list-group-item-action justify-content-between align-items-center svg " href="{{url('kasus')}}/{{$kasus->nomor_kasus}}/timeline">
                    <svg class="icon sm">
                        <use xlink:href="#cardiogram" />
                    </svg> 
                    <span class="title">Timeline</span>
                </a>


                <a class="list-group-item list-group-item-action justify-content-between align-items-center svg " href="{{url('kasus')}}/{{$kasus->nomor_kasus}}/statistik">
                    <svg class="icon sm">
                        <use xlink:href="#analytics" />
                    </svg> 
                    <span class="title">Statistik</span>
                </a>
                -->
            </div>
        </div>
    </div>
</div>