@extends('layouts/master')

@section('judul')
<title>Profile</title>
@endsection

@if(auth()->user()->status == 'pedagang')
@section('drop')
active
@endsection

@section('active')
class="active"
@endsection
@endif

@if(auth()->user()->status == 'sopir')
@section('drop')
active
@endsection

@section('active2')
class="active"
@endsection
@endif

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
