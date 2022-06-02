@extends('admin.layouts.app', [
    'activePage' => 'produk',
  ])

@section('content')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Data Produk</h3>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <a href="/" target="_blank">
                    <button type="button" class="btn btn-outline-primary btn-md"><i class="ti-home mr-2"></i> Visit Homepage</button>
                  </a>
                 </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <h3><i class="mdi mdi-library-plus"></i> Tambah Data Produk</h3>
                    <a href="/admin/produk">
                      <button type="button" class="btn btn-inverse-info btn-rounded btn-sm"><i class="ti-arrow-left mr-1"></i> Back</button>
                    </a>
                  </div>
                  <hr>
                  <form class="forms-sample" action="/admin/produk/create" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="exampleInputUsername1">Nama</label>
                      <input type="text" autofocus required class="form-control" name="nama" placeholder="Masukan Nama Produk...">
                    </div>

                    <div class="col-md-6 mb-3">
                      <label for="exampleInputUsername1">Deskripsi</label>
                      <input type="text" autofocus required class="form-control" name="deskripsi" placeholder="Masukan Deskripsi...">
                    </div>

                    <div class="col-md-6 mb-3">
                      <label for="exampleInputUsername1">Harga</label>
                      <input type="text" autofocus required class="form-control" name="harga" placeholder="Masukan Harga...">
                    </div>

                    <div class="col-md-6 mb-3">
                      <label>Satuan</label>
                      <select required name="id_satuan" class="js-example-basic-single w-100">
                        <option value="">-- Pilih Nama Satuan ---</option>
                        @foreach($satuan as $data)
                        <option value="{{$data->id}}">{{$data->nama}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="col-md-6 mb-3">
                      <label>Jenis</label>
                      <select required name="id_jenis" class="js-example-basic-single w-100">
                        <option value="">-- Pilih Jenis Produk ---</option>
                        @foreach($jenis as $data)
                        <option value="{{$data->id}}">{{$data->nama}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="col-md-6 mb-3">
                      <label for="exampleInputUsername1">Foto</label>
                      <input type="file" autofocus required class="form-control" name="foto">
                    </div>

                    <button type="submit" class="btn btn-primary mt-1 mr-2"><i class="mdi mdi-content-save-all"></i> Tambah Data</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
@endsection
