@extends('layouts/master')

@section('judul')
<title>Profile Sopir</title>
@endsection
@section('content')
<div class="clearfix"></div>
<!-- Header Title Start -->
  <section class="inner-header-title blank">
    <div class="container">
      <h1>Profile</h1>
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
                <input name="name" type="text" class="form-control" value="{{$user->nama}}" disabled>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="input-group">
                <p>HP</p>
                <input name="hp" type="text" class="form-control" value="{{$user->noHP}}" disabled>
              </div>
            </div>
            <div class="col-md-12 col-sm-12">
              <p>Alamat</p>
              <textarea name="alamt" class="form-control" disabled>{{$user->alamat}}</textarea>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
