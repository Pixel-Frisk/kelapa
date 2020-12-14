@extends('layouts/master')

@section('judul')
<title>Dashboard</title>
@endsection

@if(auth()->user()->status == 'admin')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Penyaluran</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data</h4>
            </div>
            <div class="card-body">
              <table class="table table-striped" id="sortable-table">
                <thead>
                  <tr>
                    <th>Tanggal Kirim</th>
                    <th>Tanggal Terima</th>
                    <th>id Kendaraan</th>
                    <th>Nama PB</th>
                    <th>No. Penjualan</th>
                    <th>Status Pengiriman</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($penyaluran as $key => $penyaluran)
                  <tr>
                    <td>{{$penyaluran->tanggalKirim}}</td>
                    <td>{{$penyaluran->tanggalTerima}}</td>
                    <td>{{$penyaluran->id_kendaraan}}</td>
                    <td>{{$penyaluran->nama}}</td>
                    <td>{{$penyaluran->id_penjualan}}</td>
                    <td>{{$penyaluran->status}}</td>
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
                    <p><font size="6">{{auth()->user()->nama}}</font></p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<section class="first-feature">
    <div class="container">
        <div class="all-features">
          <a href="/profilPB/{{auth()->user()->id}}">
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
                          <h5>Akun</h5>
                          <p>Sopir</p>
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
                    <p><font size="6">{{auth()->user()->nama}}</font></p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<section class="first-feature">
    <div class="container">
      <div>
        <center>
          @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
          @endif
          @if (session('gagal'))
            <div class="alert alert-danger">
              {{ session('gagal') }}
            </div>
          @endif
        </center>
      </div>
      <br>
        <div class="all-features">
          <a href="/profilSopir/{{auth()->user()->id}}">
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
                          <h5>Akun</h5>
                          <p>Pedagang Besar</p>
                      </div>
                  </div>
              </div>
          </a>
        </div>
    </div>
</section>
@endsection
@endif
