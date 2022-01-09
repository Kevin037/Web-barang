<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Aplikasi Mini | Home</title>
  </head>
  <body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/home">Aplikasi Mini</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Kategori
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              @foreach ($kategori as $kategori => $value)
              <a class="dropdown-item" href="/pilih-kategori{{ $kategori }}">{{ $value }}</a>
              @endforeach
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/">All item</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid" style="margin-top: 50px">
      <div class="row">
          @foreach ($produk as $produk)
          <div class="col-md-3" style="margin-top: 30px">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ url('img/produk/'.$produk->gambar) }}"alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{ $produk->nama }}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">{{ $produk->kategori_produk->nama_kategori }}</h6>
                  <p class="card-text">@currency($produk->harga)</p>
                  <a href="/home" class="btn btn-primary">Selengkapnya</a>
                </div>
              </div>
          </div>
          @endforeach
      </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>