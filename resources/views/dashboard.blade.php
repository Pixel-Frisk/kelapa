@extends('layouts/master')

@section('judul')
<title>Dashboard</title>
@endsection

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Transaksi</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data</h4>
            </div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nama Sopir</th>
                    <th scope="col">Alamat Pengiriman</th>
                    <th scope="col">Tanggal Pengiriman</th>
                    <th scope="col">Tanggal Sampai</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $users)
                  <tr>
                    <td>{{$users->name}}</td>
                    <td>{{$users->alamat}}</td>
                    <td>{{$users->created_at}}</td>
                    <td>{{$users->updated_at}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
