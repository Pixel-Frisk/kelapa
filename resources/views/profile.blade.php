@extends('layouts/master')

@section('judul')
<title>Profile</title>
@endsection

@if(auth()->user()->status == 'admin')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Profile</h1>
      <div class="section-header-breadcrumb">
        <div class="btn btn-outline-primary"><a href="{{ url('/dashboard')}}">Kembali</a></div>
      </div>
    </div>
      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-7">
          <div class="card">
            <form>
              <div class="card-header">
                <h4>Profile</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                      <label>Nama</label>
                      <input name="name" type="text" class="form-control" value="{{$users->name}}" disabled>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Username</label>
                      <input name="email" type="text" class="form-control" value="{{$users->email}}" disabled>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                      <label>HP</label>
                      <input name="hp" type="number" class="form-control" value="{{$users->hp}}" disabled>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Alamat</label>
                      <textarea rows="3" name="alamat" class="form-control" id="alamat" disabled>{{$users->alamat}}</textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                      <label>Status Aktif</label>
                      <select name='statusAcc' class="form-control" disabled>
                        @if($users->statusAcc == 'on')
                          <option value='on'>On</option>
                        @endif
                        @if($users->statusAcc == 'off')
                          <option value='off'>Off</option>
                        @endif
                      </select>
                    </div>
                  </div>
              </div>
            </form>
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
<!-- Header Title Start -->
  <section class="inner-header-title blank">
    <div class="container">
      <h1>Profil</h1>
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
                <p>Username</p>
                <input name="email" type="text" class="form-control" value="{{$users->email}}" disabled>
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
                <a href="{{ url('/dashboard')}}" class="footer-btn choose-cover">Back</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@endif

@if(auth()->user()->status == 'sopir')
@section('content')
  <div class="clearfix"></div>

  <!-- Header Title Start -->
  <section class="inner-header-title blank">
    <div class="container">
      <h1>Profil</h1>
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
                <p>Username</p>
                <input name="email" type="text" class="form-control" value="{{$users->email}}" disabled>
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
                <a href="{{ url('/dashboard')}}" class="footer-btn choose-cover">Back</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@endif
