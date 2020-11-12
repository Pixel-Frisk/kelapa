<html lang="en">
  <head>
      <!-- Basic Page Needs==================================================-->
      <title>Home</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <!-- CSS==================================================-->
      <link rel="stylesheet" href="{{asset('others/assets/plugins/css/plugins.css')}}">
      <link href="{{asset('others/assets/css/style.css')}}" rel="stylesheet">
      <link type="text/css" rel="stylesheet" id="jssDefault" href="{{asset('others/assets/css/colors/green-style.css')}}"> </head>
  <body>
    <div class="Loader"></div>
    <div class="wrapper">
      <nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav">
          <div class="container">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"><i class="fa fa-bars"></i></button>
              <div class="navbar-header">
              </div>
              <div class="collapse navbar-collapse" id="navbar-menu">
                  <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                      <li class="left-br"><a href="/login" class="signin">Login</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                      <li class="dropdown">
                        <a href="/dashboard">Dashboard</a>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>
        <div class="clearfix"></div>
        <section class="slide-banner scroll-con-sec hero-section" data-scrollax-parent="true" id="sec1">
            <div class="slideshow-container">
                <div class="slideshow-item">
                    <div class="bg" data-bg="{{asset('others/assets/img/kelapa.jpg')}}"></div>
                </div>
            </div>
            <div class="overlay"></div>
            <div class="hero-section-wrap fl-wrap">
                <div class="container">
                    <div class="intro-item fl-wrap">
                        <div class="caption text-center cl-white">
                            <h2>Selamat Datang</h2>
                            <br>
                            <p><font size="6">Di SIIPAKA</font></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
        <section class="first-feature">
        </section>
      <footer class="dark-footer skin-dark-footer">
        <div class="footer-bottom">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-6 col-md-6">
                <p class="mb-0">© 2020 SIIPAKA. All Rights Reserved</p>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!-- ============================ Footer End ================================== -->

      <!-- Scripts
      ================================================== -->
      <script type="text/javascript" src="{{asset('others/assets/plugins/js/jquery.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('others/assets/plugins/js/viewportchecker.js')}}"></script>
      <script type="text/javascript" src="{{asset('others/assets/plugins/js/bootstrap.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('others/assets/plugins/js/bootsnav.js')}}"></script>
      <script type="text/javascript" src="{{asset('others/assets/plugins/js/select2.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('others/assets/plugins/js/wysihtml5-0.3.0.js')}}"></script>
      <script type="text/javascript" src="{{asset('others/assets/plugins/js/bootstrap-wysihtml5.js')}}"></script>
      <script type="text/javascript" src="{{asset('others/assets/plugins/js/datedropper.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('others/assets/plugins/js/dropzone.js')}}"></script>
      <script type="text/javascript" src="{{asset('others/assets/plugins/js/loader.js')}}"></script>
      <script type="text/javascript" src="{{asset('others/assets/plugins/js/owl.carousel.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('others/assets/plugins/js/slick.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('others/assets/plugins/js/gmap3.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('others/assets/plugins/js/jquery.easy-autocomplete.min.js')}}"></script>
      <!-- Custom Js -->
      <script src="{{asset('others/assets/js/custom.js')}}"></script><script type="text/javascript" src="{{asset('others/assets/plugins/js/counterup.min.js')}}"></script>
        <script src="{{asset('others/assets/js/jQuery.style.switcher.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#styleOptions').styleSwitcher();
            });
        </script>
        <script>
            function openRightMenu() {
                document.getElementById("rightMenu").style.display = "block";
            }

            function closeRightMenu() {
                document.getElementById("rightMenu").style.display = "none";
            }
        </script>
      </div>
    </body>
</html>
