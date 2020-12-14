@extends('layouts/master')

@section('judul')
<title>Penyaluran</title>
@endsection

@section('penyaluran')
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
        <!-- Menambah Akun Sopir -->
        <div class="modal-body">
          <form action="/createPenyaluran" method="post">
            @csrf
            <div class="form-group">
              <label for="tanggalKirim">Tanggal Kirim</label>
              <input name="tanggalKirim" type="date" class="form-control" id="tanggalKirim" required>
            </div>
            <div class="form-group">
              <label for="tanggalTerima">Tanggal Terima</label>
              <input name="tanggalTerima" type="date" class="form-control" id="tanggalTerima" required>
            </div>
            <div class="form-group">
              <label>Sopir</label>
              <select name='id_sopir' class="form-control">
              @foreach ($user as $key => $sopir)
              @if($sopir->status == 'sopir')
                <option value='{{$sopir->id}}'>{{$sopir->nama}}</option>
              @endif
              @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Tujuan</label>
              <select name='id_pb' class="form-control">
              @foreach ($user as $key => $pedagang)
              @if($pedagang->status == 'pedagang')
                <option value='{{$pedagang->id}}'>{{$pedagang->nama}}</option>
              @endif
              @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="id_kendaraan">Id Kendaraan</label>
              <input name="id_kendaraan" type="text" class="form-control" id="id_kendaraan" required>
            </div>
            <div class="form-group">
              <label for="id_penjualan">No Penjualan</label>
              <input name="id_penjualan" type="number" class="form-control" id="id_penjualan" required>
            </div>
            <div class="form-group">
              <label>Status Penyaluran</label>
              <select name='status' class="form-control">
                <option value='sedang dikemas'>sedang dikemas</option>
                <option value='sedang dalam perjalanan'>sedang dalam perjalanan</option>
                <option value='sampai dilokasi'>sampai dilokasi</option>
              </select>
            </div>
            <div class="modal-footer bg-whitesmoke br">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
              <button type="submit" class="btn btn-primary">save changes</button>
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
            @if (session('gagal'))
              <div class="alert alert-danger">
                {{ session('gagal') }}
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
              <h4>Data Penyaluran</h4>
              <div class="card-header-action">
                <form method="get" action="/searchPenyaluran">
                  <div class="input-group">
                    <input name="cari" type="date" class="form-control" placeholder="Search">
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
                      <th>Tanggal Kirim</th>
                      <th>Tanggal Terima</th>
                      <th>id Kendaraan</th>
                      <th>Nama PB</th>
                      <th>No. Penjualan</th>
                      <th>Status Penyaluran</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($penyaluran as $key => $penyaluran)
                    <tr>
                      <td>{{$penyaluran->tanggalKirim}}</td>
                      <td>{{$penyaluran->tanggalTerima}}</td>
                      <td>{{$penyaluran->id_kendaraan}}</td>
                      <td>{{$penyaluran->nama}}</td>
                      <td>{{$penyaluran->id_penjualan}}</td>
                      <td>{{$penyaluran->status}}</td>
                      <td>
                      <a href="/editPenyaluran/{{$penyaluran->id}}" class="btn btn-secondary">Edit</a>
                      <a href="/deletePenyaluran/{{$penyaluran->id}}" class="btn btn-secondary" onclick="return confirm('apakah anda yakin ingin menghapusnya ?')">Delete</a>
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
