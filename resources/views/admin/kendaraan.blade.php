@extends('layouts/master')

@section('judul')
<title>Kendaraan</title>
@endsection

@section('truck')
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
        <!-- Menambah Akun Kendaraan -->
        <div class="modal-body">
          <form action="/createKendaraan" method="post">
            @csrf
            <div class="form-group">
              <label for="id_kendaraan">ID Kendaraan</label>
              <input name="id_kendaraan" type="text" class="form-control" id="id_kendaraan" required>
            </div>
            <div class="form-group">
              <label for="nama">Nama Kendaraan</label>
              <input name="nama" type="text" class="form-control" id="nama" required>
            </div>
            <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <input name="keterangan" type="text" class="form-control" id="keterangan" required>
            </div>
            <div class="modal-footer bg-whitesmoke br">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
              <button type="submit" class="btn btn-primary">save changes</button>
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
            @if (session('stok'))
              <div class="alert alert-danger">
                {{ session('stok') }}
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
              <h4>Data Kendaraan</h4>
              <div class="card-header-action">
                <form method="get" action="/searchTransaksi">
                  <div class="input-group">
                    <!-- <input name="cari" type="text" class="form-control" placeholder="Search">
                    <div class="input-group-btn">
                      <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div> -->
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
                      <th>Id</th>
                      <th>Nama Kendaraan</th>
                      <th>Keterangan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($kendaraan as $key => $kendaraan)
                    <tr>
                      <td>{{$kendaraan->id_kendaraan}}</td>
                      <td>{{$kendaraan->nama}}</td>
                      <td>{{$kendaraan->keterangan}}</td>
                      <td>
                      <a href="/editKendaraan/{{$kendaraan->id}}" class="btn btn-secondary">Edit</a>
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
