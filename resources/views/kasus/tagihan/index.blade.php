@extends('kasus.layouts.main')

@section('title')
{{$kasus->judul_kasus}}  - Penunjang - Kasus
@endsection

@section('content')

<!-- Main Container -->
<main id="main-container">
    @include('kasus.layouts.header')

    <div class="content">
        <div class="row">
            @include('kasus.layouts.sidebar')

            <!-- Updates -->
            <div class="col-lg-9 col-xl-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="block rounded">
                            <div class="block-header">
                                <h3 class="block-title">Tagihan #{{$tagihan->id}}</h3>
                                @if(!$tagihan->checkout)
                                    @if($kasus->my_role)
                                    <button type="button" class="btn-alt btn-rounded btn-primary min-width-125 float-right" data-toggle="modal" onclick="showModalCreate({{$tagihan->id}})" data-target="#tambahTagihan"><i class="fa fa-plus"></i> Tambah Tagihan</button>
                                    @endif
                                @else
                                    <a href="{{url()->current()}}/print" target="_blank" class="btn-alt btn-primary">Print</a>
                                @endif
                            </div>
                            <div class="block-content">

                                @php $i = 0 @endphp
                                @foreach($tagihan->detail as $detail)
                                @php $i = 1 @endphp
                                @endforeach
                                
                                @if($i)
                                <div class="table-responsive">
                                    <table class="table table-striped table-vcenter">
                                        <thead>
                                            <tr>
                                                <th>Uraian</th>
                                                <th class="text-center" style="width: 20%;">Harga Satuan</th>
                                                <th class="text-center" style="width: 10%;">Jumlah</th>
                                                <th class="text-center" style="width: 20%;">Subtotal</th>
                                                <th class="text-center" style="width:150px">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tagihan->detail as $detail)
                                            <tr>
                                                <td class="font-w400">
                                                    {{$detail->lokasi}} - {{$detail->creator->name}}
                                                    <h5 class="mb-5">{{$detail->desc}}</h5>
                                                    <span class="badge badge-primary mt-5">
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
                                                <td></td>
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
                                @else
                                <div class="text-center py-50">
                                    <h4 class="font-w400 mb-5">Belum ada tagihan tersedia</h4>
                                    <p>Klik tombol <b>Tambah Tagihan</b> untuk menambahkan tagihan baru</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Updates -->
        </div>
    </div>
</main>
<!-- END Main Container -->    

@include('kasus.tagihan.create')
@include('kasus.tagihan.edit')
@include('kasus.tagihan.delete')
@endsection

@section('js')

<script type="text/javascript">
    function showModal() {
        $('#modal').modal('show');
    }
</script>

<script type="text/javascript">

    function updateCreateSubTotal()
    {
        var unit_price = $('#tagihanCreateUnitPrice').val();
        var qty = $('#tagihanCreateQty').val();
        var subtotal = unit_price * qty;
        subtotal = numberWithCommas(subtotal);
        $('#tagihanCreateSubTotalMask').val(subtotal);
    }

    const numberWithCommas = (x) => {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function showModalCreate(id)
    {
        var input = $('#tagihanCreateTagihanID').val(id);
    }

    function confirmCheckout()
    {
        swal({
          title: 'Apakah anda yakin untuk checkout?',
          text: "Anda tidak dapat lagi untuk menambahkan tagihan",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Checkout Pasien!',
          confirmButtonClass: 'btn btn-primary ml-10',
          cancelButtonClass: 'btn btn-outline-danger ',
          buttonsStyling: false,
          reverseButtons: true
      }).then((result) => {
          if (result.value) {
            $('#tagihanCheckout').submit();
        }
    })
  }


  var createTagihanLastDesc = '';

  var AutoCompleteCreateTagihan = function() {

    var ListLayanan = {};

    // Init jQuery AutoComplete example, for more examples you can check out https://github.com/Pixabay/jQuery-autoComplete
    var initAutoCompleteIndex = function(){
        // Init autocomplete functionality
        jQuery('.tagihan-autocomplete').autoComplete({
            minChars: 3,
            source: function(term, suggest){
                term = term.toLowerCase();


                $.ajax({
                    url: API_URL+"/keuangan/layanan?keyword="+term,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        data = response.data
                        for (i = 0; i < data.length; i++) {

                            ListLayanan[data[i].name] = data[i];
                            suggestions.push(data[i].name);
                        }
                        suggest(suggestions);
                    },
                    error: function() {
                        alert('error');
                    },
                });

                var suggestions    = [];


            },
            onSelect: function(event, term, item) {
                $("#tagihanCreateUnitPrice").val(ListLayanan[term].harga)
                $("#tagihanCreateQty").val(1);
                $("#tagihanCreateDaftarHargaID").val(ListLayanan[term].id);
                createTagihanLastDesc = ListLayanan[term].name;
                updateCreateSubTotal()
            }
        });
    };

    return {
        init: function () {
            // Init jQuery AutoComplete example
            initAutoCompleteIndex();
        }
    };
}();

