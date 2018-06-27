
<div class="content pt-0">
	<div class="row">
		<div class="col-lg-12 mb-10">
			<button type="button" class="btn btn-rounded btn-alt-primary min-width-125 float-right" data-toggle="modal" data-target="#permintaanRadiologi"><i class="fa fa-pencil"></i> Permintaan Radiologi</button>
		</div>
		@foreach($penunjangpermintaan as $item)
		<div class="col-lg-12">
			<div class="block">
				<div class="block-content">
					<h4 class="text-info font-w600 badges">
						# 
						@if($item->modul_id == 6) 
							Radiologi
						@else
							Penunjang Lain
						@endif
					</h4>
					<div class="row">
						<div class="col-md-4">
							<p class="mb-0"><strong>Permintaan no. #{{$item->transaksi->id}}:
							</strong></p>
							<ul>
								@foreach($item->transaksi->transaction_detail as $permintaan_item)
									@if($permintaan_item->status == 'ask' || $permintaan_item->status == 'done')
									<li>
										{{$permintaan_item->transactionDetail_service->name}}
									</li>
									@endif
								@endforeach
							</ul>
						</div>
						<div class="col-md-4">
							<p class="mb-0"><strong>Pemeriksaan :</strong></p>
							<ul>
								@foreach($item->transaksi->transaction_detail as $permintaan_item)
									@if($permintaan_item->status != 'ask')
									<li>
										{{$permintaan_item->transactionDetail_service->name}}
									</li>
									@endif
								@endforeach
							</ul>
						</div>
					</div>

					@if($item->transaksi->status)
					<a href="{{url('radiologi/transaksi/periksa')}}/{{$item->transaksi->slug}}" class="btn btn-hero btn-alt-success text-uppercase float-right mt-15">Lihat Hasil Pemeriksaan</a> 
					@endif

					<div class="float-left mr-10">
		                    <img class="img-avatar img-avatar-sm img-avatar-thumb" src="http://localhost/medifyhospital/public/assets/img/avatars/avatar5.jpg" alt="">
	                	</div>
	                	<h6 class="pt-10">
	                		<small class="text-muted">Dibuat Oleh</small><br>
	                		{{$item->creator->name}}<br>
	                		{{date('d F y, H:i', strtotime($item->created_at))}}
	                	</h6>


					<hr>
				</div>
			</div>

			
		</div>
			@endforeach
		
	</div>
</div>