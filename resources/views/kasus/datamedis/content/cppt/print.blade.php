@extends('layouts.main-simple')

@section('content')

<div class="block-content soap-item">
    <h5 class="font-w400">
        <small>SUBJECTIVE</small>
        <br>
        {{ $cppt->subjective }}
    </h5>
    <h5 class="font-w400">
        <small>OBJECTIVE</small>
        <br>
        {{ $cppt->objective }}
    </h5>
    <h5 class="font-w400">
        <small>ASSESSMENT</small>
        <br>
        {{ $cppt->assessment }}
    </h5>
    <h5 class="font-w400">
        <small>PLAN</small>
        <br>
        {{ $cppt->plan }}
    </h5>
    <h5 class="font-w400">
        <small>INSTRUKSI PPA</small>
        <br>
        {{ $cppt->ppa }}
    </h5>
    <div class="float-left mr-10">
        <img class="img-avatar img-avatar-sm img-avatar-thumb" src="{{asset($cppt->creator->avatar_thumb)}}" alt="">
    </div>
    <h6 class="pt-10">
        <small class="text-muted">Dibuat Oleh</small><br>
        {{ $cppt->creator->name }}
        <span class="float-right">{{ $cppt->tanggal }}</span>
    </h6>
</div>
@endsection

@section('js')

<script type="text/javascript">
    window.print()
</script>