<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">TiendApp</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('products')}}">Productos <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{url('brands')}}">Marcas</a>
      </li>
      <li class="nav-item active">
          @yield('item')
      </li>
    </ul>
  </div>
</nav>