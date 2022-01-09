@extends('main')
@section('judul')
@if(auth()->user()->tipe_user_id=='1') 
        <title>Admin | Tipe user</title>
      @endif
@if(auth()->user()->tipe_user_id=='2') 
        <title>Staff | Tipe user</title>
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
        <li class="nav-item menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Master User
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/tipe-user" class="nav-link active">
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
        <li class="nav-item">
          <a href="#" class="nav-link">
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
            <h1>Daftar Tipe User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Data tipe user</li>
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
                   @foreach ($tipeuser as $tipeuser)
                       <tr>
                         <td>{{ $n }}</td>
                         <td>{{ $tipeuser->nama_tipe }}</td>
                         <td>
                          <a href="/edit-tipe-user{{ $tipeuser->id }}" class="btn mr-2 mb-2 btn-secondary"><i class="fa fa-edit "></i></a>
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
@endsection
@section('fot_dinamis')
</body>
</html>
@endsection

