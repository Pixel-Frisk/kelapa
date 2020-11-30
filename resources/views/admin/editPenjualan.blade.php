@extends('layouts/master')

@section('judul')
<title>Edit Transaksi</title>
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
            <form action="/updatePenjualan/{{$penjualan->id}}" method="post" class="needs-validation" novalidate="">
              @csrf
              <div class="card-header">
                <h4>Form Edit</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6 col-12">
                    <label>Tanggal</label>
                    <input name="tanggal" type="datetime" class="form-control" value="{{$penjualan->tanggal}}" required>
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label>No. Penjualan</label>
                    <input name="id" type="text" class="form-control" value="{{$penjualan->id}}" required disabled>
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label>Nama Supplier</label>
                    <input name="namaSupplier" type="text" class="form-control" value="{{$penjualan->namaSupplier}}" required>
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label>Nama Item</label>
                    <select name='namaItem' class="form-control">
                      @if($penjualan->namaItem == 'Kelapa A')
                        <option selected value='Kelapa A'>Kelapa A</option>
                        <option value='Kelapa B'>Kelapa B</option>
                        <option value='Kelapa C'>Kelapa C</option>
                        <option value='Tempurung Kelapa'>Tempurung Kelapa</option>
                        <option value='Sabut Kelapa'>Sabut Kelapa</option>
                        <option value='Lainnya'>Lainnya</option>
                      @endif
                      @if($penjualan->namaItem == 'Kelapa B')
                        <option value='Kelapa A'>Kelapa A</option>
                        <option selected value='Kelapa B'>Kelapa B</option>
                        <option value='Kelapa C'>Kelapa C</option>
                        <option value='Tempurung Kelapa'>Tempurung Kelapa</option>
                        <option value='Sabut Kelapa'>Sabut Kelapa</option>
                        <option value='Lainnya'>Lainnya</option>
                      @endif
                      @if($penjualan->namaItem == 'Kelapa C')
                        <option value='Kelapa C'>Kelapa A</option>
                        <option value='Kelapa B'>Kelapa B</option>
                        <option selected value='Kelapa C'>Kelapa C</option>
                        <option value='Tempurung Kelapa'>Tempurung Kelapa</option>
                        <option value='Sabut Kelapa'>Sabut Kelapa</option>
                        <option value='Lainnya'>Lainnya</option>
                      @endif
                      @if($penjualan->namaItem == 'Tempurung Kelapa')
                        <option value='Kelapa C'>Kelapa A</option>
                        <option value='Kelapa B'>Kelapa B</option>
                        <option value='Kelapa C'>Kelapa C</option>
                        <option selected value='Tempurung Kelapa'>Tempurung Kelapa</option>
                        <option value='Sabut Kelapa'>Sabut Kelapa</option>
                        <option value='Lainnya'>Lainnya</option>
                      @endif
                      @if($penjualan->namaItem == 'Sabut Kelapa')
                        <option value='Kelapa C'>Kelapa A</option>
                        <option value='Kelapa B'>Kelapa B</option>
                        <option value='Kelapa C'>Kelapa C</option>
                        <option value='Tempurung Kelapa'>Tempurung Kelapa</option>
                        <option selected value='Sabut Kelapa'>Sabut Kelapa</option>
                        <option value='Lainnya'>Lainnya</option>
                      @endif
                      @if($penjualan->namaItem == 'Lainnya')
                        <option value='Kelapa C'>Kelapa A</option>
                        <option value='Kelapa B'>Kelapa B</option>
                        <option value='Kelapa C'>Kelapa C</option>
                        <option value='Tempurung Kelapa'>Tempurung Kelapa</option>
                        <option value='Sabut Kelapa'>Sabut Kelapa</option>
                        <option selected value='Lainnya'>Lainnya</option>
                      @endif
                    </select>
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label>Quantity</label>
                    <input name="quantity" type="number" class="form-control" value="{{$penjualan->quantity}}" required>
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label>Harga</label>
                    <input name="harga" type="number" class="form-control" value="{{$penjualan->harga}}" required>
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label>Jenis Pembayaran</label>
                    <select name='jenisPembayaran' class="form-control">
                      @if($penjualan->jenisPembayaran == 'Cash')
                        <option selected value='Cash'>Cash</option>
                        <option value='Hutang'>Hutang</option>
                      @endif
                      @if($penjualan->jenisPembayaran == 'Hutang')
                        <option value='Cash'>Cash</option>
                        <option selected value='Hutang'>Hutang</option>
                      @endif
                    </select>
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label>Keterangan</label>
                    <input name="keterangan" type="text" class="form-control" value="{{$penjualan->keterangan}}" required>
                  </div>
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
