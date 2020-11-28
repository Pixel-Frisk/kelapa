@extends('layouts/master')

@section('judul')
<title>Stok</title>
@endsection

@section('stok')
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
          <form action="/users/createPB" method="post">
            @csrf
            <div class="form-group">
              <label for="name">Banyak Stok</label>
              <input name="name" type="text" class="form-control" id="stok" required>
            </div>
            <div class="modal-footer bg-whitesmoke br">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
              <button type="submit" class="btn btn-primary">save change</button>
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
              <h4>Data Stok</h4>
              <div class="card-header-action">
                <form method="get" action="">
                  <div class="input-group">
                    <input name="cari" type="text" class="form-control" placeholder="Search">
                    <div class="input-group-btn">
                      <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                    <!-- <button type="button" class="btn btn-primary float-right ml-1" data-toggle="modal" data-target="#exampleModal">
                      Add
                    </button> -->
                  </div>
                </form>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped" id="sortable-table">
                  <thead>
                    <tr>
                      <th rowspan="2"><center>Tanggal</center></th>
                      <th colspan="3"><center>Kelapa Masuk</center></th>
                      <th colspan="3"><center>Kelapa Keluar</center></th>
                      <th colspan="3"><center>Stock</center></th>
                      <th rowspan="2">Action</th>
                    </tr>
                    <tr>
                      <th><center>A</center></th>
                      <th><center>B</center></th>
                      <th><center>C</center></th>
                      <th><center>A</center></th>
                      <th><center>B</center></th>
                      <th><center>C</center></th>
                      <th><center>A</center></th>
                      <th><center>B</center></th>
                      <th><center>C</center></th>
                  </thead>
                  <tbody>
                    @foreach ($stok as $key => $stok)
                    <tr>
                      <td><center>{{$stok->created_at}}</center></td>
                      @if($stok->keMasA == 0)
                      <td><center>-</center></td>
                      @else
                      <td><center>{{$stok->keMasA}}</center></td>
                      @endif
                      @if($stok->keMasB == 0)
                      <td><center>-</center></td>
                      @else
                      <td><center>{{$stok->keMasB}}</center></td>
                      @endif
                      @if($stok->keMasC == 0)
                      <td><center>-</center></td>
                      @else
                      <td><center>{{$stok->keMasC}}</center></td>
                      @endif
                      @if($stok->keKelA == 0)
                      <td><center>-</center></td>
                      @else
                      <td><center>{{$stok->keKelA}}</center></td>
                      @endif
                      @if($stok->keKelB == 0)
                      <td><center>-</center></td>
                      @else
                      <td><center>{{$stok->keKelB}}</center></td>
                      @endif
                      @if($stok->keKelC == 0)
                      <td><center>-</center></td>
                      @else
                      <td><center>{{$stok->keKelC}}</center></td>
                      @endif
                      @if($stok->stokA == 0)
                      <td><center>-</center></td>
                      @else
                      <td><center>{{$stok->stokA}}</center></td>
                      @endif
                      @if($stok->stokB == 0)
                      <td><center>-</center></td>
                      @else
                      <td><center>{{$stok->stokB}}</center></td>
                      @endif
                      @if($stok->stokC == 0)
                      <td><center>-</center></td>
                      @else
                      <td><center>{{$stok->stokC}}</center></td>
                      @endif
                      <td>
                        <a href="/editStok/{{$stok->id}}" class="btn btn-secondary">Edit</a>
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
