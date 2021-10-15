<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/b28c6944a9.js" crossorigin="anonymous"></script>
    <title></title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/"><img src="css/images/logo.png" alt="" width="150px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="/home">Home</a>
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

 
    <div class="upper">
      <div>
          <img src="/uploads/avatars/{{auth()->user()->avatar}}" alt="" width="200px" class="rounded-circle mt-5">     
      </div>
      <div>
        <h1 style="margin:150px 50px;">{{auth()->user()->name}}</h1>
      </div>
    </div>

    <div style="min-height:40vh;">
    @if (Auth::user()->hasRole("employ"))
    <div class="job-cat">
    <h1 style="font-size:50px;text-align: center;">View Jobs By Categories</h1>
    <div style="display:flex;flex-flow:wrap;justify-content:space-around;">
    @foreach ($catagory ?? '' as $cat)
    <a href="{{URL::to('/joblist/catagory', $cat->id)}}" class="job-cat-link"><h4>{{$cat->name}}</h4></a>
    @endforeach
    </div>
    </div>


    <div class="">
      <h1 style="font-size:50px;text-align: center;">Latest Jobs</h1>
      @if(!$jobs->isEmpty())
      <h4 style="text-align:center">we have 99K+ jobs in many companies</h4>

      <div class="jobs">
      @foreach ($jobs ?? '' as $job)
      <a href="{{URL::to('/joblist/jobdetail', $job->id)}}" style="text-decoration:none;color:black;">
        <div class="card-own" data-aos="zoom-in">
            @if($job->type == 'Part-time')
            <h4 class="head-purple">Part-time</h4>
            @elseif($job->type == 'Full-time')
            <h4 class="head-blue">Full-time</h4>
            @elseif($job->type == 'Internship')
            <h4 class="head-yellow">Internship</h4>
            @endif
            <h4>{{$job->catagory->name}}</h3>
            <h5>{{$job->city->name}}</h4>
            <h5>{{$job->created_at->format('Y-m-d')}}</h4>
        </div>
      </a>
      @endforeach
      </div>

      <div style="text-align:center;">
      <a href="/joblist" class="button orange">View All</a>
      </div>
      @else
      <h1 style="font-size:50px;text-align: center;margin-top:65px;">{ Sorry no jobs Available Now }</h1>
      @endif
    </div>

    @elseif (Auth::user()->hasRole("company"))
    <div class="" style="margin:30px auto;">
      <h1 style="font-size:50px;text-align: center;">jobs posted by you</h1>
      @if(!$myjobs->isEmpty())
      <div class="jobs">
      @foreach ($myjobs ?? '' as $mjob)
        <div class="card-own">
            @if($mjob->type == 'Part-time')
            <h4 class="head-purple">Part-time</h4>
            @elseif($mjob->type == 'Full-time')
            <h4 class="head-blue">Full-time</h4>
            @elseif($mjob->type == 'Internship')
            <h4 class="head-yellow">Internship</h4>
            @endif
            <h4>{{$mjob->catagory->name}}</h3>
            <h5>{{$mjob->city->name}}</h4>
            <h5>{{$mjob->created_at->format('Y-m-d')}}</h4>
            <div class="d-flex justify-content-around">
            <a class="btn btn-outline-warning" href="{{URL::to('/editjob', $mjob->id)}}"><i class="fas fa-edit"></i></a>
            <a class="btn btn-outline-danger" href="{{URL::to('/deletejob', $mjob->id)}}" onclick="return confirm ('Are you sure to delete this job?')" ><i class="far fa-trash-alt"></i></a>
            </div>
        </div>
      @endforeach
      @else
      <h1 style="font-size:50px;text-align: center;margin-top:65px;">{ No job posted yet }</h1>
      <div style="text-align:center;">
      <a href="/postjob" class="button orange">Post a Job ?</a>
      </div>
      @endif
      </div>

      <div class="d-flex justify-content-center">
    {{ $myjobs->links() }}
</div>
    </div>


    <div class="" style="margin:30px auto;">
      <h1 style="font-size:50px;text-align: center;">Hire employ directly</h1>
      @if(!$employ->isEmpty())
      <div class="jobs">
      @foreach ($employ ?? '' as $emp)
          <a href="{{URL::to('/employlist/employdetail', $emp->user_id)}}" style="text-decoration:none;color:black;">
        <div class="card-own">
        <div style="width:100px;margin:auto;">
          <img src="/uploads/avatars/{{$emp->user->avatar}}" alt="" width="100px" class="rounded-circle m-2">     
        </div>
        <h4 class="head-green">{{$emp->user->name}}</h4>
            <h4>{{$emp->qualification}}</h3>
            <h5>{{$emp->city->name}}</h4>
        </div>
        </a>
      @endforeach
      </div>
      <div style="text-align:center;">
      <a href="/employlist" class="button orange">View All</a>
      </div>
      @else
      <h1 style="font-size:50px;text-align: center;margin-top:65px;">{ Sorry No Employ Available Now }</h1>
      @endif
    </div>
    @endif
    </div>


    <section class="footer">
        <div class="">
          <img src="css/images/logo2.png" alt="" width="200px">
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
              <li> <a href="#"> <img src="css/images/google-plus.png" alt="" width="50px"> </a> </li>
              <li> <a href="#"> <img src="css/images/facebook.png" alt="" width="50px"></a> </li>
              <li> <a href="#"><img src="css/images/twitter.png" alt="" width="50px"></a> </li>
            </ul>
          </div>
        </div>
    </section>    



  </body>
</html>