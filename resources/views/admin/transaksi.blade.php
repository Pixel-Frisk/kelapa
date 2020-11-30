@extends('layouts/master')

@section('judul')
<title>Transaksi</title>
@endsection

@section('transaksi')
active
@endsection

@section('content')
<div class="main-content">
  <div class="modal fade Top" id="transaksiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data</h5>
          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
        </div>
        <div class="modal-body">
          <form>
            @csrf
            <div class="form-group">
              <label for="name">Faktur</label>
              <button type="button" class="btn btn-primary ml-1" data-toggle="modal" data-target="#penjualanModal">
                Penjualan
              </button>
            </div>
            <div class="form-group">
              <label for="name">Faktur</label>
              <button type="button" class="btn btn-primary ml-1" data-toggle="modal" data-target="#pembelianModal">
                Pembelian
              </button>
            </div>
            <div class="modal-footer bg-whitesmoke br">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade Top" id="penjualanModal" tabindex="-1" role="dialog" aria-labelledby="penjualanModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data</h5>
          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
        </div>
        <div class="modal-body">
          <form action="/penjualan/create" method="post">
            @csrf
            <div class="form-group">
              <label for="tanggal">Tanggal</label>
              <input name="tanggal" type="date" class="form-control" id="tanggalt" required>
            </div>
            <div class="form-group">
              <label for="id">No. Penjualan</label>
              <input name="id" type="number" class="form-control" id="id" required>
            </div>
            <div class="form-group">
              <label for="namaSupplier">Nama Supplier</label>
              <input name="namaSupplier" type="text" class="form-control" id="namaSupplier" required>
            </div>
            <div class="form-group">
              <label for="namaItem">Nama Item</label>
              <select name='namaItem' class="form-control">
                  <option value='Kelapa A'>Kelapa A</option>
                  <option value='Kelapa B'>Kelapa B</option>
                  <option value='Kelapa C'>Kelapa C</option>
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
  <div class="modal fade Top" id="pembelianModal" tabindex="-1" role="dialog" aria-labelledby="pembelianModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data</h5>
          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
        </div>
        <div class="modal-body">
          <form action="/pembelian/create" method="post">
            @csrf
            <div class="form-group">
              <label for="tanggal">Tanggal</label>
              <input name="tanggal" type="date" class="form-control" id="tanggal" required>
            </div>
            <div class="form-group">
              <label for="id">No. Pembelian</label>
              <input name="id" type="number" class="form-control" id="id" required>
            </div>
            <div class="form-group">
              <label for="namaItem">Nama Item</label>
              <select name='namaItem' class="form-control">
                  <option value='Buah Kelapa'>Buah Kelapa</option>
                  <option value='Gaji Karyawan'>Gaji Karyawan</option>
                  <option value='Pemeliharaan'>Pemeliharaan</option>
                  <option value='Bonus Karyawan'>Bonus Karyawan</option>
                  <option value='Lainnya'>Lainnya</option>
              </select>
            </div>
            <div class="form-group">
              <label for="namaPenjual">Nama Penjual</label>
              <input name="namaPenjual" type="text" class="form-control" id="namaPenjual" required>
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
              <h4>Data Transaksi</h4>
              <div class="card-header-action">
                <form method="get" action="">
                  <div class="input-group">
                    <!-- <input name="cari" type="text" class="form-control" placeholder="Search">
                    <div class="input-group-btn">
                      <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div> -->
                    <button type="button" class="btn btn-primary float-right ml-1" data-toggle="modal" data-target="#transaksiModal">
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
                      <th>No. Transaksi</th>
                      <th>Nama Item</th>
                      <th>Debit</th>
                      <th>Kredit</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($penjualan as $key => $penjualan)
                    <tr>
                      <td>{{$penjualan->tanggal}}</td>
                      <td>Penjualan</td>
                      <td>{{$penjualan->id}}</td>
                      <td>{{$penjualan->namaItem}}</td>
                      <td>{{$penjualan->harga}}</td>
                      <td>-</td>
                      <td>
                      <a href="/editPenjualan/{{$penjualan->id}}" class="btn btn-secondary">Edit</a>
                      </td>
                    </tr>
                    @endforeach
                    @foreach ($pembelian as $key => $pembelian)
                    <tr>
                      <td>{{$pembelian->tanggal}}</td>
                      <td>Pembelian</td>
                      <td>{{$pembelian->id}}</td>
                      <td>{{$pembelian->namaItem}}</td>
                      <td>-</td>
                      <td>{{$pembelian->harga}}</td>
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
@endsection
