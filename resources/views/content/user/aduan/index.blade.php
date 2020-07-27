@extends('layouts.appUser')

@section('title', $title)

@section('content')

{{-- <section class="content-header">
	<h1>
		Aduan
		<small>List Aduan</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Aduan</li>
	</ol>
</section> --}}

<section class="tm-mt-5 p-5 tm-container-outer">  
	@if(Auth::user() != null)
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title" style="float: left;">List Aduan Saya</h3>
					<a style="float: right;" href="{{url('aduan/tambah')}}" class="btn btn-xs btn-primary"><i class="fa fa-plus"> tambah</i></a>
				</div>
				<div class="box-body">
					@if(Session::get('message'))
					<div class="alert alert-{{Session::get('message')['status']}}">
						<p class="alert-message">{{Session::get('message')['description']}}</p>
					</div>
					@endif
					<div class="table-responsive">
						<table class="table table-borderd" id="tListAduan">
							<thead>
								<tr>
									<th>No.</th>
									<th>Judul Aduan</th>
									<th>Status</th>
									<th>Publikasi</th>
									<th>Tanggal Buat</th>
									<th>#</th>
								</tr>
							</thead>
							<tbody>
								@foreach($issue as $key => $row)
								<tr>
									<td>{{$key+1}}</td>
									<td>{{$row->title_issue}}</td>
									<td>{{$row->status}}</td>
									<td>{{$row->status == 'ditolak' ? '-' : ($row->publish == 'true' ? 'terpublikasi' : 'unpublish')}}</td>
									<td>{{date('d M Y', strtotime($row->created_at))}}</td>
									<td>
										@if($row->status == 'diverifikasi' || $row->publish == 'true' || $row->status == 'ditolak')
										<p><p style="border: 1px solid whitesmoke; text-align: center; background-color: whitesmoke">readonly</p></p>
										@else
										<a href="{{url('aduan/ubah')}}/{{$row->issue_id}}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> ubah</a>
										<a href="{{url('aduan/hapus')}}/{{$row->issue_id}}" class="btn btn-xs btn-danger hapus"><i class="fa fa-trash"></i> hapus</a>
										@endif
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{{ $issue->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
	@endif

	<section class="tm-mt-5 p-5 tm-container-outer">
		<div class="nav nav-pills tm-tabs-links" style="height: 156px;margin-bottom: -27px;">
			<h4 class="text-uppercase" style="margin: auto;">List <strong>Aduan</strong> Warga</h4>
		</div>
		<div class="tab-content clearfix">        

			<div class="tab-pane fade show active" id="4a">

				<div class="tm-recommended-place-wrap">
					@foreach($issues as $issue)
					<div class="tm-recommended-place">
						<img src="{{ $issue->document_issue != "" ? asset("/uploads/aduan/".$issue->document_issue) : url('img')."/tm-img-06.jpg"}}" alt="Image" class="img-fluid tm-recommended-img">
						<div class="tm-recommended-description-box">
							<h3 class="tm-recommended-title">{{$issue->title_issue}}</h3>
							<p class="tm-text-highlight">{{$issue->publish == 'true' ? 'Public' : 'Private'}} - {{time_elapsed_string($issue->created_at), true}}</p>
							<p class="tm-text-gray">{{$issue->description_issue}}</p> 
						</div>
						<div class="tm-recommended-price-box">
							<p>Oleh : {{$issue->user->name}}</p>
							<p>Status : {{$issue->status}}</p>
						</div> 

					</div>
					@endforeach
				</div>                        
				{{ $issues->links() }}
			</div> 
		</div>

	</section>
</section>

<script type="text/javascript">
	
	$(document).ready(function(){
		// $('#tListAduan').DataTable();

		$(document).on('click', '.hapus', function(e){
			e.preventDefault();

			var url = $(this).attr('href');

			if(window.confirm("Apakah Anda yakin ingin menghapus data tersebut?")){
				window.location.href = url;
			}
		})
	})

</script>

@endsection