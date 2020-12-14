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
      <h1>Update Penyaluran</h1>
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
          <form action="/updatePenyalur/{{$penyaluran->id}}/{{auth()->user()->id}}" method="post" class="add-feild" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6 col-sm-6">
              <div class="input-group">
                <label>Status Pengiriman</label>
                <select name='status' class="form-control" required>
                  @if($penyaluran->status == 'sedang dalam perjalanan')
                    <option value='sedang dalam perjalanan'>sedang dalam perjalanan</option>
                    <option value='sampai dilokasi'>sampai dilokasi</option>
                  @endif
                  @if($penyaluran->status == 'sampai dilokasi')
                  <option value='sampai dilokasi'>sampai dilokasi</option>
                    <option value='sedang dalam perjalanan'>sedang dalam perjalanan</option>
                  @endif
                </select>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="input-group">
                <label>Kendala Pengiriman</label>
                <input name="kendala" type="file" class="form-control" value="{{$penyaluran->kendala}}">
              </div>
            </div>
          </div>
        <div class="row no-padd">
          <div class="detail pannel-footer">
            <div class="col-md-12 col-sm-12">
              <div class="detail-pannel-footer-btn pull-right">
                <button type="submit" class="footer-btn choose-cover">Save Change</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
@endsection
