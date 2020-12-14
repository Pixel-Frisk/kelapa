@extends('layouts/master')

@section('judul')
<title>Edit Penyaluran</title>
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
            <form action="/updatePenyaluran/{{$penyaluran->id}}" method="post">
              @csrf
              <div class="card-header">
                <h4>Form Edit</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                      <label>tanggalKirim</label>
                      <input name="tanggalKirim" type="datetime" class="form-control" value="{{$penyaluran->tanggalKirim}}" required>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>tanggalTerima</label>
                      <input name="tanggalTerima" type="datetime" class="form-control" value="{{$penyaluran->tanggalTerima}}" required>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Sopir</label>
                      <select name='id_sopir' class="form-control">
                        @foreach ($user as $key => $sopir)
                        @if($sopir->status == 'sopir' and $sopir->id == $penyaluran->id_sopir)
                          <option value='{{$sopir->id}}'>{{$sopir->nama}}</option>
                        @endif
                        @if($sopir->status == 'sopir' and $sopir->id != $penyaluran->id_sopir)
                          <option value='{{$sopir->id}}'>{{$sopir->nama}}</option>
                        @endif
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Tujuan</label>
                      <select name='id_pb' class="form-control">
                      @foreach ($user as $key => $pedagang)
                      @if($pedagang->status == 'pedagang' and $pedagang->id == $penyaluran->id_pb)
                        <option value='{{$pedagang->id}}'>{{$pedagang->nama}}</option>
                      @endif
                      @if($pedagang->status == 'pedagang' and $pedagang->id != $penyaluran->id_pb)
                        <option value='{{$pedagang->id}}'>{{$pedagang->nama}}</option>
                      @endif
                      @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Id Kendaraan</label>
                      <input name="id_kendaraan" type="text" class="form-control" value="{{$penyaluran->id_kendaraan}}" required>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>No Penjualan</label>
                      <input name="id_penjualan" type="text" class="form-control" value="{{$penyaluran->id_penjualan}}" required>
                    </div>
                    <div class="form-group col-md-6 col-12">
                      <label>Status</label>
                      <select name='status' class="form-control">
                      @if($penyaluran->status == 'sedang dikemas')
                        <option value='{{$penyaluran->status}}'>{{$penyaluran->status}}</option>
                        <option value="sedang dalam perjalanan">sedang dalam perjalanan</option>
                        <option value="sampai dilokasi">sampai dilokasi</option>
                      @endif
                      @if($penyaluran->status == 'sedang dalam perjalanan')
                        <option value='{{$penyaluran->status}}'>{{$penyaluran->status}}</option>
                        <option value="sedang dikemas">sedang dikemas</option>
                        <option value="sampai dilokasi">sampai dilokasi</option>
                      @endif
                      @if($penyaluran->status == 'sampai dilokasi')
                        <option value='{{$penyaluran->status}}'>{{$penyaluran->status}}</option>
                        <option value="sedang dikemas">sedang dikemas</option>
                        <option value="sedang dalam perjalanan">sedang dalam perjalanan</option>
                      @endif
                      </select>
                    </div>
                    @if($penyaluran->kendala!=null)
                    <div class="form-group col-md-12 col-12">
                      <label>Kendala</label>
                      <img src="{{asset('images/'.$penyaluran->kendala)}}" class="img-thumbnail" alt="Kendala">
                    </div>
                    @endif
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
