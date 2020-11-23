@extends('layouts/master')

@section('judul')
<title>Edit Transaksi</title>
@endsection

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Edit</h1>
      <div class="section-header-breadcrumb">
        <div class="btn btn-outline-primary"><a href="{{ url('/transaksi')}}">Kembali</a></div>
      </div>
    </div>
      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-7">
          <div class="card">
            <form action="" method="post" class="needs-validation" novalidate="">
              @csrf
              <div class="card-header">
                <h4>Form Edit</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                      <label>Nama Sopir</label>
                      <input name="name" type="text" class="form-control" value="" required>
                      <div class="invalid-feedback">
                        Tolong isi Nama
                      </div>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Nama PB</label>
                      <input name="name" type="text" class="form-control" value="" required>
                      <div class="invalid-feedback">
                        Tolong isi Nama
                      </div>
                    </div>
                  </div>
              </div>
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-secondary">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection