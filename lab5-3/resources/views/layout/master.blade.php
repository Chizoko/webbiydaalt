<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>{{$title}}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">

    

    <!-- Bootstrap core CSS -->
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    
    <!-- Custom styles for this template -->
    <link href="{{asset('css/sidebars.css')}}" rel="stylesheet">
  </head>
  <body>

<div class="p-3 bg-white" style="width: 280px;height: 800px">
  <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
    <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
    <span class="fs-5 fw-semibold">Лабийн ажлууд</span>
  </a>
  <ul class="list-unstyled ps-0"> 
    <li class="mb-1">
      <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
        Лаб-5
      </button>
      <div class="collapse show" id="home-collapse">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li><a href="student" class="link-dark rounded">student</a></li>
          <li><a href="search" class="link-dark rounded">search</a></li>
        </ul>
      </div>
    </li>
    <li class="mb-1">
      <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
        Лаб-6
      </button>
      <div class="collapse" id="dashboard-collapse">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li><a href="transaction" class="link-dark rounded">Transacion</a></li>
          <li><a href="account" class="link-dark rounded">account</a></li>
        </ul>
      </div>
    </li>
    <li class="border-top my-3"></li>
  </ul>
</div>

<div class="b-example-divider"></div>
<div class="container">
<div class="card">
  <div class="card-header">
    {{$title}}
  </div>
  <div class="card-body">
   @yield('content')
  </div>
</div>
    </div>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

      <script src="{{asset('js/sidebars.js')}}"></script>
  </body>
</html>
