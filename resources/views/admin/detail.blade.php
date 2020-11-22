@extends('layouts/master')

@section('judul')
<title>Detail User</title>
@endsection

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Detail</h1>
      <div class="section-header-breadcrumb">
        @if($users->status == 'pb')
        <div class="btn btn-outline-primary"><a href="{{ url('/pedagang')}}">Kembali</a></div>
        @endif
        @if($users->status == 'sopir')
        <div class="btn btn-outline-primary"><a href="{{ url('/sopir')}}">Kembali</a></div>
        @endif
      </div>
    </div>
      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-7">
          <div class="card">
            <form>
              @csrf
              <div class="card-header">
                <h4>Form Detail</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                      <label>Nama</label>
                      <input name="name" type="text" class="form-control" value="{{$users->name}}" required disabled>
                      <div class="invalid-feedback">
                        Tolong isi Nama
                      </div>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Username</label>
                      <input name="email" type="text" class="form-control" value="{{$users->email}}" required disabled>
                      <div class="invalid-feedback">
                        Tolong isi Username
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                      <label>HP</label>
                      <input name="hp" type="number" class="form-control" value="{{$users->hp}}" required disabled>
                      <div class="invalid-feedback">
                        Tolong isi Nomer Telepon
                      </div>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Alamat</label>
                      <textarea rows="3" name="alamat" class="form-control" id="alamat" required disabled>{{$users->alamat}}</textarea>
                      <div class="invalid-feedback">
                        Tolong isi Alamat
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                      <label>Status Aktif</label>
                      <select name='statusAcc' class="form-control">
                        @if($users->statusAcc == 'on')
                          <option value='on'>On</option>
                          <option value='off'>Off</option>
                        @endif
                        @if($users->statusAcc == 'off')
                          <option value='off'>Off</option>
                          <option value='on'>On</option>
                        @endif
                      </select>
                      <div class="invalid-feedback">
                        Tolong isi Status
                      </div>
                    </div>
                  </div>
              </div>
              <div class="card-footer text-right">
                @if($users->status == 'pedagang')
                <a href="/pedagang" class="btn btn-primary">Back</a>
                @endif
                @if($users->status == 'sopir')
                <a href="/sopir" class="btn btn-primary">Back</a>
                @endif
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
