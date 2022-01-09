@extends('main')
@section('judul')
@if(auth()->user()->tipe_user_id=='1') 
        <title>Admin | Edit produk</title>
      @endif
@if(auth()->user()->tipe_user_id=='2') 
        <title>Staff | Edit produk</title>
        @endif
@endsection
@section('sidebar')

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="/" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        @if (auth()->user()->tipe_user_id == '1')
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Master User
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/tipe-user" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Tipe User
                </p>
              </a>
            </li>
            <li class="nav-item active">
              <a href="/user" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Data User
                </p>
              </a>
            </li>
          </ul>
        </li>
        @endif
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tools"></i>
            <p>
              Master Produk
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item active">
              <a href="/kategori-produk" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Kategori Produk
                </p>
              </a>
            </li>
            <li class="nav-item active">
              <a href="/produk" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Data Produk
                </p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
@endsection


@section('isi')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Perubahan Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Edit produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            
          <div class="col-12">
            <div class="card">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Produk</h5>
                    </div>
                    <div class="modal-body">
                    @foreach ($produk as $produk)
                    
                    <form action="/update-produk{{ $produk->id }}" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="position-relative form-group"><label>Nama produk</label><input name="nama" value="{{ $produk->nama }}" type="text" class="form-control"  required>
                        <div class="invalid-feedback">
                                        Masukkan nama produk !
                                    </div>
                        </div>
                        <div class="form-group"><label>Kategori</label>
                              <select class="form-control" name="kategori_id">
                                <option value="">-Pilih Kategori-</option>
                                @foreach ($kategori as $kategori => $value)
                                <option value="{{ $kategori }}">{{ $value }}</option>
                                @endforeach
                              </select>
                              <div class="invalid-feedback">
                                    Pilih kategori produk !
                              </div>
                          </div>
                          <div class="position-relative form-group"><label>Harga jual</label><input name="harga" type="number" value="{{ $produk->harga }}"  class="form-control"  required>
                              <div class="invalid-feedback">
                                    Masukkan harga !
                              </div>
                          </div>
                          <div class="position-relative form-group">
                              @if ($errors->any())
                              <div class="alert alert-danger">
                                <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                                </ul>
                              </div>
                              @endif
                              <label>Gambar (max.900kb)</label>
                              <input type="file" class="form-control" name="bill" title="jpg,jpeg,png(max.900kb)" id="bukti_pembayaran" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                              <div class="invalid-feedback">
                                      Masukkan gambar produk !
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                              </div>
                          </div>
                          <center><button type="submit" class="btn btn-primary mb-3">Simpan</button></center>
                          </form>
                    @endforeach
                </div>
                </div>
              </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    
    <!-- /.content -->
  </div>
@endsection


@section('fot_dinamis')
</body>
</html>
@endsection

