@extends('frontend.app-template')
@section('content')
<div class="container-fluid">
  <div class="row">
   <div class=" logoContainer col-sm-10 "><h1>Imam Bhata Management System</h1></div>
   <div class="col-sm-2">
    <nav id="nav-menu-container">
      <ul class="nav-menu right">
        <li class="menu-active"><a style="color: #000;" href="{{url('pagelogout')}}">Logout</a></li>
      </ul>
    </nav>
  </div>
</div>
<div class="row">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="{{ asset("images/banner1.jpg") }}" style="width:100%;" alt="...">
      </div>
      <div class="item">
       <img src="{{ asset("images/banner2.jpg") }}" style="width:100%;" alt="...">
     </div>
     <div class="item">
       <img src="{{ asset("images/banner3.jpg") }}" style="width:100%;" alt="...">
     </div>
   </div>

   <!-- Left and right controls -->
   <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div> 

<section id="contact" class="wow "  >
  <div class="container box_inter">
    <div class="col-md-12">
      <div class="row">
        <h3>Benefeciary Dashboard</h3>
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Dashboard</h3>
            </div>
            <div class="box-body">
              <a class="btn btn-app" href="life_certificate_application">
                <i class="fa fa-picture-o"></i> Upload Photo
              </a>              
              <a class="btn btn-app" href="">
                <i class="fa fa-medkit"></i> Life Certificate
              </a>
              <a class="btn btn-app" href="{{ url('application') }}">
                <i class="fa fa-plus"></i> New Application
              </a>

              <a class="btn btn-app">
                <i class="fa fa-edit"></i> Edit Profile
              </a>
              <a class="btn btn-app">
                <i class="fa fa-bank"></i> Edit Bank A/C 
              </a>
              <a class="btn btn-app">
                <i class="fa fa-exchange"></i> Transfer/Replacement
              </a>
              <a class="btn btn-app">
                <i class="fa fa-credit-card"></i> Drafts
              </a>              
              <a class="btn btn-app">
                <span class="badge bg-yellow">3</span>
                <i class="fa fa-bullhorn"></i> Notifications
              </a>
              <a class="btn btn-app">
                <span class="badge bg-aqua">12</span>
                <i class="fa fa-envelope"></i> Inbox
              </a>
              <a class="btn btn-app">
                <i class="fa fa-print"></i> Print Application
              </a>
              
            </div>
            <!-- /.box-body -->
          </div>
      </div>  
    </div>  
  </div>
  </div>
</section>
@yield('action-content')
@endsection