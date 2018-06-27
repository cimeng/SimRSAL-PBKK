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
				<div class="block">
					<div class="block-content">
						@if($kasus->my_role)
						<button type="button" class="btn btn-rounded btn-alt-primary min-width-125 float-right" data-toggle="modal" data-target="#addModal"><i class="fa fa-pencil"></i> Skor Poedji Baru</button>
						@endif
						<h4>Poedji</h4>
						<hr>@php $count = 1 @endphp
						@forelse($poedji as $item)

						<div class="block block-bordered @if($count != 1)  block-mode-hidden @endif">
							<div class="block-header block-header-default">
								<h3 class="block-title">Poedji {{$count++}} - Triwulan {{$item->triwulan}}</h3>
								<div class="block-options">
									<button type="button" class="btn-block-option" data-toggle="tooltip" title="Edit" onclick="showModal()">
										<i class="si si-pencil"></i>
									</button>
									<button type="button" class="btn-block-option js-swal-confirm" data-toggle="tooltip" title="Delete"  >
										<i class="si si-trash"></i>
									</button>
									<button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-down"></i></button>
								</div>
							</div>
							<div class="block-content">
								<div class="row">
									<div class="col-md-6">
										<table class="table table-sm table-vcenter" style="width: 100%">
											<thead>
												<tr>
													<th style="width:40%">Parameter</th>
													<th class="text-center" style="width: 35%;">Skor</th>
												</tr>
											</thead>
											<tbody>
												@foreach($item->result as $tmp )
												@if($tmp->flag)
												<tr class="table-primary">
													@else
													<tr>
														@endif
														<td class="text-left">{{$tmp->parameter}}</td>
														<td class="text-center">{{$tmp->score}}</td>
													</tr>	
													@endforeach
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
								</div>
							</div>
							@empty

							<div class="text-center py-50">
								<h4 class="font-w400 mb-5">Belum ada hasil Poedji Rochjati tersedia</h4>
								<p>Klik tombol <b>Skor Poedji Rochjati Baru</b> untuk melakukan penilaian Poedji Rochjati</p>
							</div>

							@endforelse
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>


	@include('kasus.alatbantu.poedji.add')
	<!-- END Main Container -->    
	@endsection

	@section('js')
	@endsection