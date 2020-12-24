<!-- Master admin -->
@if(auth()->user()->status == 'admin')
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    @yield('judul')
    <link rel="shortcut icon" href="{{asset('images/icon.png')}}" type="image/x-icon">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="../node_modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="../node_modules/summernote/dist/summernote-bs4.css">
    <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/components.css')}}">
  </head>

  <body>
    <div id="app">
      <div class="main-wrapper">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
          <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
              <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
              <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
            </ul>
          </form>
          <ul class="navbar-nav navbar-right">
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <div class="d-sm-none d-lg-inline-block">Hi, {{auth()->user()->nama}}</div></a>
              <div class="dropdown-menu dropdown-menu-right">
                <!-- <a href="/profile/{{auth()->user()->id}}" class="dropdown-item has-icon">
                  <i class="far fa-user"></i> Profile
                </a> -->
                <div class="dropdown-divider"></div>
                <a href="/logout" class="dropdown-item has-icon text-danger" onclick="return confirm('apakah anda yakin ingin keluar ?')">
                  <i class="fas fa-sign-out-alt"></i> Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <div class="main-sidebar">
          <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
              <a href="/dashboard"><img src="{{asset('images/Logo.png')}}" height="45" width="135"></a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
              <a>SPK</a>
            </div>
            <ul class="sidebar-menu mt-2">
              <li class="menu-header">Dashboard</li>
                <li class="nav-item dropdown @yield('drop')">
                  <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Users</span></a>
                  <ul class="dropdown-menu">
                    <li @yield('active')><a href="{{ url('/pedagang')}}">Pedagang Besar</a></li>
                    <li @yield('active2')><a href="{{ url('/sopir')}}">Sopir</a></li>
                  </ul>
                </li>
                <li class="@yield('truck')"><a class="nav-link" href="{{ url('/kendaraan')}}"><i class="fas fa-columns"></i> <span>Kendaraan</span></a></li>
                <li class="@yield('transaksi')"><a class="nav-link" href="{{ url('/transaksi')}}"><i class="fas fa-pencil-ruler"></i> <span>Transaksi</span></a></li>
                <li class="@yield('penyaluran')"><a class="nav-link" href="{{ url('/penyaluran')}}"><i class="far fa-file-alt"></i> <span>Penyaluran</span></a></li>
                <li class="@yield('stok')"><a class="nav-link" href="{{ url('/stok')}}"><i class="fas fa-ellipsis-h"></i> <span>Stok</span></a></li>
              </ul>
            </aside>
          </div>

        @yield('content')

        <footer class="main-footer">
          <div class="footer-left">
            Copyright &copy; 2020 <div class="bullet"></div>
          </div>
          <div class="footer-right">
            2.3.0
          </div>
        </footer>
      </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="../assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="../node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../node_modules/chart.js/dist/Chart.min.js"></script>
    <script src="../node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="../node_modules/summernote/dist/summernote-bs4.js"></script>
    <script src="../node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <!-- Template JS File -->
    <script src="{{asset('admin/assets/js/scripts.js')}}"></script>
    <script src="{{asset('admin/assets/js/custom.js')}}"></script>

    <!-- Page Specific JS File -->
    <script src="{{asset('admin/assets/js/page/index.js')}}"></script>
  </body>
  </html>
@endif

<!-- Master PB -->
@if(auth()->user()->status == 'pedagang')
<!doctype html>
<html lang="en">
  <head>
      <!-- Basic Page Needs==================================================-->
      @yield('judul')
      <link rel="shortcut icon" href="{{asset('images/icon.png')}}" type="image/x-icon">
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
                    <img src="{{asset('images/Logo.png')}}" height="80" width="240" class="logo logo-display" alt=""><img src="{{asset('images/Logo.png')}}" height="80" width="240" class="logo logo-scrolled" alt="">
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="left-br"><a href="/logout" class="signin" onclick="return confirm('apakah anda yakin ingin keluar ?')">Logout</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="dropdown">
                          <a href="/dashboard">Dashboard</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
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
@endif

<!-- Master Sopir -->
@if(auth()->user()->status == 'sopir')
<!doctype html>
<html lang="en">
  <head>
      <!-- Basic Page Needs==================================================-->
      @yield('judul')
      <link rel="shortcut icon" href="{{asset('images/icon.png')}}" type="image/x-icon">
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
                  <img src="{{asset('images/Logo.png')}}" height="80" width="240" class="logo logo-display" alt=""><img src="{{asset('images/Logo.png')}}" height="80" width="240" class="logo logo-scrolled" alt="">
              </div>
              <div class="collapse navbar-collapse" id="navbar-menu">
                  <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                      <li class="left-br"><a href="/logout" class="signin" onclick="return confirm('apakah anda yakin ingin keluar ?')">Logout</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                      <li class="dropdown">
                        <a href="/dashboard">Dashboard</a>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>
        @yield('content')
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
@endif
