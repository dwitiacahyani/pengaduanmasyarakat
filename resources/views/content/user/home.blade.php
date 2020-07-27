@extends('layouts.appUser')

@section('title', $title)

@section('content')
<section class="tm-banner">
    <div class="tm-container-outer tm-banner-bg">
        <div class="container">

            <div class="row tm-banner-row tm-banner-row-header">
                <div class="col-xs-12">
                    <div class="tm-banner-header">
                        <h1 class="text-uppercase tm-banner-title">Tata Cara Pengaduan kamu sekarang!</h1>
                        <img src="{{url('img')}}/dots-3.png" alt="Dots">
                        <p class="tm-banner-subtitle">1. masyarakat login sebelum Pengaduan tentang jalan rusak/berlubang jika belum memiliki akun harap daftar akun terlebih dahulu<br>
                        2. kemudian pilih menu informasi Pengaduan Anda</p>
                        <a href="javascript:void(0)" class="tm-down-arrow-link"><i class="fa fa-2x fa-angle-down tm-down-arrow"></i></a>       
                    </div>    
                </div>  
            </div> 
            <div class="row tm-banner-row" id="tm-section-search">
                <form action="index.html" method="get" class="tm-search-form tm-section-pad-2" style="padding-bottom: -10px;">
                    <div class="form-row tm-search-form-row" style="margin-bottom: -37px;
                    ">  
                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-2 col-md-12">
                        <a style="width: 100%" type="submit" href="{{url('aduan')}}" class="btn btn-primary tm-btn tm-btn-search text-uppercase" id="btnSubmit">Submit Aduan</a>
                    </div> 
                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-1">
                        <label style="display: none" for="inputCity">Choose Your Destination</label>
                        <input name="destination" type="hidden" class="form-control" id="inputCity" placeholder="Type your destination...">
                    </div>
                    <div class="form-group tm-form-group tm-form-group-1">
                    </div>
                </div> 
                <div class="form-row tm-search-form-row">

                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-3">
                        <label style="display: none" for="inputCheckIn">Check In Date</label>
                        <input name="check-in" type="hidden" class="form-control" id="inputCheckIn" placeholder="Check In">
                    </div>
                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-3">
                        <label style="display: none" for="inputCheckOut">Check Out Date</label>
                        <input name="check-out" type="hidden" class="form-control" id="inputCheckOut" placeholder="Check Out">
                    </div>
                    <div style="display: none" class="form-group tm-form-group tm-form-group-pad tm-form-group-1">
                        <label for="btnSubmit">&nbsp;</label>
                        <button type="submit" class="btn btn-primary tm-btn tm-btn-search text-uppercase" id="btnSubmit">Check Availability</button>
                    </div>
                </div>                              
            </form>                             

        </div> 
        <div class="tm-banner-overlay"></div>
    </div>  
</div>     
</section>

