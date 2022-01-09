@extends('main')
@section('judul')
@if(auth()->user()->tipe_user_id=='1') 
        <title>Admin | Kategori</title>
      @endif
@if(auth()->user()->tipe_user_id=='2') 
        <title>Staff | | Kategori</title>
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
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tools"></i>
            <p>
              Master Produk
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/kategori-produk" class="nav-link active">
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
            <h1>Daftar Kategori</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Data kategori</li>
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
                    <th>Nama</th>
                    <th>Tindakan</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                    $n=1;    
                    @endphp
                   @foreach ($kategori as $kategori)
                       <tr>
                         <td>{{ $n }}</td>
                         <td>{{ $kategori->nama_kategori }}</td>
                         <td>
                          <a href="/edit-kategori{{ $kategori->id }}" class="btn mr-2 mb-2 btn-secondary"><i class="fa fa-edit "></i></a>
                          @if(auth()->user()->tipe_user_id=='1') 
                          <a href="#" data-id="{{ $kategori->id }}" data-nama="{{ $kategori->nama_kategori }}" class="btn mr-2 mb-2 btn-danger hapus_kategori"><i class="fa fa-trash "></i></a>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
			<form action="/tambah-kategori" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="position-relative form-group"><label>Nama Kategori</label>
              <input name="nama_kategori" type="text" class="form-control"  required>
                <div class="invalid-feedback">
                    Masukkan nama kategori !
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
 $(".hapus_kategori").click(function(){
    var id_kategori = $(this).attr('data-id');
    var nama_kategori =  $(this).attr('data-nama');
    Swal.fire({
    title: 'Yakin?',
    text: "Hapus kategori "+nama_kategori+" dari daftar",
    imageWidth: 170,
    imageHeight: 230,
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, hapus'
    }).then((result) => {
    if (result.isConfirmed) {
      window.location = "/hapus-kategori"+id_kategori+""
    }
    })
      });
</script>
</body>
</html>
@endsection

