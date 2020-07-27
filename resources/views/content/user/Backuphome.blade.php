@extends('layouts.appUser')

@section('title', $title)

@section('content')

<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>


<section class="content">

    <div class="row">
        <div class="col-lg-6 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{count($summaryIssuesSaya)}}</h3>

                    <p>Jumlah Aduan Anda</p>
                </div>
                <div class="icon">
                    <i class="fa fa-hourglass-2"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{count($summaryIssuesApprovedAnswered)}}</h3>

                    <p>Jumlah Aduan (Aproved dan Dijawab)</p>
                </div>
                <div class="icon">
                    <i class="fa fa-check-square"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Aduan Warga</h3>
        </div>
        <div class="box-body">
            @if($issues)
            @foreach($issues as $row)
            <div class="box box-widget">
                <div class="box-header with-border">
                    <div class="user-block">
                        <span style="margin-left: 0" class="username">{{$row->user->name}}</span>
                        <span style="margin-left: 0" class="description">{{$row->publish == 'true' ? 'Public' : 'Private'}} - {{time_elapsed_string($row->created_at), true}}</span>
                    </div>
                </div>
                <div class="box-body">
                    <p>{{$row->description_issue}}</p>
                    @if($row->document_issue)
                    <div class="attachment-block clearfix">
                        <a download href="{{url('uploads/aduan/').'/'.$row->document_issue}}"><span class="fa fa-paperclip"></span> {{$row->document_issue}}</a>
                    </div>
                    @endif
                </div>
                <div class="box-footer box-comments">
                    <div class="box-comment">
                        <div class="comment-text" style="margin-left: 0">
                            <span style="margin-left: 0" class="username">
                                Respon Balai Desa : {{$row->response_issue != '' ? $row->response_issue : 'Belum ada respon'}}
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                @endforeach
                @endif
            </div>
            <div class="box-footer">
                <div>
                    {{ $issues->links() }}
                </div>
            </div>
        </div>

    </section>

    @endsection
