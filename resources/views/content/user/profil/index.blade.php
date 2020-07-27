@extends('layouts.appUser')

@section('title', $title)

@section('content')

{{-- <section class="content-header">
	<h1>
		Profil
		<small>Data Profil Anda</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Profil</li>
	</ol>
</section> --}}

<section class="tm-mt-5 p-5 tm-container-outer">
	
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<div style="display: inline-block;">
						<h3 class="box-title" style="float: left;">Profil Anda</h3>
					</div>
				</div>
				<div class="box-body">
					@if(Session::get('message'))
					<div class="alert alert-{{Session::get('message')['status']}}">
						<p class="alert-message">{{Session::get('message')['description']}}</p>
					</div>
					@endif
					<div class="form">
						<form action="{{url('profil/proses')}}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label for="name">Nama</label>
								<input type="text" name="name" class="form-control" id="name" value="{{$profil->name}}">
								@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							<div class="form-group">
								<label for="nik">NIK</label>
								<input type="text" maxlength="16" size="16" name="nik" class="form-control" id="nik" disabled value="{{$profil->nik}}">
								@error('nik')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" name="email" class="form-control" id="email" value="{{$profil->email}}">
								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							<hr style="margin-bottom: 0.5px;">
							<small style="color: red">Isi form di bawah ini untuk mengganti password Anda</small>
							<hr style="margin-top: 0.5px;">
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" class="form-control" id="password">
								@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							<div class="form-group">
								<label for="password_confirmation">Re-Password</label>
								<input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
								@error('password_confirmation')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-sm btn-success">simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>

<script type="text/javascript">
	
	$(document).ready(function(){
		$('#nik').keyup(function(){
			var isi = $(this).val();

			if(!$.isNumeric(isi)){
				$(this).val('');
				alert('isi form ini dengan tipe data numeric!');
			}
		})
	})

</script>

@endsection