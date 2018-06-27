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
						<button type="button" class="btn btn-rounded btn-alt-primary min-width-125 float-right" data-toggle="modal" data-target="#addModal"><i class="fa fa-pencil"></i> Skor APGAR Baru</button>
						@endif
						<h4>APGAR</h4>
						<hr>
						@php $count = 1 @endphp
						@forelse($apgar as $item)
						<h5 class="mb-5 pl-5">#APGAR {{$count++}}</h5>
						<div class="row">
							<div class="col-md-8">
								<table class="table table-sm table-striped table-borderless table-vcenter" style="width: 100%">
									<thead>
										<tr>
											<th style="width:40%">Parameter</th>
											<th class="text-center" style="width: 35%;">Penilaian</th>
											<th class="text-center" style="width: 25%;">Skor</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Appearance</td>
											<td class="text-center">{{$item->appearance_text}}</td>
											<td class="text-center">{{$item->appearance}}</td>
										</tr>
										<tr>
											<td>Pulse BPM</td>
											<td class="text-center">{{$item->pulse_text}}</td>
											<td class="text-center">{{$item->pulse}}</td>
										</tr>
										<tr>
											<td>Grimace</td>
											<td class="text-center">{{$item->grimace_text}}</td>
											<td class="text-center">{{$item->grimace}}</td>
										</tr>
										<tr>
											<td>Activity</td>
											<td class="text-center">{{$item->activity_text}}</td>
											<td class="text-center">{{$item->activity}}</td>
										</tr>
										<tr>
											<td>Respiration</td>
											<td class="text-center">{{$item->respiration_text}}</td>
											<td class="text-center">{{$item->respiration}}</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-md-4 text-center pt-50">
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
							<h4 class="font-w400 mb-5">Belum ada hasil APGAR tersedia</h4>
							<p>Klik tombol <b>Skor APGAR Baru</b> untuk melakukan penilaian APGAR</p>
						</div>

						@endforelse
					</div>
				</div>
			</div>
			<!-- END Updates -->
		</div>
	</div>
</main>


@include('kasus.alatbantu.apgar.add')
<!-- END Main Container -->    
@endsection

@section('js')
@endsection