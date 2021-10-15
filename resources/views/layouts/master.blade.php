<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/style2.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <script src="/js/jquery-3.2.1.slim.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/b28c6944a9.js" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/"><img src="/css/images/logo.png" alt="" width="150px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/editprofile">Edit Profile</a>
      </li>
      @if (Auth::user()->hasRole("company"))
      <li class="nav-item">
        <a class="nav-link" href="/postjob">Post Job</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/employlist">View All Employs</a>
      </li>
      @elseif (Auth::user()->hasRole("employ"))
      <li class="nav-item">
        <a class="nav-link" href="/joblist">View All jobs</a>
      </li>
      @endif
      <li class="nav-item">
      <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout </a>
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf</form>
      </li>
    </ul>

  </div>
</nav>
    <div style="min-height:70vh;">
    @yield('content')
    </div>

    <div class="footer">
        <div class="">
          <img src="/css/images/logo2.png" alt="" width="200px">
          <p class="gray">TecForest is technology company that<br>allows people to apply for jobs</p>
          <br>
          <p>Copyright 2021 All Right Reserved</p>
        </div>

        <div class="support">
          <h2>Support</h2>
          <a href="#" class="gray">Terms of Use</a>
          <br>
          <a href="#" class="gray">Cookies Use</a>
          <br>
          <a href="#" class="gray">FAQ</a>
          <br>
          <a href="#" class="gray">Privacy Policy</a>
        </div>

        <div class="">
          <h2>Our Address</h2>
          <p class="gray">Street x.y.z <br>Islamabad,Pakistan</p>

          <div class="social">
            <ul>
              <li> <a href="#"> <img src="/css/images/google-plus.png" alt="" width="50px"> </a> </li>
              <li> <a href="#"> <img src="/css/images/facebook.png" alt="" width="50px"></a> </li>
              <li> <a href="#"><img src="/css/images/twitter.png" alt="" width="50px"></a> </li>
            </ul>
          </div>
        </div>
    </div>
  </body>
</html>