jQuery( function() {
    AutoCompleteCreateTagihan.init();
});

function emptyDaftarHargaID()
{
    var current_desc = $(".tagihan-autocomplete").val();

    if(current_desc !== createTagihanLastDesc)
    {
        $("#tagihanCreateDaftarHargaID").val('');
    }
}


</script>


<script type="text/javascript">

    function updateEditSubTotal()
    {
        var unit_price = $('#tagihanEditUnitPrice').val();
        var qty = $('#tagihanEditQty').val();
        var subtotal = unit_price * qty;
        subtotal = numberWithCommas(subtotal);
        $('#tagihanEditSubTotalMask').val(subtotal);
    }


    function showModalEdit(id)
    {
        $('#editTagihan').modal('show');
        $.ajax({
            url: API_URL+"/kasus/{{$kasus->nomor_kasus}}/tagihan/detail/"+id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#tagihanEditID').val(response.id);
                $('#tagihanEditDesc').val(response.desc);
                $('#tagihanEditUnitPrice').val(response.unit_price);
                $('#tagihanEditQty').val(response.qty);
                $('#tagihanEditSubTotalMask').val(response.nominal);
            },
            error: function() {
                alert('error');
            },
        });

    }

    var editTagihanLastDesc = '';

    var AutoCompleteEditTagihan = function() 
    {

        var ListLayanan = {};

        var initAutoComplete = function(){
            jQuery('.tagihan-autocomplete-edit').autoComplete({
                minChars: 3,
                source: function(term, suggest){
                    term = term.toLowerCase();


                    $.ajax({
                        url: API_URL+"/keuangan/layanan?keyword="+term,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            data = response.data
                            for (i = 0; i < data.length; i++) {

                                ListLayanan[data[i].name] = data[i];
                                suggestions.push(data[i].name);
                            }
                            suggest(suggestions);
                        },
                        error: function() {
                            alert('error');
                        },
                    });

                    var suggestions    = [];


                },
                onSelect: function(event, term, item) {
                    $("#tagihanEditUnitPrice").val(ListLayanan[term].harga)
                    $("#tagihanEditQty").val(1);
                    $("#tagihanEditDaftarHargaID").val(ListLayanan[term].id);
                    editTagihanLastDesc = ListLayanan[term].name;
                    updateEditSubTotal()
                }
            });
        };

        return {
            init: function () {
                initAutoComplete();
            }
        };
    }();

    jQuery( function() {
        AutoCompleteEditTagihan.init();
    });

    function emptyDaftarHargaID()
    {
        var edit_current_desc = $(".tagihan-autocomplete-edit").val();

        if(edit_current_desc !== editTagihanLastDesc)
        {
            $("#tagihanCreateDaftarHargaID").val('');
        }
    }


    function showModalDelete(id)
    {
        $('#tagihanDeleteID').val(id)
        $('#tagihanModalDelete').modal('show');
    }


</script>

@endsection