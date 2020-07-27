@extends('layouts.appUser')

@section('title', $title)

@section('content')

{{-- <section class="content-header">
	<h1>
		Aduan
		<small>Tambah Aduan</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="{{url('/aduan')}}"></a>Aduan</li>
		<li class="active">Tambah Aduan</li>
	</ol>
</section> --}}

<section class="tm-mt-5 p-5 tm-container-outer">
	
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Form Tambah Aduan</h3>
		</div>
		<div class="box-body">
			<form class="form" action="{{url('aduan/tambah/proses')}}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="title_issue">Judul Aduan *</label>
					<input class="form-control" type="text" name="title_issue" id="title_issue" value="{{old('title_issue')}}">
					@error('title_issue')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="description_issue">Deskripsi Aduan (Isi Aduan) *</label>
					<textarea rows="10" class="form-control" name="description_issue" id="description_issue">{{old('description_issue')}}</textarea>
					@error('description_issue')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
				<div class="form-group">
					<label for="document_issue">Dokumen Aduan <small style="color: red"></small></label>
					<input type="file" name="document_issue" id="document_issue">
					@error('document_issue')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
				<div class="form-group">
					<button class="btn btn-sm btn-success">submit</button>
					<a href="{{url()->previous()}}" class="btn btn-sm btn-warning">kembali</a>
				</div>
			</form>
		</div>
	</div>

</section>


@endsection