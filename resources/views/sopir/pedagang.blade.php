@extends('layouts/master')

@section('judul')
<title>Profile Pedagang</title>
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
      <h1>Data Pedagang</h1>
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
                <p>Nama</p>
                <input name="name" type="text" class="form-control" value="{{$users->name}}" disabled>
              </div>
            </div>

            <div class="col-md-6 col-sm-6">
              <div class="input-group">
                <p>Status Akun</p>
                <select name="statusAcc" class="form-control input-lg" disabled>
                  @if($users->statusAcc == 'on')
                    <option value='on'>On</option>
                  @endif
                  @if($users->statusAcc == 'off')
                    <option value='off'>Off</option>
                  @endif
                </select>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="input-group">
                <p>HP</p>
                <input name="hp" type="text" class="form-control" value="{{$users->hp}}" disabled>
              </div>
            </div>
            <div class="col-md-12 col-sm-12">
              <p>Alamat</p>
              <textarea name="alamt" class="form-control" disabled>{{$users->alamat}}</textarea>
            </div>
          </form>
        </div>

        <div class="row no-padd">
          <div class="detail pannel-footer">
            <div class="col-md-12 col-sm-12">
              <div class="detail-pannel-footer-btn pull-right">
                <a href="{{ url('/dashboard')}}" class="footer-btn choose-cover">Kembali</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
