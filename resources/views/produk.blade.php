@extends('main')
@section('judul')

@if(auth()->user()->tipe_user_id=='1') 
        <title>Admin | Produk</title>
      @endif
@if(auth()->user()->tipe_user_id=='2') 
        <title>Staff | Produk</title>
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
              <a href="/tipe-user" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Tipe User
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/user" class="nav-link active">
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
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tools"></i>
            <p>
              Master Produk
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/kategori-produk" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Kategori Produk
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/produk" class="nav-link active">
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
            <h1>Daftar Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Data produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            
          <div class="col-12"> <!-- /.card -->
            <button type="button" class="btn btn-primary mb-3"  data-toggle="modal" data-target="#form_kategori">+ Tambah</button>
            <div class="card">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover datatable">
                  
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Tindakan</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                    $n=1;    
                    @endphp
                   @foreach ($produk as $produk)
                       <tr>
                         <td>{{ $n }}</td>
                         <td>{{ $produk->kode_produk }}</td>
                         <td>{{ $produk->nama }}</td>
                         <td>{{ $produk->kategori_produk->nama_kategori }}</td>
                         <td>@currency($produk->harga)</td>
                         <td>
                          <img src="{{ url('img/produk/'.$produk->gambar) }}" alt="" class="img-responsive" width="80px">
                          </td>
                         <td>
                          <a href="/edit-produk{{ $produk->id }}" class="btn mr-2 mb-2 btn-secondary"><i class="fa fa-edit "></i></a>
                          @if(auth()->user()->tipe_user_id=='1') 
                          <a href="#" data-id="{{ $produk->id }}" data-nama="{{ $produk->nama }}" class="btn mr-2 mb-2 btn-danger hapus_produk"><i class="fa fa-trash "></i></a>
                          @endif
                         </td>
                       </tr>
                       @php
                           $n++;
                       @endphp
                   @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
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
  <!-- /.content-wrapper -->
  <div class="modal fade" id="form_kategori" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
			<form action="/tambah-produk" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
          @csrf
          <div class="position-relative form-group"><label>Nama produk</label><input name="nama" type="text" class="form-control"  required>
          <div class="invalid-feedback">
                          Masukkan nama produk !
                      </div>
          </div>
          <div class="form-group"><label>Kategori</label>
                <select class="form-control" name="kategori_id" required>
                  <option value="">-Pilih Kategori-</option>
                  @foreach ($kategori as $kategori => $value)
                  <option value="{{ $kategori }}">{{ $value }}</option>
                  @endforeach
                </select>
                <div class="invalid-feedback">
                      Pilih kategori produk !
                </div>
            </div>
            <div class="position-relative form-group"><label>Harga jual</label><input name="harga" type="number"  class="form-control"  required>
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
                <input type="file" class="form-control" name="bill" title="jpg,jpeg,png(max.900kb)" id="bukti_pembayaran" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
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
        </div>
    </div>
</div>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection
@section('fot_dinamis')
<script>
  $(".hapus_produk").click(function(){
     var id_produk = $(this).attr('data-id');
     var nama_produk =  $(this).attr('data-nama');
     Swal.fire({
     title: 'Yakin?',
     text: "Hapus produk "+nama_produk+" dari daftar",
     imageWidth: 170,
     imageHeight: 230,
     showCancelButton: true,
     confirmButtonColor: '#3085d6',
     cancelButtonColor: '#d33',
     confirmButtonText: 'Ya, hapus'
     }).then((result) => {
     if (result.isConfirmed) {
       window.location = "/hapus-produk"+id_produk+""
     }
     })
       });
 </script>
</body>
</html>
@endsection

