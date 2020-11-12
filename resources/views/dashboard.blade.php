@extends('layouts/master')

@section('judul')
<title>Dashboard</title>
@endsection

@if(auth()->user()->status == 'admin')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Transaksi</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data</h4>
            </div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nama Sopir</th>
                    <th scope="col">Alamat Pengiriman</th>
                    <th scope="col">Tanggal Pengiriman</th>
                    <th scope="col">Tanggal Sampai</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $users)
                  <tr>
                    <td>{{$users->name}}</td>
                    <td>{{$users->alamat}}</td>
                    <td>{{$users->created_at}}</td>
                    <td>{{$users->updated_at}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
@endif

@if(auth()->user()->status == 'pedagang')
@section('content')
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
                    <p><font size="6">{{auth()->user()->name}}</font></p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<section class="first-feature">
    <div class="container">
        <div class="all-features">
          <a href="/profile/{{auth()->user()->id}}">
              <div class="col-md-6 col-sm-6 small-padding">
                  <div class="job-feature">
                      <div class="feature-caption">
                          <h5>Akun</h5>
                          <p>Melihat Akun Anda</p>
                      </div>
                  </div>
              </div>
            </a>
            <a href="/sop/{{auth()->user()->id}}">
              <div class="col-md-6 col-sm-6 small-padding">
                  <div class="job-feature">
                      <div class="feature-caption">
                          <h5>Sopir</h5>
                          <p>Detail Akun Sopir</p>
                      </div>
                  </div>
              </div>
          </a>
        </div>
    </div>
</section>
@endsection
@endif

@if(auth()->user()->status == 'sopir')
@section('content')
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
                    <p><font size="6">Nama</font></p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<section class="first-feature">
    <div class="container">
        <div class="all-features">
          <a href="/profile/{{auth()->user()->id}}">
              <div class="col-md-6 col-sm-6 small-padding">
                  <div class="job-feature">
                      <div class="feature-caption">
                          <h5>Akun</h5>
                          <p>Melihat Akun Anda</p>
                      </div>
                  </div>
              </div>
            </a>
            <a href="/ped/{{auth()->user()->id}}">
              <div class="col-md-6 col-sm-6 small-padding">
                  <div class="job-feature">
                      <div class="feature-caption">
                          <h5>Pedagang</h5>
                          <p>Detail Akun Pedagang</p>
                      </div>
                  </div>
              </div>
          </a>
        </div>
    </div>
</section>
@endsection
@endif
