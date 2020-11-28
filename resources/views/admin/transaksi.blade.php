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
        <div class="modal-body">
          <form action="/transaksi/create" method="post">
            @csrf
            <div class="form-group">
              <label for="name">Faktur</label>
              <select name='faktur' class="form-control">
                  <option value='Penjualan'>Penjualan</option>
                  <option value='Pembelian'>Pembelian</option>
              </select>
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input name="nama" type="text" class="form-control" id="nama" required>
            </div>
            <div class="form-group">
              <label for="namaItem">Nama Item</label>
              <select name='namaItem' class="form-control">
                  <option value='Kelapa A'>Kelapa A</option>
                  <option value='Kelapa B'>Kelapa B</option>
                  <option value='Kelapa C'>Kelapa C</option>
                  <option value='Gaji Karyawan'>Gaji Karyawan</option>
                  <option value='Pemeliharaan'>Pemeliharaan</option>
                  <option value='Bonus Karyawan'>Bonus Karyawan</option>
                  <option value='Tempurung Kelapa'>Tempurung Kelapa</option>
                  <option value='Sabut Kelapa'>Sabut Kelapa</option>
                  <option value='Lainnya'>Lainnya</option>
              </select>
            </div>
            <div class="form-group">
              <label for="quantity">Quantity</label>
              <input name="quantity" type="number" class="form-control" id="quantity" required>
            </div>
            <div class="form-group">
              <label for="harga">Harga</label>
              <input name="harga" type="number" class="form-control" id="harga" required>
            </div>
            <div class="form-group">
              <label for="jenisPembayaran">Jenis Pembayaran</label>
              <select name='jenisPembayaran' class="form-control">
                  <option value='Cash'>Cash</option>
                  <option value='Hutang'>Hutang</option>
              </select>
            </div>
            <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <input name="keterangan" type="text" class="form-control" id="keterangan" required>
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
            @if (session('item'))
              <div class="alert alert-danger">
                {{ session('item') }}
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
                      <th>Tanggal</th>
                      <th>Faktur</th>
                      <th>Nama Item</th>
                      <th>Debit</th>
                      <th>Kredit</th>
                      <th>Saldo</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($penjualan as $key => $penjualan)
                    <tr>
                      <td>{{$penjualan->created_at}}</td>
                      <td>{{$penjualan->faktur}}</td>
                      <td>{{$penjualan->namaItem}}</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>
                      <a href="/editPenjualan/{{$penjualan->id}}" class="btn btn-secondary">Edit</a>
                      </td>
                    </tr>
                    @endforeach
                    @foreach ($pembelian as $key => $pembelian)
                    <tr>
                      <td>{{$pembelian->created_at}}</td>
                      <td>{{$pembelian->faktur}}</td>
                      <td>{{$pembelian->namaItem}}</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>
                      <a href="/editPembelian/{{$pembelian->id}}" class="btn btn-secondary">Edit</a>
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
</script>
@endsection
