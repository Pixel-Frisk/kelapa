@extends('layouts/master')

@section('judul')
<title>Transaksi</title>
@endsection

@section('transaksi')
active
@endsection

@section('content')
<div class="main-content">
  <div class="modal fade Top" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data</h5>
          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
        </div>
        <!-- Menambah Akun Sopir -->
        <div class="modal-body">
          <form action="" method="post">
            @csrf
            <div class="form-group">
              <label for="name">Nama Sopir</label>
              <select id="inputState" class="form-control" id="nameSopir" required>
                @foreach ($user as $key => $sopir)
                @if($sopir->status == 'sopir')
                <option>{{$sopir->name}}</option>
                @endif
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="email">Nama Pedangang</label>
              <select id="inputState" class="form-control" id="namePB" required>
                @foreach ($user as $key => $pb)
                @if($pb->status == 'pedagang')
                <option>{{$pb->name}}</option>
                @endif
                @endforeach
              </select>
            </div>
            <div class="modal-footer bg-whitesmoke br">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
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
              <h4>Data Transaksi</h4>
              <div class="card-header-action">
                <form method="get" action="">
                  <div class="input-group">
                    <input name="cari" type="text" class="form-control" placeholder="Search">
                    <div class="input-group-btn">
                      <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                    <button type="button" class="btn btn-primary float-right ml-1" data-toggle="modal" data-target="#exampleModal">
                      Add
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
                      <th>Nama Sopir</th>
                      <th>Alamat Pengiriman</th>
                      <th>Waktu Berangkat</th>
                      <th>Waktu Sampai</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($transaksi as $transaksi)
                    <tr>
                      <td>{{$transaksi->name}}</td>
                      <td>{{$transaksi->alamat}}</td>
                      <td>{{$transaksi->created_at}}</td>
                      <td>{{$transaksi->updated_at}}</td>
                      <td><a href="/detailTransaksi" class="btn btn-primary">Detail</a>
                      <a href="/editTransaksi" class="btn btn-secondary">Edit</a>
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
