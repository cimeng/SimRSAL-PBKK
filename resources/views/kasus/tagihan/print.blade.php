@extends('layouts.main-simple')

@section('content')

<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <!-- Invoice -->

        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">#INV0015</h3>
                <div class="block-options">
                    <!-- Print Page functionality is initialized in Codebase() -> uiHelperPrint() -->
                    <button type="button" class="btn-block-option" onclick="Codebase.helpers('print-page');">
                        <i class="si si-printer"></i> Print Invoice
                    </button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                </div>
            </div>
            <div class="block-content">
                <!-- Invoice Info -->
                <div class="row my-20">
                    <!-- Company Info -->
                    <div class="col-6">
                        <p class="h3">Medify Hospital</p>
                        <address>
                            Jalan Rungkut Madya no.15<br>
                            Rungkut, Surabaya<br>
                            cs@medify.id
                        </address>
                    </div>
                    <!-- END Company Info -->

                    <!-- Client Info -->
                    <div class="col-6 text-right">
                        <p class="h3">{{$kasus->pasien->name}}</p>
                        <address>
                            {{$kasus->pasien->address}}<br>{{$kasus->pasien->alamat_kecamatan->name}}, {{$kasus->pasien->alamat_kota->name}}
                            {{$kasus->pasien->phone}}
                        </address>
                    </div>
                    <!-- END Client Info -->
                </div>
                <!-- END Invoice Info -->

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th>Uraian</th>
                                <th class="text-center" style="width: 20%;">Harga Satuan</th>
                                <th class="text-center" style="width: 10%;">Jumlah</th>
                                <th class="text-center" style="width: 20%;">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tagihan->detail as $detail)
                            <tr>
                                <td class="font-w400">
                                    {{$detail->lokasi}}
                                    <h5 class="mb-5">{{$detail->desc}}</h5>
                                    <span class="mt-5">
                                        {{date('d F y, H:i', strtotime($detail->created_at))}}
                                    </span>
                                </td>
                                <td class="h5 font-w400">Rp <span style="float:right">{{number_format($detail->unit_price,0)}}</span></td>
                                <td class="h5 font-w400 text-center">{{$detail->qty}}</td>
                                <td class="h5 font-w400">Rp <span style="float:right">{{number_format($detail->nominal,0)}}</span>
                                </td>
                                <td class="text-center">

                                    @if($kasus->my_role)
                                    <button type="button" class="btn btn-circle btn-alt-info mr-5 mb-5" onclick="showModalEdit({{$detail->id}})">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-circle btn-alt-danger mr-5 mb-5" onclick="showModalDelete({{$detail->id}})">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    @endif

                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="3">
                                    <h4 class="mb-5 mt-5 pull-right">Total</h4>
                                </td>
                                <td><h4 class="mb-5 mt-5">Rp <span style="float:right">{{number_format($tagihan->total_bill,0)}}</span></h4>
                                </td>
                            </tr>
                            @if($tagihan->total_paid > 0)
                            <tr>
                                <td colspan="3">
                                    <h4 class="mb-0 pull-right">Pembayaran</h4>
                                </td>
                                <td><h4 class="mb-0">Rp <span style="float:right">{{number_format($tagihan->total_paid,0)}}</span></h4>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    @if(!$tagihan->checkout)
                    <form action="{{url()->current()}}/checkout" method="POST" id="tagihanCheckout">
                        {{csrf_field()}}
                        <input type="hidden" name="tagihan_id" value="{{$tagihan->id}}">

                        @if($kasus->my_role)
                        <button class="btn-alt btn-grass text-uppercase mb-10 mb-20 pull-right" type="button" onclick="confirmCheckout()">Checkout</button>
                        @endif
                    </form>
                    @else
                    <button class="btn btn-hero btn-alt-success text-uppercase mb-20 pull-right" disabled><i class="fa fa-check"></i> Telah di Checkout</button>
                    @endif
                </div>
                <!-- END Table -->

                <!-- Footer -->
                <p class="text-muted text-center">Thank you very much for doing business with us. We look forward to working with you again!</p>
                <!-- END Footer -->
            </div>
        </div>
        <!-- END Invoice -->
    </div>
    <!-- END Page Content -->
</main>




@endsection

@section('js')

<script type="text/javascript">
    //window.print()
</script>