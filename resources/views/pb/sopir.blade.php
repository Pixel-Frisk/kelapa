@extends('layouts/master')

@section('judul')
<title>Profile Sopir</title>
@endsection

@section('drop')
active
@endsection

@section('active2')
class="active"
@endsection

@section('content')
<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="inner-header-title" style="background-image:url({{asset('others/assets/img/kelapa.jpg')}});">
  <div class="container">
    <h1>Sopir</h1>
  </div>
</section>
<div class="clearfix"></div>
<section class="manage-company gray">
  <div class="container">
<div class="row" responsive>
  <div class="col-md-12">
    <div class="mng-company-name">
      <div class="col-md-2 col-sm-2">
        <span class="cmp-time">Tanggal Kirim</span>
      </div>
    </div>
    <div class="mng-company-name">
      <div class="col-md-2 col-sm-2">
        <span class="cmp-time">Status</span>
      </div>
    </div>
    <div class=class="mng-company-name">
      <div class="col-md-2 col-sm-2">
        <span class="cmp-time">Sopir</span>
      </div>
    </div>
    <div class="mng-company-name">
      <div class="col-md-2 col-sm-2">
        <span class="cmp-time">ID Kendaraan</span>
      </div>
    </div>
    <div class=class="mng-company-name">
      <div class="col-md-2 col-sm-2">
        <span class="cmp-time">No Penjualan</span>
      </div>
    </div>
    <div class=class="mng-company-name">
      <div class="col-md-2 col-sm-2">
        <span class="cmp-time">Qr Code</span>
      </div>
    </div>
    <article>
      @foreach($users as $row)
      <div class="mng-company">
        <div class="col-md-2 col-sm-2">
          <div class="mng-company-name">
            <span class="cmp-time">{{$row->tanggalKirim}}</span>
          </div>
        </div>
        <div class="col-md-2 col-sm-2">
          <div class="mng-company-name">
            <span class="cmp-time">{{$row->status}}</span>
          </div>
        </div>
        <div class="col-md-2 col-sm-2">
          <a href="/sopi/{{$row->nama}}">
          <div class="mng-company-name">
            <span class="cmp-time">{{$row->nama}}</span>
          </div>
          </a>
        </div>
        <div class="col-md-2 col-sm-2">
          <div class="mng-company-name">
            <span class="cmp-time">{{$row->id_kendaraan}}</span>
          </div>
        </div>
        <div class="col-md-2 col-sm-2">
          <a href="/penj/{{$row->id_penjualan}}">
          <div class="mng-company-name">
            <span class="cmp-time">{{$row->id_penjualan}}</span>
          </div>
          </a>
        </div>
        <div class="col-md-2 col-sm-2">
          <div class="brows-job-link">
            <a href="/qrcode/{{$row->id}}" class="btn btn-default">QR Code</a>
          </div>
        </div>
      </div>
      @endforeach
      <div class="detail-pannel-footer-btn pull-right">
        <a href="{{ url('/dashboard')}}" class="footer-btn choose-cover">kembali ke dashboard</a>
      </div>
    </article>
  </div>
</div>
</section>
<br>
<br>
<br>
<br>
<br>
<br>
@endsection
