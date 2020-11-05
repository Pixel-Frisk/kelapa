@extends('layouts/master')

@section('judul')
<title>Edit User</title>
@endsection

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Profile</h1>
      <div class="section-header-breadcrumb">
        <div class="btn btn-outline-primary"><a href="{{ url('/pedagang')}}">Kembali</a></div>
      </div>
    </div>
      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-7">
          <div class="card">
            <form action="/users/{{$users->id}}/updatePB" method="post" class="needs-validation" novalidate="">
              @csrf
              <div class="card-header">
                <h4>Edit Profile</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                      <label>Nama</label>
                      <input name="name" type="text" class="form-control" value="{{$users->name}}" required>
                      <div class="invalid-feedback">
                        Tolong isi Nama
                      </div>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Email</label>
                      <input name="email" type="email" class="form-control" value="{{$users->email}}" required>
                      <div class="invalid-feedback">
                        Tolong isi Username
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                      <label>Password</label>
                      <input name="password" type="text" class="form-control" value="{{$users->password}}" required>
                      <div class="invalid-feedback">
                        Tolong isi Password
                      </div>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>HP</label>
                      <input name="hp" type="number" class="form-control" value="{{$users->hp}}" required>
                      <div class="invalid-feedback">
                        Tolong isi Nomer Telepon
                      </div>
                    </div>
                  </div>
              </div>
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-secondary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
