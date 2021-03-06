<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Balaidesa Taman</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="{{url('font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/datepicker.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('slick/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('slick/slick-theme.css')}}"/>
    <link rel="stylesheet" href="{{url('css/templatemo-style.css')}}"> 
    <script src="{{url('js/jquery-1.11.3.min.js')}}"></script>
</head>

<body>
    <div class="tm-main-content" id="top">
        <div class="tm-top-bar-bg"></div>    
        <div class="tm-top-bar" id="tm-top-bar">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-expand-lg narbar-light">
                        <a class="navbar-brand mr-auto" href="{{url('home')}}">
                            Balaidesa Taman
                        </a>
                        <button type="button" id="nav-toggle" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#mainNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div id="mainNav" class="collapse navbar-collapse tm-bg-white">
                            <ul class="navbar-nav ml-auto">
                              <li class="nav-item">
                                <a class="nav-link {{$page == 'home' ? 'active' : ''}}" href="{{url('home')}}">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{$page == 'aduan' ? 'active' : ''}}" href="{{url('aduan')}}">Informasi Pengaduan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{$page == 'aduanverif' ? 'active' : ''}}" href="{{url('aduanverif')}}">Tanggapan aduan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{$page == 'kontak' ? 'active' : ''}}" href="{{url('kontak')}}">Hubungi Kami</a>
                            </li>
                            <li class="nav-item text-center">
                                @if(Auth::user() != null)
                                <a class="nav-link {{$page == 'profil' ? 'active' : ''}}" href="{{url('profil')}}" style="background-color: whitesmoke; width: 100%;">
                                    Profil
                                </a>
                                @endif
                            </li>
                            <li class="nav-item">
                                @if(Auth::user() != null)
                                <form action="{{route('logout')}}" method="post">
                                    @csrf
                                    <input type="submit" name="logout" value="Sign out" class="nav-link" style="background-color: whitesmoke; border: none; width: 100%; cursor: pointer; font-weight: bold;">
                                </form>
                                @else
                                <a class="nav-link" href="{{url('login')}}">Login</a>
                                @endif
                            </li>
                        </ul>
                    </div>                            
                </nav>
            </div> 
        </div> 
    </div> 

    <div class="tm-page-wrap mx-auto">

        @yield('content')

        <footer class="tm-container-outer">
            <p class="mb-0">Copyright © <span class="tm-current-year">2018</span> Sistem Pengaduan Balaidesa Taman

                . Designed by <a rel="nofollow" href="http://www.google.com/+templatemo" target="_parent">Template Mo</a></p>
            </footer>
        </div>
    </div> 

    <script src="{{url('js/popper.min.js')}}"></script>
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <script src="{{url('js/datepicker.min.js')}}"></script>
    <script src="{{url('js/jquery.singlePageNav.min.js')}}"></script>
    <script src="{{url('slick/slick.min.js')}}"></script>
    <script src="{{url('js/jquery.scrollTo.min.js')}}"></script>
    <script> 
        /* Google Maps
        ------------------------------------------------*/
        var map = '';
        var center;

        function initialize() {
            var mapOptions = {
                zoom: 16,
                center: new google.maps.LatLng(37.769725, -122.462154),
                scrollwheel: false
            };

            map = new google.maps.Map(document.getElementById('google-map'),  mapOptions);

            google.maps.event.addDomListener(map, 'idle', function() {
              calculateCenter();
          });

            google.maps.event.addDomListener(window, 'resize', function() {
              map.setCenter(center);
          });
        }

        function calculateCenter() {
            center = map.getCenter();
        }

        function loadGoogleMap(){
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDVWt4rJfibfsEDvcuaChUaZRS5NXey1Cs&v=3.exp&sensor=false&' + 'callback=initialize';
            document.body.appendChild(script);
        } 

        /* DOM is ready
        ------------------------------------------------*/
        $(function(){

            // Change top navbar on scroll
            $(window).on("scroll", function() {
                if($(window).scrollTop() > 100) {
                    $(".tm-top-bar").addClass("active");
                } else {                    
                   $(".tm-top-bar").removeClass("active");
               }
           });

            // Smooth scroll to search form
            $('.tm-down-arrow-link').click(function(){
                $.scrollTo('#tm-section-search', 300, {easing:'linear'});
            });

            // Update nav links on scroll
            $('#tm-top-bar').singlePageNav({
                currentClass:'active',
                offset: 60
            });

            // Close navbar after clicked
            $('.nav-link').click(function(){
                $('#mainNav').removeClass('show');
                window.location.href = $(this).attr("href");
            });

            $('.navbar-brand').click(function(){
                window.location.href = $(this).attr("href");
            });

            // Slick Carousel
            $('.tm-slideshow').slick({
                infinite: true,
                arrows: true,
                slidesToShow: 1,
                slidesToScroll: 1
            });

            loadGoogleMap();                                       // Google Map                
            $('.tm-current-year').text(new Date().getFullYear());  // Update year in copyright           
        });

    </script>             

</body>
</html>