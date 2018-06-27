@extends('pasien.layouts.main')

@section('title')
Pasien - Medify
@endsection

@section('subtitle')
Laporan & Statistik
@endsection

@section('content')
<main id="main-container">
    @include('pasien.layouts.navbar')
    <div class="container">
        <div class="row row-deck">
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header">
                        <h3 class="block-title">
                            PASIEN <small>Hari Ini</small>
                        </h3>
                    </div>
                    <div class="block-content block-content-full bg-body-light text-center">
                        <div class="row gutters-tiny">
                            <div class="col-6">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">TOTAL PASIEN</div>
                                <div class="font-size-h3 font-w600">{{$totalPasien[0]}}</div>
                                @if($totalPasien[1]>0)
                                    <div class="font-w600 text-success">
                                        <i class="fa fa-caret-up"></i> +{{$totalPasien[1]}}%
                                    </div>
                                @elseif($totalPasien[1] == 0)
                                @else
                                    <div class="font-w600 text-danger">
                                        <i class="fa fa-caret-down"></i> {{$totalPasien[1]}}%
                                    </div>
                                @endif
                            </div>
                            <div class="col-6">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">PASIEN BARU</div>
                                 <div class="font-size-h3 font-w600">{{$pasienBaruCount[0]}}</div>
                                @if($pasienBaruCount[1]>0)
                                    <div class="font-w600 text-success">
                                        <i class="fa fa-caret-up"></i> +{{$pasienBaruCount[1]}}%
                                    </div>
                                @elseif($pasienBaruCount[1] == 0)
                                @else
                                    <div class="font-w600 text-danger">
                                        <i class="fa fa-caret-down"></i> {{$pasienBaruCount[1]}}%
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="pull-all">
                            <!-- Lines Chart Container -->
                            <canvas class="js-chartjs-widget-lines"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Kunjungan Pasien</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="js-flot-lines" style="height: 340px;"></div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row row-deck">
            <div class="col-xl-4">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Jenis Pasien</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="js-flot-pie1" style="height: 250px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Pasien Terbaru</h3>
                    </div>
                    <div class="block-content hoverable">
                        @foreach($pasienBaru as $pasien)
                            <a href="{{url('')}}">
                                <div class="row px-10">
                                    <div class="col-2 px-0">
                                        <img class="img-avatar-sm" src="{{asset('')}}/{{$pasien->photo_thumb}}" alt="">
                                    </div>
                                    <div class="col-10 px-0">
                                        {{$pasien->name}}
                                        <div class="font-w400 font-size-xs text-muted">
                                            @if($pasien->gender == 1)
                                                Laki-laki
                                            @else
                                                Perempuan
                                            @endif
                                            , {{$pasien->age}} tahun
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Persebaran Tempat Transaksi</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="js-flot-pie2" style="height: 250px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection


@section('js')

