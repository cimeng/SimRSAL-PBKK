@extends('kasus.layouts.main')

@section('title')
{{$kasus->judul_kasus}}  - MEWS - Kasus
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
				<div class="block block-bordered">
					<div class="block-content">
						@if($kasus->my_role)
						<button type="button" class="btn btn-rounded btn-alt-primary min-width-125 float-right" data-toggle="modal" data-target="#addModal"><i class="fa fa-pencil"></i> Skor MEWS Baru</button>
						@endif
						<h4>MEWS</h4>
						<hr>
						@php $count = 1 @endphp
						@forelse($mews as $item)
						<h5 class="mb-5 pl-5">#MEWS {{$count++}}</h5>
						<div class="row">
							<div class="col-md-6">
								<table class="table table-sm table-borderless table-vcenter" style="width: 100%">
									<thead>
										<tr>
											<th style="width:40%">Parameter</th>
											<th class="text-center" style="width: 35%;">Penilaian</th>
											<th class="text-center" style="width: 25%;">Skor</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Resp Rate</td>
											<td class="text-center">{{$item->resp_text}}</td>
											<td class="text-center">{{$item->resp}}</td>
										</tr>
										<tr>
											<td>O2 Sat %</td>
											<td class="text-center">{{$item->o2_text}}</td>
											<td class="text-center">{{$item->o2}}</td>
										</tr>
										<tr>
											<td>Any Supl O2</td>
											<td class="text-center">{{$item->suplo2_text}}</td>
											<td class="text-center">{{$item->suplo2}}</td>
										</tr>
										<tr>
											<td>Sys BPmmHg</td>
											<td class="text-center">{{$item->sys_text}}</td>
											<td class="text-center">{{$item->sys}}</td>
										</tr>
										<tr>
											<td>Pulse BPM</td>
											<td class="text-center">{{$item->pulse_text}}</td>
											<td class="text-center">{{$item->pulse}}</td>
										</tr>
										<tr>
											<td>AVPU Score</td>
											<td class="text-center">{{$item->avpu_text}}</td>
											<td class="text-center">{{$item->avpu}}</td>
										</tr>
										<tr>
											<td>Temp Degree Celcius</td>
											<td class="text-center">{{$item->temp_text}}</td>
											<td class="text-center">{{$item->temp}}</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-md-6 text-center pt-50">
								<h3> Skor </h3>
								<h1 class="display-1">{{$item->score}}</h1>
							</div>
						</div>
						<div class="float-left mr-10">
							<img class="img-avatar img-avatar-sm img-avatar-thumb" src="http://localhost/medifyhospital/public/assets/img/avatars/avatar5.jpg" alt="">
						</div>
						<div class="creator">
							<h6 class="pt-10">
								<small class="text-muted">Dibuat Oleh</small><br>
								{{$item->creator->name}}<br>
								{{date('d F y, H:i', strtotime($item->created_at))}}
							</h6>
						</div>

						<hr class="my-20">
						@empty

						<div class="text-center py-50">
							<h4 class="font-w400 mb-5">Belum ada hasil MEWS tersedia</h4>
							<p>Klik tombol <b>Skor MEWS Baru</b> untuk melakukan penilaian NEWS</p>
						</div>

						@endforelse
					</div>
				</div>
			</div>
			<!-- END Updates -->
		</div>
	</div>
</main>


@include('kasus.alatbantu.mews.add')
<!-- END Main Container -->    
@endsection

@section('js')
@endsection