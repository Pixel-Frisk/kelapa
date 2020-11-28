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
      <div class="col-md-3 col-sm-3">
        <span class="cmp-time">Tanggal</span>
      </div>
    </div>
    <div class="mng-company-name">
      <div class="col-md-3 col-sm-3">
        <span class="cmp-time">Nama Sopir</span>
      </div>
    </div>
    <div class=class="mng-company-name">
      <div class="col-md-3 col-sm-3">
        <span class="cmp-time">Nomor Hp</span>
      </div>
    </div>
    <div class=class="mng-company-name">
      <div class="col-md-3 col-sm-3">
        <span class="cmp-time">Alamat</span>
      </div>
    </div>
    @foreach($users as $row)
    <article>
      <div class="mng-company">
        <div class="col-md-3 col-sm-3">
          <div class="mng-company-name">
            <span class="cmp-time">{{$row->created_at}}</span>
          </div>
        </div>
        <div class="col-md-3 col-sm-3">
          <div class="mng-company-name">
            <span class="cmp-time">{{$row->name}}</span>
          </div>
        </div>
        <div class="col-md-3 col-sm-3">
          <div class="mng-company-name">
            <span class="cmp-time">{{$row->hp}}</span>
          </div>
        </div>
        <div class="col-md-3 col-sm-3">
          <div class="mng-company-name">
            <span class="cmp-time">{{$row->alamat}}</span>
          </div>
        </div>
      </div>
      <div class="detail-pannel-footer-btn pull-right">
        <a href="{{ url('/dashboard')}}" class="footer-btn choose-cover">kembali ke dashboard</a>
      </div>
    </article>
    @endforeach
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
