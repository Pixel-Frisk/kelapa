@extends('layouts/master')

@section('judul')
<title>Edit Kendaraan</title>
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
            <form action="/updateKendaraan/{{$kendaraan->id}}" method="post">
              @csrf
              <div class="card-header">
                <h4>Form Edit</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                      <label>id Kendaraan</label>
                      <input name="id_kendaraan" type="text" class="form-control" value="{{$kendaraan->id_kendaraan}}" required>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Nama Kendaraan</label>
                      <input name="nama" type="text" class="form-control" value="{{$kendaraan->nama}}" required>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Keterangan</label>
                      <input name="keterangan" type="text" class="form-control" value="{{$kendaraan->keterangan}}" required>
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
