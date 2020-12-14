@extends('layouts/master')

@section('judul')
<title>Data Penyaluran</title>
@endsection

@section('drop')
active
@endsection

@section('active')
class="active"
@endsection

@section('content')
<div class="clearfix"></div>
<!-- Header Title Start -->
  <section class="inner-header-title blank">
    <div class="container">
      <h1>Data Penyaluran</h1>
    </div>
  </section>
  <div class="clearfix"></div>
  <!-- Header Title End -->

  <!-- General Detail Start -->
  <div class="detail-desc section">
    <div class="container">
      <div class="ur-detail-wrap create-kit padd-bot-0">
        <div>
          <br>
          <br>
          <br>
        </div>
        <div class="row bottom-mrg">
          <form class="add-feild">
            <div class="col-md-12 col-sm-12">
              <div class="input-group">
                <p><font size="5"><b>Detail Penyaluran</b></font></p>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="input-group">
                <p>Tanggal Kirim</p>
                <input name="tanggalKirim" type="text" class="form-control" value="{{$detail->tanggalKirim}}" disabled>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="input-group">
                <p>Tanggal Terima</p>
                <input name="tanggalTerima" type="text" class="form-control" value="{{$detail->tanggalTerima}}" disabled>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="input-group">
                <p>Id Kendaraan</p>
                <input name="id_kendaraan" type="text" class="form-control" value="{{$detail->id_kendaraan}}" disabled>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="input-group">
                <p>Status Pengiriman</p>
                <input name="id_kendaraan" type="text" class="form-control" value="{{$detail->status}}" disabled>
              </div>
            </div>
            <div class="col-md-12 col-sm-12">
              <div class="input-group">
                <p><font size="5"><b>Detail Pedagang</b></font></p>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="input-group">
                <p>Nama</p>
                <input name="name" type="text" class="form-control" value="{{$detail->nama}}" disabled>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="input-group">
                <p>HP</p>
                <input name="hp" type="text" class="form-control" value="{{$detail->noHP}}" disabled>
              </div>
            </div>
            <div class="col-md-12 col-sm-12">
              <p>Alamat</p>
              <textarea name="alamt" class="form-control" disabled>{{$detail->alamat}}</textarea>
            </div>
            <div class="col-md-12 col-sm-12">
              <div class="input-group">
                <p><font size="5"><b>Detail Penjualan</b></font></p>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="input-group">
                <p>Nama Item</p>
                <input name="namaItem" type="text" class="form-control" value="{{$detail->namaItem}}" disabled>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="input-group">
                <p>Quantity</p>
                <input name="quantity" type="text" class="form-control" value="{{$detail->quantity}}" disabled>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="input-group">
                <p>Harga</p>
                <input name="harga" type="text" class="form-control" value="{{$detail->harga}}" disabled>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="input-group">
                <p>Jenis Pembayaran</p>
                <input name="jenisPembayaran" type="text" class="form-control" value="{{$detail->jenisPembayaran}}" disabled>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="input-group">
                <p>keterangan</p>
                <input name="keterangan" type="text" class="form-control" value="{{$detail->keterangan}}" disabled>
              </div>
            </div>
          </form>
        </div>

        <div class="row no-padd">
          <div class="detail pannel-footer">
            <div class="col-md-12 col-sm-12">
              <div class="detail-pannel-footer-btn pull-right">
                <a href="{{ url('/dashboard')}}" class="footer-btn choose-cover">kembali ke dashboard</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
