@extends('layouts.app')

@section('title', $title)

@section('content')

<section class="content-header">
	<h1>
		Detail Aduan
		<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{url('cms')}}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Detail Aduan</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">detail Aduan #{{$issue->issue_id}}</h3>
				</div>
				<div class="box-body">
					<form>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Judul Aduan</label>
									<input type="text" disabled value="{{$issue->title_issue}}" class="form-control">
								</div>
								<div class="form-group">
									<label>Isi Aduan</label>
									<textarea rows="8" disabled class="form-control">{{$issue->description_issue}}</textarea>
								</div>
								<div class="form-group">
									<label>Dokumen Pendukung</label>
									@if(!empty($issue->document_issue))
									<a style="display: block" download href="{{url('uploads/aduan/')}}/{{$issue->document_issue}}" class="btn-link">download file</a>
									@else
									<p>Data document tidak ada</p>
									@endif
								</div>
								<div class="form-group">
									<label>Pembuat Aduan</label>
									<input type="text" class="form-control" disabled value="{{$issue->user->name}}">
								</div>	
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="jawaban">Jawaban</label>
									<textarea rows="8" name="response_issue" disabled id="jawaban" class="form-control">{{$issue->response_issue}}</textarea>
								</div>
								<div class="form-group">
									<label for="status">Status</label>
									<select class="form-control" name="status" id="status" disabled>
										<option value="">-Pilih Status-</option>
										<option {{$issue->status == 'menunggu verifikasi' ? 'selected' : ''}} value="menunggu verifikasi">Menunggu Verifikasi</option>
										<option {{$issue->status == 'diverifikasi' ? 'selected' : ''}} value="diverifikasi">Diverifikasi</option>
										<option {{$issue->status == 'ditolak' ? 'selected' : ''}} value="ditolak">Ditolak</option>
									</select>
								</div>
								<div class="form-group">
									<label for="publish">Publikasi</label>
									<select class="form-control" name="publish" id="publish" disabled>
										<option value="">-Pilih Publikasi-</option>
										<option {{$issue->publish == 'true' ? 'selected' : ''}} value="true">Publish</option>
										<option {{$issue->publish == 'false' ? 'selected' : ''}} value="false">Unpublish</option>
									</select>
								</div>
								<div class="form-group text-right">
									<a href="{{ url()->previous() }}" class="btn btn-sm btn-warning">kembali</a>
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