@extends('layouts/master')

@section('judul')
<title>Pedagang</title>
@endsection

@section('drop')
active
@endsection

@section('active')
class="active"
@endsection

@section('content')
<div class="main-content">
  <div class="modal fade Top" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Form Pedagang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- Menambah Akun Sopir -->
        <div class="modal-body">
          <form action="/users/createPB" method="post">
            @csrf
            <div class="form-group">
              <label for="name">Nama</label>
              <input name="name" type="text" class="form-control" id="name" required>
            </div>
            <div class="form-group">
              <label for="email">Username</label>
              <input name="email" type="text" class="form-control" id="email" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input name="password" type="text" class="form-control" id="password" required>
            </div>
            <div class="form-group">
              <label for="hp">HP</label>
              <input name="hp" type="number" class="form-control" id="hp" required>
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea name="alamat" class="form-control" id="alamat" rows="3" required></textarea>
            </div>
            <div class="modal-footer bg-whitesmoke br">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <section class="section">
    <div class="section-header">
      <h1>Table</h1>
      <div class="section-header-breadcrumb">
      </div>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
            @endif
            @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
            <div class="card-header">
              <h4>Data Pedagang Besar</h4>
              <div class="card-header-action">
                <form method="get" action="/pedagang">
                  <div class="input-group">
                    <input name="cari" type="text" class="form-control" placeholder="Search">
                    <div class="input-group-btn">
                      <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                    <button type="button" class="btn btn-primary float-right ml-1" data-toggle="modal" data-target="#exampleModal">
                      +
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped" id="sortable-table">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Hp</th>
                      <th>Alamat</th>
                      <th>Status Aktif</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data_users as $users)
                    <tr>
                      <td>{{$users->name}}</td>
                      <td>{{$users->email}}</td>
                      <td>{{$users->hp}}</td>
                      <td>{{$users->alamat}}</td>
                      <td>{{$users->statusAcc}}</td>
                      <td><a href="/users/{{$users->id}}/edit" class="btn btn-secondary">Edit</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
