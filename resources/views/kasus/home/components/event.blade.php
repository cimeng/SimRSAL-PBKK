@if(!empty($operasi))
<div class="col-lg-12">
    <a class="block block-transparent" href="javascript:void(0)">
        <div class="block-content block-content-full bg-info">
            <div class="py-20 text-center">
                <div class="mb-20">
                        <svg class="icon md">
                            <use xlink:href="#medical-36" />
                        </svg> 
                </div>
                <div class="font-size-h3 font-w600 text-white">Operasi</div>
                <div class="font-size-sm font-w600 text-uppercase text-warning-light">{{$operasi->diff}} Hari Lagi, {{$operasi->ruangan->name}} - Ronde {{$operasi->nomor_ronde}}</div>
            </div>
        </div>
    </a>
</div>
@endif