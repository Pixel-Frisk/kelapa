@extends('layouts/master')

@section('judul')
<title>Edit User</title>
@endsection

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Edit</h1>
    </div>
      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-7">
          <div class="card">
            <form action="/users/{{$users->id}}/update" method="post">
              @csrf
              <div class="card-header">
                <h4>Form Edit</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                      <label>Nama</label>
                      <input name="nama" type="text" class="form-control" value="{{$users->nama}}" required>
                      <div class="invalid-feedback">
                        Tolong isi Nama
                      </div>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Username</label>
                      <input name="email" type="text" class="form-control" value="{{$users->email}}" required>
                      <div class="invalid-feedback">
                        Tolong isi Username
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                      <label>HP</label>
                      <input name="hp" type="number" class="form-control" value="{{$users->noHP}}" required>
                      <div class="invalid-feedback">
                        Tolong isi Nomer Telepon
                      </div>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Alamat</label>
                      <textarea rows="3" name="alamat" class="form-control" id="alamat" required>{{$users->alamat}}</textarea>
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
                    @if($users->status == 'sopir')
                    <div class="form-group col-md-6 col-12">
                      <label>Gaji</label>
                      <input name="gaji" type="number" class="form-control" value="{{$users->gaji}}" required>
                      <div class="invalid-feedback">
                        Tolong isi Gaji
                      </div>
                    </div>
                    @endif
                  </div>
              </div>
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-secondary">save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