<section class="p-5 tm-container-outer tm-bg-gray">            
    <div class="container">
        <div class="row">
            <div class="col-xs-12 mx-auto tm-about-text-wrap text-center">                        
                <h2 class="text-uppercase mb-4">Balai Desa <strong>Taman</strong></h2>
                <p class="mb-4">Taman adalah sebuah kecamatan di Kabupaten Pemalang, Jawa Tengah, Indonesia. kecamatan Taman adalah kecamatan di kabupaten pemalang ibu kota kecamatannya di Banjardawa. terdapat 3 pasar di kecamatan taman antara lain: pasar Beji, pasar Banjardawa, pasar Gondang, desa paling selatan adalah panggarit,desa paling utara adalah asemdoyong,desa paling timur sitemu,desa paling barat kaligelang.
                </div>
            </div>
        </div>            
    </section>

    <div class="tm-container-outer" id="tm-section-2">
        <section class="tm-slideshow-section">
            <div class="tm-slideshow">
                <img src="{{url('img')}}/taman1.png" class="img-slide" alt="Image">
                <img src="{{url('img')}}/taman2.png" class="img-slide" alt="Image">
                <img src="{{url('img')}}/taman3.png" class="img-slide" alt="Image">    
            </div>
            <div class="tm-slideshow-description tm-bg-primary">
                <h2 class="">DESA TAMAN DESA INFORMATIKA</h2>
                <p>Membangun Kabupaten Pemalang dari desa, dengan keakuratan data dan informatika adalah sebuah proses membuka pemalang dan desa dengan dunia. Dengan memanfaatkan teknologi yang ada, desa dapat menggambarkan potensi yang ada di desa serta berbagi informasi dengan cepat kepada masyarakat</p>
                {{-- <a href="#" class="text-uppercase tm-btn tm-btn-white tm-btn-white-primary">Continue Reading</a> --}}
            </div>
        </section>
        <section class="clearfix tm-slideshow-section tm-slideshow-section-reverse">

            <div class="tm-right tm-slideshow tm-slideshow-highlight">
             <img src="{{url('img')}}/taman2.png" class="img-slide" alt="Image">
             <img src="{{url('img')}}/taman1.png" class="img-slide" alt="Image">
             <img src="{{url('img')}}/taman3.png" class="img-slide" alt="Image">    
         </div> 

         <div class="tm-slideshow-description tm-slideshow-description-left tm-bg-highlight">
            <h2 class="">DESA TAMAN DESA TERSTRUKTUR</h2>
            <p>Beberapa event yang ada di taman pasti berjalan dengan mulus dan lancar. Memiliki konsep serta memiliki panitia-panitia yang terstruktur, membuat desa taman adalah desa yang memiliki tingkat struktur yang tinggi.</p>
            {{-- <a href="#" class="text-uppercase tm-btn tm-btn-white tm-btn-white-highlight">Continue Reading</a> --}}
        </div>                        

    </section>
    <section class="tm-slideshow-section">
        <div class="tm-slideshow">
            <img src="{{url('img')}}/taman3.png" class="img-slide" alt="Image">    
            <img src="{{url('img')}}/taman1.png" class="img-slide" alt="Image">
            <img src="{{url('img')}}/taman2.png" class="img-slide" alt="Image">
        </div>
        <div class="tm-slideshow-description tm-bg-primary">
            <h2 class="">DESA TAMAN DESA SEJAHTERA</h2>
            <p>Taman adalah sebuah kecamatan di Kabupaten Pemalang, Jawa Tengah, Indonesia. kecamatan Taman adalah kecamatan di kabupaten pemalang ibu kota kecamatannya di Banjardawa. terdapat 3 pasar di kecamatan taman antara lain: pasar Beji, pasar Banjardawa, pasar Gondang, desa paling selatan adalah panggarit,desa paling utara adalah asemdoyong,desa paling timur sitemu,desa paling barat kaligelang</p>
            <a href="#" class="text-uppercase tm-btn tm-btn-white tm-btn-white-primary">Continue Reading</a>
        </div>
    </section>
</div>        
<div class="tm-container-outer" id="tm-section-3">
    <div class="nav nav-pills tm-tabs-links" style="height: 156px;margin-bottom: -27px;">
        <h4 class="text-uppercase" style="margin: auto;">Kumpulan <strong>Aduan</strong></h4>
    </div>
    <div class="tab-content clearfix">        

        <div class="tab-pane fade show active" id="4a">

            <div class="tm-recommended-place-wrap">
                @foreach($issues as $issue)
                <div class="tm-recommended-place">
                    <img src="{{url('img')}}/tm-img-06.jpg" alt="Image" class="img-fluid tm-recommended-img">
                    <div class="tm-recommended-description-box">
                        <h3 class="tm-recommended-title">{{$issue->title_issue}}</h3>
                        <p class="tm-text-highlight">{{$issue->publish == 'true' ? 'Public' : 'Private'}} - {{time_elapsed_string($issue->created_at), true}}</p>
                        <p class="tm-text-gray">{{substr($issue->description_issue, 0, 150)}}</p> 
                    </div>
                    <div class="tm-recommended-price-box">
                        <p>Oleh     : {{$issue->user->name}}</p>
                        <p>Status   : {{$issue->status}}</p>
                    </div>                    
                </div>
                @endforeach
            </div>                        
            <a href="{{url('aduan')}}" class="text-uppercase btn-primary tm-btn mx-auto tm-d-table">Kunjungi Halaman Aduan</a>
        </div> 
    </div>
</div>

<div class="tm-container-outer tm-position-relative" id="tm-section-4">
    <div id="google-map"></div>
</div>

@endsection
