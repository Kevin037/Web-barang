@extends('main')
@section('judul')
@if(auth()->user()->tipe_user_id=='1') 
        <title>Admin | Home</title>
      @endif
@if(auth()->user()->tipe_user_id=='2') 
        <title>Staff | Home</title>
        @endif
@endsection
@section('sidebar')

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="/" class="nav-link active">
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
        <li class="nav-item">
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
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
             @if(auth()->user()->tipe_user_id=='1')  
              <h1 class="m-0">Dashboard Admin</h1>
            @endif
            @if(auth()->user()->tipe_user_id=='2') 
              <h1 class="m-0">Dashboard Staff</h1>
            @endif 
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          @if(auth()->user()->tipe_user_id=='1') 
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $tipeuser }}</h3>

                <p>Tipe User</p>
              </div>
              <div class="icon">
                <i class="ion ion-alert-circled"></i>
              </div>
              <a href="/tipe-user" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $user }}</h3>

                <p>User</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-alarm-clock"></i>
              </div>
              <a href="/user" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          @endif
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $kategori }}</h3>

                <p>Tipe Produk</p>
              </div>
              <div class="icon">
                <i class="ion ion-chatbubble-working"></i>
              </div>
              <a href="/kategori-produk" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $produk }}</h3>

                <p>Produk</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-sad"></i>
              </div>
              <a href="/produk" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
         
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
        <div class="card card-default">
          <div class="card-header">
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            
            <!-- /.row -->
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('fot_dinamis')
</body>
</html>
@endsection
