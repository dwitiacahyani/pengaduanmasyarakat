@extends('layouts.appUser')

@section('title', $title)

@section('content')

{{-- <section class="content-header">
	<h1>
		Hubungi Kami
		<small>Data Kontak Balaidesa</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Hubungi Kami</li>
	</ol>
</section>
 --}}
<section class="tm-mt-5 p-5 tm-container-outer">
	
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-body">
					<div style="margin-bottom: 25px;">
						<h4>Hubungi Kami di Balai Desa {{$contactData->village_name}}</h4>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<label style="font-weight: normal;">Alamat : </label>
									</div>
									<div class="col-md-10">
										<span>{{$contactData->village_address}}</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<label style="font-weight: normal;">Telepon : </label>
									</div>
									<div class="col-md-10">
										<span>{{$contactData->village_phone}}</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<label style="font-weight: normal;">Fax : </label>
									</div>
									<div class="col-md-10">
										<span>{{$contactData->village_fax}}</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<label style="font-weight: normal;">Email : </label>
									</div>
									<div class="col-md-10">
										<span>{{$contactData->village_email}}</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-2">
										<label style="font-weight: normal;">Website : </label>
									</div>
									<div class="col-md-10">
										<span><a target="_blank" href="http://{{$contactData->village_website}}">{{$contactData->village_website}}</a></span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							@if(Session::get('message'))
							<div class="alert alert-{{Session::get('message')['status']}}">
								<p class="alert-message">{{Session::get('message')['description']}}</p>
							</div>
							@endif
							<form action="{{url('kontak/proses')}}" method="post">
								@csrf
								<div class="form-group">
									<label>Subject</label>
									<input type="text" name="subject" class="form-control" value="{{old('subject')}}">
									@error('subject')
									<span style="color: salmon" class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
								<div class="form-group">
									<label>Pesan</label>
									<textarea name="message" class="form-control">{{old('message')}}</textarea>
									@error('message')
									<span style="color: salmon" class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
								<div class="form-group text-right">
									<p style="float: left;"><small style="color: salmon">*Isi form diatas untuk mengirim langsung email kepada kami.</small></p>
									<button class="btn btn-sm btn-primary">kirim</button>
								</div>
							</form>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div id="map" style="width: 100%; height: 400px;"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>

<script type="text/javascript">
	function initMap() {
	  // The location of Uluru
	  var uluru = {lat: {{$contactData->village_latitude}}, lng: {{$contactData->village_longitude}}};
	  // The map, centered at Uluru
	  var map = new google.maps.Map(
	  	document.getElementById('map'), {zoom: 20, center: uluru});
	  // The marker, positioned at Uluru
	  var marker = new google.maps.Marker({position: uluru, map: map});
	}
</script>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkhcToteyCW1vBFjxkmn8xlYl-25kWK-s&callback=initMap">
</script>

@endsection