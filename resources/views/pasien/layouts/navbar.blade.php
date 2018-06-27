
    <div class="row">
        <div class="col-12">
            <div class="block" style="background-color: #FCFCFD">
                <div class="block-content container pb-10">
                    <a href="{{url('pasien/baru')}}" class="btn btn-outline-primary pull-right">+ Pasien Baru</a>
                    <h4><span class="text-muted font-w400">Pasien / </span> @yield('subtitle')</h4>
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link link-effect active" href="{{url('pasien/list-pasien')}}"><i class="fa fa-tachometer"></i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-effect" href="{{url('pasien/statistik')}}"><i class="fa fa-bar-chart"></i> Laporan & Statistik</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>