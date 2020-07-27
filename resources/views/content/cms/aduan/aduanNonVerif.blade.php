@extends('layouts.app')

@section('title', $title)

@section('content')

<section class="content-header">
	<h1>
		Aduan Belum Verifikasi
		<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{url('cms')}}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Aduan Belum Verifikasi</li>

	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Aduan Belum Verifikasi</h3>
				</div>
				<div class="box-body">
					@if(Session::get('message'))
					<div class="alert alert-{{Session::get('message')['status']}}">
						<p class="alert-message">{{Session::get('message')['description']}}</p>
					</div>
					@endif
					<div class="table-responsive">
						<table class="table table-stripped" id="tAduanNonVerif">
							<thead>
								<th>Nama</th>
								<th>Judul Aduan</th>
								<th>Dokumen</th>
								<th>Status</th>
								<th>Jawaban</th>
							</thead>
							<tbody>
								@if($issues->count() > 0)
								@foreach($issues as $row)
								<tr>
									<td>{{$row->user->name}}</td>
									<td>{{$row->title_issue}}</td>
									<td>{{$row->document_issue != '' ? $row->document_issue : '-'}}</td>
									<td>{{$row->status}}</td>
									<td><a href="{{url('/cms/aduan/nonverif/ubah').'/'.$row->issue_id}}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> beri jawaban</a></td>
								</tr>
								@endforeach
								@else
								<td colspan="5">tidak ada data</td>
								@endif
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tAduanNonVerif').DataTable();
	})
</script>

@endsection