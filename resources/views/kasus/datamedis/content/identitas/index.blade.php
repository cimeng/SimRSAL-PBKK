<div class="content pt-0">
	<div class="row">
		<div class="col-lg-12">
			@if($kasus->my_role)
			<button type="button" class="btn-alt btn-primary min-width-125 float-right" data-toggle="modal" data-target="#modal-update-identitas"><i class="fa fa-pencil"></i> Edit Identitas</button>
			@endif
		</div>
		<div class="col-lg-6">
			<h5 class="font-w400"><small>Nama Pasien</small><br> {{$identitas->nama}}</h5>
			<h5 class="font-w400"><small>Jenis Kelamin</small><br> {{ $identitas->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</h5>
			<h5 class="font-w400"><small>Usia</small><br> {{ $identitas->age or '-'}} tahun</h5>
			<h5 class="font-w400"><small>Tempat, Tanggal Lahir</small><br> {{ $identitas->tempat_lahir or '-'}}, {{$identitas->tanggal or '-'}}</h5>
			<h5 class="font-w400"><small>Alamat</small><br> {{ $identitas->alamat or '-'}}</h5>
			<h5 class="font-w400"><small>Status Pernikahan</small><br> {{ $identitas->status == 1 ? 'Menikah' : 'Belum Menikah'}}</h5>
		</div>
		<div class="col-lg-6">
			<h5 class="font-w400"><small>No KTP</small><br> {{ $identitas->no_identitas or '-'}} </h5>
            <h5 class="font-w400"><small>Pekerjaan</small><br> {{ $identitas->pekerjaan or '-'}}</h5>
            <h5 class="font-w400"><small>No HP</small><br> {{ $identitas->no_hp or '-'}}</h5>
            <h5 class="font-w400"><small>Asuransi</small><br> 
            	@if(!empty($identitas->asuransi))
            	{{ $identitas->asuransi }}
            	@else
            	-
            	@endif
            </h5>
			<h5 class="font-w400"><small>No Asuransi</small><br> {{ $identitas->no_asuransi or '-'}}</h5>
			<h5 class="font-w400"><small>Penanggung Jawab</small><br> @if(!empty($kasus->pasien->wali->name))
				{{$kasus->pasien->wali->name}}
			@else
			-
			@endif</h5>
		</div>
		<div class="col-lg-12"><hr></div>
		<div class="col-lg-12">
			@if($kasus->my_role)
			<button type="button" class="btn-alt btn-rounded btn-primary min-width-125 float-right" data-toggle="modal" data-target="#modal-update-identitas-medis"><i class="fa fa-pencil"></i> Edit Identitas Medis</button>
			@endif

		</div>
		<div class="col-lg-6">
			<h5 class="font-w400"><small>Tinggi Badan</small><br> 
				{{ $identitas->tinggi_badan or '-' }} cm </h5>
			<h5 class="font-w400"><small>Berat Badan</small><br> 
				{{ $identitas-> berat_badan or '-'}} kg</h5>
			<h5 class="font-w400"><small>Alergi</small><br> 
				@php $i = 0 @endphp
				@forelse($identitas->alergi_array as $item)
				<span class="badge badge-pill badge-primary">{{$item}}</span>
				@empty
				Tidak memiliki alergi
				@endforelse
			</h5>
		</div>
		<div class="col-lg-6">
		</div>
	</div>
</div>