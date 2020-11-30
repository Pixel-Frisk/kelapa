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
            <form action="/updatePembelian/{{$pembelian->id}}" method="post" class="needs-validation" novalidate="">
              @csrf
              <div class="card-header">
                <h4>Form Edit</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                      <label>Tanggal</label>
                      <input name="tanggal" type="datetime" class="form-control" value="{{$pembelian->tanggal}}" required>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>No. Pembelian</label>
                      <input name="id" type="number" class="form-control" value="{{$pembelian->id}}" required disabled>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Nama Item</label>
                      <select name='namaItem' class="form-control">
                        @if($pembelian->namaItem == 'Buah Kelapa')
                          <option selected value='Buah Kelapa'>Buah Kelapa</option>
                          <option value='Gaji Karyawan'>Gaji Karyawan</option>
                          <option value='Pemeliharaan'>Pemeliharaan</option>
                          <option value='Bonus Karyawan'>Bonus Karyawan</option>
                          <option value='Lainnya'>Lainnya</option>
                        @endif
                        @if($pembelian->namaItem == 'Gaji Karyawan')
                          <option value='Buah Kelapa'>Buah Kelapa</option>
                          <option selected value='Gaji Karyawan'>Gaji Karyawan</option>
                          <option value='Pemeliharaan'>Pemeliharaan</option>
                          <option value='Bonus Karyawan'>Bonus Karyawan</option>
                          <option value='Lainnya'>Lainnya</option>
                        @endif
                        @if($pembelian->namaItem == 'Pemeliharaan')
                          <option value='Buah Kelapa'>Buah Kelapa</option>
                          <option value='Gaji Karyawan'>Gaji Karyawan</option>
                          <option selected value='Pemeliharaan'>Pemeliharaan</option>
                          <option value='Bonus Karyawan'>Bonus Karyawan</option>
                          <option value='Lainnya'>Lainnya</option>
                        @endif
                        @if($pembelian->namaItem == 'Bonus Karyawan')
                          <option value='Buah Kelapa'>Buah Kelapa</option>
                          <option value='Gaji Karyawan'>Gaji Karyawan</option>
                          <option value='Pemeliharaan'>Pemeliharaan</option>
                          <option selected value='Bonus Karyawan'>Bonus Karyawan</option>
                          <option value='Lainnya'>Lainnya</option>
                        @endif
                        @if($pembelian->namaItem == 'Lainnya')
                          <option value='Buah Kelapa'>Buah Kelapa</option>
                          <option value='Gaji Karyawan'>Gaji Karyawan</option>
                          <option value='Pemeliharaan'>Pemeliharaan</option>
                          <option value='Bonus Karyawan'>Bonus Karyawan</option>
                          <option selected value='Lainnya'>Lainnya</option>
                        @endif
                      </select>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Nama Penjual</label>
                      <input name="namaPenjual" type="text" class="form-control" value="{{$pembelian->namaPenjual}}" required>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Quantity</label>
                      <input name="quantity" type="number" class="form-control" value="{{$pembelian->quantity}}" required>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Harga</label>
                      <input name="harga" type="number" class="form-control" value="{{$pembelian->harga}}" required>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Keterangan</label>
                      <input name="keterangan" type="text" class="form-control" value="{{$pembelian->keterangan}}" required>
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