<script type="text/javascript">

        
        var BeCompCharts = function() {
            var initChartsFlot = function(){
                var flotLines = jQuery('.js-flot-lines');
                var flotPie1  = jQuery('.js-flot-pie1');
                var flotPie2  = jQuery('.js-flot-pie2');

                var jalanLine    = [];
                var inapLine    = [];
                var igdLine    = [];


                var dataMonths  = [[1, 'Jan'], [2, 'Feb'], [3, 'Mar'], [4, 'Apr'], [5, 'May'], [6, 'Jun'], [7, 'Jul'], [8, 'Aug'], [9, 'Sep'], [10, 'Oct'], [11, 'Nov'], [12, 'Dec']];

                var dataWeek = [[1, 'Senin'], [2, 'Selasa'], [3, 'Rabu'], [4, 'Kamis'], [5, 'Jumat'], [6, 'Sabtu'], [7, 'Minggu']];

                var color = ['#1abc9c', '#ffca28', '#26c6da', '#9ccc65', '#e67e22', '#2c3e50', '#95a5a6', '#3498db', '#ecf0f1', '#c0392b', '#bdc3c7', '#8e44ad'];

                @foreach($kunjungan[0] as $value)
                    jalanLine.push([{{$value['month']}}, {{$value['transaksi_count']}}]); @endforeach
                console.log(jalanLine);

                @foreach($kunjungan[1] as $value)
                    inapLine.push([{{$value['month']}}, {{$value['transaksi_count']}}]); @endforeach
                console.log(inapLine);

                @foreach($kunjungan[2] as $value)
                    igdLine.push([{{$value['month']}}, {{$value['transaksi_count']}}]); @endforeach
                console.log(igdLine);


                // Init lines chart
                if ( flotLines.length ) {
                    jQuery.plot(flotLines,
                        [
                            {
                                label: 'Rawat Jalan',
                                data: jalanLine,
                                lines: {
                                    show: true,
                                    fill: true,
                                    fillColor: {
                                        colors: [{opacity: .7}, {opacity: .7}]
                                    }
                                },
                                points: {
                                    show: true,
                                    radius: 5
                                }
                            },
                            {
                                label: 'Rawat Inap',
                                data: inapLine,
                                lines: {
                                    show: true,
                                    fill: true,
                                    fillColor: {
                                        colors: [{opacity: .7}, {opacity: .7}]
                                    }
                                },
                                points: {
                                    show: true,
                                    radius: 5
                                }
                            },
                            {
                                label: 'IGD',
                                data: igdLine,
                                lines: {
                                    show: true,
                                    fill: true,
                                    fillColor: {
                                        colors: [{opacity: .7}, {opacity: .7}]
                                    }
                                },
                                points: {
                                    show: true,
                                    radius: 5
                                }
                            }
                        ],
                        {
                            colors: color,
                            legend: {
                                show: true,
                                position: 'nw',
                                backgroundOpacity: 0
                            },
                            grid: {
                                borderWidth: 0,
                                hoverable: true,
                                clickable: true
                            },
                            yaxis: {
                                tickColor: '#ffffff',
                                ticks: 3
                            },
                            xaxis: {
                                ticks: dataMonths,
                                tickColor: '#f5f5f5'
                            }
                        }
                    );

                    // Creating and attaching a tooltip to the classic chart
                    var previousPoint = null, ttlabel = null;
                    flotLines.bind('plothover', function(event, pos, item) {
                        if (item) {
                            if (previousPoint !== item.dataIndex) {
                                previousPoint = item.dataIndex;

                                jQuery('.js-flot-tooltip').remove();
                                var x = item.datapoint[0], y = item.datapoint[1];
    
                                ttlabel = '<strong>' + y + '</strong> Pasien';
                            

                                jQuery('<div class="js-flot-tooltip flot-tooltip">' + ttlabel + '</div>')
                                    .css({top: item.pageY - 45, left: item.pageX + 5}).appendTo("body").show();
                            }
                        }
                        else {
                            jQuery('.js-flot-tooltip').remove();
                            previousPoint = null;
                        }
                    });
                }


                if ( flotPie1.length ) {
                    var array = [], item = {};
                    @foreach($pasienType as $item)
                        @if($item->type == 2)
                            item = {label:'BPJS', data:{{$item->type_count}}}
                        @elseif($item->type == 3)
                            item = {label:'Kerja Sama', data:{{$item->type_count}}}
                        @else
                            item = {label:'Umum', data:{{$item->type_count}}}
                        @endif
                        array.push(item);
                    @endforeach
                    jQuery.plot(flotPie1,
                        array,
                        {
                            colors: color,
                            legend: {show: false},
                            series: {
                                pie: {
                                    show: true,
                                    radius: 1,
                                    label: {
                                        show: true,
                                        radius: 2/3,
                                        formatter: function(label, pieSeries) {
                                            return '<div class="flot-pie-label">' + label + '<br>' + Math.round(pieSeries.percent) + '%</div>';
                                        },
                                        background: {
                                            opacity: .75,
                                            color: '#000000'
                                        }
                                    }
                                }
                            }
                        }
                    );
                }
                //PieChart2
                if ( flotPie2.length ) {
                    var array = [], item = {};
                    
                    item = {label:'Rawat Jalan', data:{{$tempatTransaksi[0]}}}
                    array.push(item);
            
                    item = {label:'Rawat Inap', data:{{$tempatTransaksi[1]}}}
                    array.push(item);
            
                    item = {label:'IGD', data:{{$tempatTransaksi[2]}}}
                    array.push(item);
                    
                    jQuery.plot(flotPie2,
                        array,
                        {
                            colors: color,
                            legend: {show: false},
                            series: {
                                pie: {
                                    show: true,
                                    radius: 1,
                                    label: {
                                        show: true,
                                        radius: 2/3,
                                        formatter: function(label, pieSeries) {
                                            return '<div class="flot-pie-label">' + label + '<br>' + Math.round(pieSeries.percent) + '%</div>';
                                        },
                                        background: {
                                            opacity: .75,
                                            color: '#000000'
                                        }
                                    }
                                }
                            }
                        }
                    );
                }
            };


            return {
                init: function () {
                    // Init Flot Charts
                    initChartsFlot();
                }
            };
        }();
        jQuery(function(){ 
            BeCompCharts.init(); 
        });
</script>

@endsection