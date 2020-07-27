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