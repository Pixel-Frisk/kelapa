@extends('layouts/master')

@section('judul')
<title>Rekap Bulanan</title>
@endsection

@section('transaksi')
active
@endsection

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Rekap Bulanan</h1>
      <div class="section-header-breadcrumb">
      </div>
    </div>
    <div>
      <a href="/cetakPDF" type="button" class="btn btn-primary">Cetak</a>
      <br>
      <br>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Rekap Pengeluaran</h4>
              <div class="card-header-action">
                <!-- <form method="get" action="/rekapBulan">
                  <div class="input-group">
                    <input name="cari" type="date" class="form-control" placeholder="Search">
                    <div class="input-group-btn">
                      <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                    <button type="button" class="btn btn-primary float-right ml-1" data-toggle="modal" data-target="#transaksiModal">
                      Add
                    </button>
                    <a href="/rekap" type="button" class="btn btn-primary float-right ml-1">Rekap</a>
                  </div>
                </form> -->
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped" id="sortable-table">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>Faktur</th>
                      <th>Pengeluaran</th>
                      <th>Saldo</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($pengeluaran as $key => $pengeluaran)
                    <tr>
                      <td>{{$pengeluaran->tanggal}}</td>
                      <td>{{$pengeluaran->faktur}}</td>
                      <td>{{$pengeluaran->harga}}</td>
                      <td>{{$pengeluaran->saldo}}</td>
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
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Rekap Pemasukan</h4>
              <div class="card-header-action">
                <form method="get" action="/rekapBulan">
                  <!-- <div class="input-group">
                    <input name="cari" type="date" class="form-control" placeholder="Search">
                    <div class="input-group-btn">
                      <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                    <button type="button" class="btn btn-primary float-right ml-1" data-toggle="modal" data-target="#transaksiModal">
                      Add
                    </button>
                    <a href="/rekap" type="button" class="btn btn-primary float-right ml-1">Rekap</a>
                  </div> -->
                </form>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped" id="sortable-table">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>Faktur</th>
                      <th>Pemasukan</th>
                      <th>Saldo</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($pemasukan as $key => $pemasukan)
                    <tr>
                      <td>{{$pemasukan->tanggal}}</td>
                      <td>{{$pemasukan->faktur}}</td>
                      <td>{{$pemasukan->harga}}</td>
                      <td>{{$pemasukan->saldo}}</td>
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
