@extends('layouts/master')

@section('judul')
<title>Data Penjulan</title>
@endsection
@section('content')
<div class="clearfix"></div>
<!-- Header Title Start -->
  <section class="inner-header-title blank">
    <div class="container">
      <h1>Penjualan</h1>
    </div>
  </section>
  <div class="clearfix"></div>
  <!-- Header Title End -->

  <!-- General Detail Start -->
  <div class="detail-desc section">
    <div class="container">
      <div class="ur-detail-wrap create-kit padd-bot-0">

        <div class="row">
          <div class="detail-pic js">
            <div class="box">
              <input type="file" name="upload-pic[]" id="upload-pic" class="inputfile" disabled/>
              <label for="upload-pic"><i class="fa fa-upload" aria-hidden="true"></i><span></span></label>
            </div>
          </div>
        </div>

        <div class="row bottom-mrg">
          <form class="add-feild">

            <div class="col-md-6 col-sm-6">
              <div class="input-group">
                <p>Nama Item</p>
                <input name="name" type="text" class="form-control" value="{{$penjualan->namaItem}}" disabled>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="input-group">
                <p>Quantity</p>
                <input name="hp" type="text" class="form-control" value="{{$penjualan->quantity}}" disabled>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="input-group">
                <p>Harga</p>
                <input name="hp" type="text" class="form-control" value="{{$penjualan->harga}}" disabled>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="input-group">
                <p>Jenis Pembayaran</p>
                <input name="hp" type="text" class="form-control" value="{{$penjualan->jenisPembayaran}}" disabled>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="input-group">
                <p>Keterangan</p>
                <input name="hp" type="text" class="form-control" value="{{$penjualan->keterangan}}" disabled>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
