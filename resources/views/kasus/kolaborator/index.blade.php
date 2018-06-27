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
            <div class="col-lg-4 col-xl-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="block">
                            <div class="block-content ">
                                <div class="content pt-0">
                                    <div class="row">
                                        @if($kasus->my_role)
                                        <div class="col-lg-12 mb-10">
                                            <button type="button" class="btn-alt btn-primary min-width-125 float-right" data-toggle="modal" data-target="#modalTambahKolaborator"><i class="fa fa-plus"></i> Tambah Kolaborator </button>
                                            <h4>Kolaborator Kasus</h4>
                                        </div>
                                        @endif

                                    </div>
                                    <div class="row">
                                        @forelse($kolaborator as $item)
                                        <div class="col-md-6">
                                            <div class="block border">
                                                <div class="block-content block-content-full clearfix">

                                                    @if($kasus->my_role)
                                                    @if(!$item->admin)
                                                    <button type="button" class="btn btn-sm btn-circle btn-alt-danger mr-5 mb-5 float-right" onclick="removeKolaborator({{$item->id}})" data-toggle="tooltip" data-placement="top" title="Hapus">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                    @endif

                                                    @if(!$item->admin && $item->user->profesi == 1 && $kasus->my_role->admin==1)

                                                    <button type="button" class="btn btn-sm btn-circle btn-alt-info mr-5 mb-5 float-right" onclick="beAdmin({{$item->user_id}})" data-toggle="tooltip" data-placement="top" title="Jadikan DPJP">
                                                        <i class="fa fa-user-md"></i>
                                                    </button>
                                                    @endif
                                                    @endif

                                                    <div class="float-left mr-10">
                                                        <img class="img-avatar" src="{{url('')}}/{{$item->user->avatar_thumb}}" alt="">
                                                    </div>

                                                    <div class="text-left mt-10 ">
                                                        <div class="font-w600 mb-5">{{$item->user->name}}</div>
                                                        <div class="font-size-sm text-muted">{{$item->user->profesi_detail->title}} 

                                                            @if($item->admin)<span class="badge badge-primary">DPJP</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @empty

                                        <div class="col-12 text-center py-50">
                                            <h4 class="font-w400 mb-5">Belum ada Kolaborator</h4>
                                            <p>Klik tombol <b>Tambah Kolaborator</b> untuk menambah kolaborator pada kasus ini</p>
                                        </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- END Main Container -->    
<form method="POST" action="{{url()->current()}}/delete" id="formDelete">
    {{csrf_field()}}
    <input type="hidden" id="inputDeleteUserID" name="id">
</form>


<form method="POST" action="{{url()->current()}}/admin" id="formAdmin">
    {{csrf_field()}}
    <input type="hidden" id="inputAdminUserID" name="id">
</form>



<!--MODAL-->
@include('kasus.kolaborator.create-modal')



@endsection

@section('js')

<script type="text/javascript">


    var timer = null;
    $('#inputSearch').keyup(function() {
        if (timer) {
            clearTimeout(timer);
        }
        timer = setTimeout(function() {
            searchUser();
        }, 500);
    });


    function removeKolaborator(id)
    {
        swal({
            title: 'Hapus Kolaborator?',
            text: "Anda akan menghapus kolaborator dari kasus ini. Apakah anda yakin?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            confirmButtonClass: 'btn btn-primary ml-10',
            cancelButtonClass: 'btn btn-outline-danger ',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $('#inputDeleteUserID').val(id);
                $('#formDelete').submit();
            }
        })
    }


    function beAdmin(id)
    {
        swal({
            title: 'Jadikan DPJP?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            confirmButtonClass: 'btn btn-primary ml-10',
            cancelButtonClass: 'btn btn-outline-danger ',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $('#inputAdminUserID').val(id);
                $('#formAdmin').submit();
            }
        })
    }

    function searchUser()
    {
        $('#loading-top').fadeIn();
        keyword = $('#inputSearch').val();

        $.ajax({
            url: API_URL + '/kasus/{{$kasus->nomor_kasus}}/kolaborator/user/search?keyword='+ keyword,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#daftarPengguna').empty()
                $.each(data, function(i) {
                    content = '<div class="block border mb-0"><div class="block-content py-20">'

                    if(data[i].invited == 0)
                    {
                        content+= '<button type="button" class="btn btn-primary mr-5 mb-5 float-right" onclick="buttonClickUser('+data[i].id+')" id="buttonInvite'+data[i].id+'">Undang Rekan</button>'
                        content+= '<button type="button" class="btn btn-info mr-5 mb-5 float-right done-undang" style="display:none" id="buttonInviteDisabled'+data[i].id+'" disabled><i class="fa fa-check"></i> Telah Diundang</button>'
                    }
                    else
                    {
                        content+= '<button type="button" class="btn btn-info mr-5 mb-5 float-right done-undang" id="buttonInviteDisabled'+data[i].id+'" disabled><i class="fa fa-check"></i> Telah Diundang</button>'
                        content+= '<button type="button" class="btn btn-primary mr-5 mb-5 float-right" style="display:none" onclick="buttonClickUser('+data[i].id+')" id="buttonInvite'+data[i].id+'">Undang Rekan</button>'
                    }
                    

                    content+= ' <div class="float-left mr-10"><img class="img-avatar" src="{{url('')}}/'+data[i].avatar_thumb+'" alt=""></div>'
                    content+= '<div class="text-left mt-10 "><div class="font-w600 mb-5">'+data[i].name+'</div><div class="font-size-sm text-muted">'+data[i].profesi_detail.title+'</div></div>'
                    content+='</div></div>'
                    $('#daftarPengguna').append(content)
                });

            },
            error: function() {
                alert('error');
            },
        });
        $('#loading-top').fadeOut();
    }

    searchUser();

    function buttonClickUser(id)
    {
        $('#loading-top').fadeIn();
        $.ajax({
            type: "POST",
            url: API_URL + '/kasus/{{$kasus->nomor_kasus}}/kolaborator/create',
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                user_id : id
            },
            success: function (data) {
                $('#buttonInvite'+id).hide();
                $('#buttonInviteDisabled'+id).show();

            },
            error: function () {
                callSwal('error','Terjadi Kesalahan','Silahkan Coba Lagi',0);
            }
        });
        $('#loading-top').fadeOut();
    }
</script>

@endsection