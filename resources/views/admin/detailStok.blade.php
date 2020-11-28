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
            <form action="" method="post" class="needs-validation" novalidate="">
              @csrf
              <div class="card-header">
                <h4>Form Detail</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6 col-12">
                    <label>Tipe Kelapa</label>
                    <input name="name" type="text" class="form-control" value="" required disabled>
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label>Kelapa Masuk</label>
                    <input name="name" type="text" class="form-control" value="" required disabled>
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label>Kelapa Keluar</label>
                    <input name="name" type="text" class="form-control" value="" required disabled>
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
