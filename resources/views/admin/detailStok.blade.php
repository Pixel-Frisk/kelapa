@extends('layouts/master')

@section('judul')
<title>Detail Stok</title>
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
                  <div class="form-group col-md-12 col-12">
                    <label>Tanggal</label>
                    <input name="created_at" type="datetime" class="form-control" value="{{$stok->created_at}}" required disabled>
                  </div>
                  <div class="form-group col-md-4 col-12">
                    <label>Kelapa Masuk A</label>
                    <input name="keMasA" type="text" class="form-control" value="{{$stok->keMasA}}" required disabled>
                  </div>
                  <div class="form-group col-md-4 col-12">
                    <label>Kelapa Masuk B</label>
                    <input name="keMasB" type="text" class="form-control" value="{{$stok->keMasB}}" required disabled>
                  </div>
                  <div class="form-group col-md-4 col-12">
                    <label>Kelapa Masuk A</label>
                    <input name="keMasC" type="text" class="form-control" value="{{$stok->keMasC}}" required disabled>
                  </div>
                  <div class="form-group col-md-4 col-12">
                    <label>Kelapa Keluar A</label>
                    <input name="keKelA" type="text" class="form-control" value="{{$stok->keKelA}}" required disabled>
                  </div>
                  <div class="form-group col-md-4 col-12">
                    <label>Kelapa Keluar B</label>
                    <input name="keKelB" type="text" class="form-control" value="{{$stok->keKelB}}" required disabled>
                  </div>
                  <div class="form-group col-md-4 col-12">
                    <label>Kelapa Keluar C</label>
                    <input name="keKelC" type="text" class="form-control" value="{{$stok->keKelC}}" required disabled>
                  </div>
                  <div class="form-group col-md-4 col-12">
                    <label>Stok A</label>
                    <input name="stokA" type="text" class="form-control" value="{{$stok->stokA}}" required disabled>
                  </div>
                  <div class="form-group col-md-4 col-12">
                    <label>Stok B</label>
                    <input name="stokB" type="text" class="form-control" value="{{$stok->stokB}}" required disabled>
                  </div>
                  <div class="form-group col-md-4 col-12">
                    <label>Stok C</label>
                    <input name="stokC" type="text" class="form-control" value="{{$stok->stokC}}" required disabled>
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
