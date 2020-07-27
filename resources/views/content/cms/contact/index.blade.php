@extends('layouts.app')

@section('title', $title)

@section('content')

<section class="content-header">
	<h1>
		Data Informasi Kontak
		<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{url('cms')}}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Data Informasi Kontak</li>

	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Form Data Informasi Kontak</h3>
				</div>
				<div class="box-body">
					@if(Session::get('message'))
					<div class="alert alert-{{Session::get('message')['status']}}">
						<p class="alert-message">{{Session::get('message')['description']}}</p>
					</div>
					@endif
					<form action="" method="post">
						@csrf
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="village_name">Nama Desa <small style="color: red">nama ini akan dijadikan nama balaidesa</small></label>
									<input class="form-control" type="text" name="village_name" id="village_name" value="{{$contact->village_name}}">
									@error('village_name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="village_address">Alamat Balaidesa</label>
									<textarea class="form-control" id="village_address" name="village_address" id="village_address">{{$contact->village_address}}</textarea>
									@error('village_address')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>	
								<div class="form-group">
									<label for="village_phone">Telepon Balaidesa</label>
									<input type="number" name="village_phone" id="village_phone" class="form-control" value="{{$contact->village_phone}}">
									@error('village_phone')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="village_fax">Fax Balaidesa</label>
									<input type="number" name="village_fax" id="village_fax" class="form-control" value="{{$contact->village_fax}}">
									@error('village_fax')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="village_email">Email Balaidesa</label>
									<input type="email" name="village_email" id="village_email" class="form-control" value="{{$contact->village_email}}">
									@error('village_email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="village_website">Website Balaidesa</label>
									<input type="text" name="village_website" id="village_website" class="form-control" value="{{$contact->village_website}}">
									@error('village_website')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="village_latitude">Latitude</label>
									<input type="text" name="village_latitude" id="village_latitude" class="form-control" value="{{$contact->village_latitude}}">
									@error('village_latitude')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="village_longitude">Longitude</label>
									<input type="text" name="village_longitude" id="village_longitude" class="form-control" value="{{$contact->village_longitude}}">
									@error('village_longitude')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<button class="btn btn-sm btn-success">simpan</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection






