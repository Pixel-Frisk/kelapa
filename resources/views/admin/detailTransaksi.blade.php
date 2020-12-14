@extends('layouts/master')

@section('judul')
<title>Detail Transaksi</title>
@endsection

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Detail</h1>
    </div>
      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-7">
          <div class="card">
            <form action="" method="" class="needs-validation" novalidate="">
              @csrf
              <div class="card-header">
                <h4>Form Detail</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                      <label>Tanggal</label>
                      <input name="tanggal" type="datetime" class="form-control" value="{{$transaksi->tanggal}}" required disabled>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>No</label>
                      <input name="id" type="number" class="form-control" value="{{$transaksi->id}}" required disabled>
                    </div>
                    @if($transaksi->faktur == 'Pengeluaran')
                    <div class="form-group col-md-6 col-12">
                      <label>Nama Item</label>
                      <select name='namaItem' class="form-control" disabled>
                        @if($transaksi->namaItem == 'Buah Kelapa')
                          <option selected value='Buah Kelapa'>Buah Kelapa</option>
                          <option value='Gaji Karyawan'>Gaji Karyawan</option>
                          <option value='Pemeliharaan'>Pemeliharaan</option>
                          <option value='Bonus Karyawan'>Bonus Karyawan</option>
                          <option value='Lainnya'>Lainnya</option>
                        @endif
                        @if($transaksi->namaItem == 'Gaji Karyawan')
                          <option value='Buah Kelapa'>Buah Kelapa</option>
                          <option selected value='Gaji Karyawan'>Gaji Karyawan</option>
                          <option value='Pemeliharaan'>Pemeliharaan</option>
                          <option value='Bonus Karyawan'>Bonus Karyawan</option>
                          <option value='Lainnya'>Lainnya</option>
                        @endif
                        @if($transaksi->namaItem == 'Pemeliharaan')
                          <option value='Buah Kelapa'>Buah Kelapa</option>
                          <option value='Gaji Karyawan'>Gaji Karyawan</option>
                          <option selected value='Pemeliharaan'>Pemeliharaan</option>
                          <option value='Bonus Karyawan'>Bonus Karyawan</option>
                          <option value='Lainnya'>Lainnya</option>
                        @endif
                        @if($transaksi->namaItem == 'Bonus Karyawan')
                          <option value='Buah Kelapa'>Buah Kelapa</option>
                          <option value='Gaji Karyawan'>Gaji Karyawan</option>
                          <option value='Pemeliharaan'>Pemeliharaan</option>
                          <option selected value='Bonus Karyawan'>Bonus Karyawan</option>
                          <option value='Lainnya'>Lainnya</option>
                        @endif
                        @if($transaksi->namaItem == 'Lainnya')
                          <option value='Buah Kelapa'>Buah Kelapa</option>
                          <option value='Gaji Karyawan'>Gaji Karyawan</option>
                          <option value='Pemeliharaan'>Pemeliharaan</option>
                          <option value='Bonus Karyawan'>Bonus Karyawan</option>
                          <option selected value='Lainnya'>Lainnya</option>
                        @endif
                      </select>
                    </div>
                    @endif
                    @if($transaksi->faktur == 'Pemasukan')
                    <div class="form-group col-md-6 col-12">
                      <label>Nama Item</label>
                      <select name='namaItem' class="form-control" disabled>
                        @if($transaksi->namaItem == 'Kelapa A')
                          <option selected value='Kelapa A'>Kelapa A</option>
                          <option value='Kelapa B'>Kelapa B</option>
                          <option value='Kelapa C'>Kelapa C</option>
                          <option value='Tempurung Kelapa'>Tempurung Kelapa</option>
                          <option value='Sabut Kelapa'>Sabut Kelapa</option>
                          <option value='Lainnya'>Lainnya</option>
                        @endif
                        @if($transaksi->namaItem == 'Kelapa B')
                          <option value='Kelapa A'>Kelapa A</option>
                          <option selected value='Kelapa B'>Kelapa B</option>
                          <option value='Kelapa C'>Kelapa C</option>
                          <option value='Tempurung Kelapa'>Tempurung Kelapa</option>
                          <option value='Sabut Kelapa'>Sabut Kelapa</option>
                          <option value='Lainnya'>Lainnya</option>
                        @endif
                        @if($transaksi->namaItem == 'Kelapa C')
                          <option value='Kelapa C'>Kelapa A</option>
                          <option value='Kelapa B'>Kelapa B</option>
                          <option selected value='Kelapa C'>Kelapa C</option>
                          <option value='Tempurung Kelapa'>Tempurung Kelapa</option>
                          <option value='Sabut Kelapa'>Sabut Kelapa</option>
                          <option value='Lainnya'>Lainnya</option>
                        @endif
                        @if($transaksi->namaItem == 'Tempurung Kelapa')
                          <option value='Kelapa C'>Kelapa A</option>
                          <option value='Kelapa B'>Kelapa B</option>
                          <option value='Kelapa C'>Kelapa C</option>
                          <option selected value='Tempurung Kelapa'>Tempurung Kelapa</option>
                          <option value='Sabut Kelapa'>Sabut Kelapa</option>
                          <option value='Lainnya'>Lainnya</option>
                        @endif
                        @if($transaksi->namaItem == 'Sabut Kelapa')
                          <option value='Kelapa C'>Kelapa A</option>
                          <option value='Kelapa B'>Kelapa B</option>
                          <option value='Kelapa C'>Kelapa C</option>
                          <option value='Tempurung Kelapa'>Tempurung Kelapa</option>
                          <option selected value='Sabut Kelapa'>Sabut Kelapa</option>
                          <option value='Lainnya'>Lainnya</option>
                        @endif
                        @if($transaksi->namaItem == 'Lainnya')
                          <option value='Kelapa C'>Kelapa A</option>
                          <option value='Kelapa B'>Kelapa B</option>
                          <option value='Kelapa C'>Kelapa C</option>
                          <option value='Tempurung Kelapa'>Tempurung Kelapa</option>
                          <option value='Sabut Kelapa'>Sabut Kelapa</option>
                          <option selected value='Lainnya'>Lainnya</option>
                        @endif
                      </select>
                    </div>
                    @endif
                    @if($transaksi->faktur == 'Pengeluaran')
                    <div class="form-group col-md-6 col-12">
                      <label>Nama Penjual</label>
                      <input name="namaPenjual" type="text" class="form-control" value="{{$transaksi->namaPenjual}}" required disabled>
                    </div>
                    @endif
                    @if($transaksi->faktur == 'Pemasukan')
                    <div class="form-group col-md-6 col-12">
                      <label>Nama Supplier</label>
                      <input name="namaSupplier" type="text" class="form-control" value="{{$transaksi->namaSupplier}}" required disabled>
                    </div>
                    @endif
                    <div class="form-group col-md-6 col-12">
                      <label>Quantity</label>
                      <input name="quantity" type="number" class="form-control" value="{{$transaksi->quantity}}" required disabled>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Harga</label>
                      <input name="harga" type="number" class="form-control" value="{{$transaksi->harga}}" required disabled>
                    </div>
                    @if($transaksi->faktur == 'Pemasukan')
                    <div class="form-group col-md-6 col-12">
                      <label>Jenis Pembayaran</label>
                      <select name='jenisPembayaran' class="form-control" disabled>
                        @if($transaksi->jenisPembayaran == 'Cash')
                          <option selected value='Cash'>Cash</option>
                          <option value='Hutang'>Hutang</option>
                        @endif
                        @if($transaksi->jenisPembayaran == 'Hutang')
                          <option value='Cash'>Cash</option>
                          <option selected value='Hutang'>Hutang</option>
                        @endif
                      </select>
                    </div>
                    @endif
                    <div class="form-group col-md-6 col-12">
                      <label>Status</label>
                      <input name="keterangan" type="text" class="form-control" value="{{$transaksi->keterangan}}" required disabled>
                    </div>
                  </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
