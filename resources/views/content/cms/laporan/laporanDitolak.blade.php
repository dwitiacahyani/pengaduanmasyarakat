@extends('layouts.app')

@section('title', $title)

@section('content')

<section class="content-header">
  <h1>
    Laporan Ditolak
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('cms')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Laporan Ditolak</li>

  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Laporan Ditolak</h3>
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
              </thead>
              <tbody>
                @if($data->count() > 0)
                @foreach($data as $row)
                <tr>
                  <td>{{$row->user->name}}</td>
                  <td>{{$row->title_issue}}</td>
                  <td>{{$row->document_issue != '' ? $row->document_issue : '-'}}</td>
                  <td>{{$row->status}}</td>
                </tr>
                @endforeach
                @else
                <td colspan="5">tidak ada data</td>
                @endif
              </tbody>
            </table>
            <div class="d-flex justify-content-center">
                <a href="#" class="btn btn-primary" target="_blank">CETAK PDF</a>
            </div>
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