@extends('frontend.app-template')
@section('content')
 <div class="container-fluid">
     <div class="row">
       <div class=" logoContainer col-sm-6 "><h1>Imam Bhata Management System</h1></div>
       <div class="col-sm-6"></div>
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

    <section id="contact" class="wow">
     <div class="container">
      
      <div class="row containPosition">
          <div class="col-md-6" >
            <h3 class="login-hd">Check IBMS status</h3>
            <div class="btn-detailsin">
               <div class="col-md-12">
                <form action=""  method="post" name="frm_pccstatus" id="frm_pccstatus">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group{{ $errors->has('pccstatus') ? ' has-error' : '' }}" >
                        <input type="text" placeholder="IBMS Number OR Application Number" class="form-control contact-input user_id required" id="pccstatus" name="pccstatus" value="{{old('pccstatus')}}" required>
                      </div>
                    </div>
                    
                    <div class="col-md-4 col-xs-12">
                      <div class="form-group">
                        <input type="submit" name="btn_pccstatus" class="btn btn-primary black" value="Search" id="btn_pccstatus">
                      </div>
                    </div>
                  </div>

                    <div class="col-sm-12">
                      <div class="row">
                        <div class="declare">
                       <i>Enter your IBMS Number OR Application Number, to check the current status.</i>
                      </div>
                      </div>
                      <div id="status_response" style="width: 100%; float: left;"></div>
                    </div>
                </form>
              </div>
            </div>
          </div>
        <div class="col-md-6">
          <h3 class="login-hd">Log In / Registration</h3>

         
         <div class="btn-detailsin">
          <div class="col-md-12">
           <form action="{{url('/sendOtp')}}" method="post" name="frm_reg" id="frm_reg">
              {{ csrf_field() }}

               @if(Session::has('message'))
                <div class="alert {{ Session::get('alert-class', 'alert-info') }}"> {{ Session::get('message') }}</div>
               @endif

               @if(Session::has('message_resent'))
                <div class="alert {{ Session::get('alert-class', 'alert-info') }}"> {{ Session::get('message_resent') }}</div>
               @endif
              <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-8">
                  <div class="form-group{{ $errors->has('mobileno') ? ' has-error' : '' }}" >
                    <input type="text" placeholder="Mobile No. (10 Digits)" class="form-control contact-input user_id required valid" maxlength="10" id="mobile_no" name="mobileno" required="" value='@if(Session::has('message')){{ Session::get('mobile') }}  @endif'  @if(Session::has('message')) readonly @endif>

                        @if ($errors->has('mobileno'))
                          <span class="help-block" style="color: red; font-size: 13px; font-style: italic;">
                              <strong>{{ $errors->first('mobileno') }}</strong>
                          </span>
                        @endif
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                  <div class="form-group">
                    <input id="btn_sendotp" type="submit" name="btn_sendotp" class="btn btn-primary black" @if(Session::has('message')) disabled @endif  value="Send OTP">
                  </div>
                </div>
                <br>
                  <div class="col-sm-12" >
                   <div style="color: #ff0000;"  class="form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
                     
                      <div class="row">
                          <div class="captcha col-sm-5"  >
                          <span>{!! captcha_img() !!}</span>
                          <button type="button" class="btn btn-primary btn-refresh"><i class="fa fa-refresh"></i></button>
                          </div>
                          <div class="col-sm-4"  style="margin-left: -45px;">
                             <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                           </div>

                         </div>
                         


                          @if ($errors->has('captcha'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('captcha') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
              </div>
                <div class="col-sm-12">
                  <div class="row">
                    <div class="declare">
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" name="reg[disclaimer]" id="reg_disclaimer" value="1" required="required" class="valid" >
                      <span class="custom-control-indicator"></span> <span class="custom-control-description"><i>I hereby declare that the mobile no. provided is registered in my name. Information and documents being furnished by me for the purpose of IBMS are correct and authentic to the best of my knowledge.</i></span>
                       </label>
                  </div>
                  </div>
                </div>
              
                <div id="submit_div"></div>
                
            </form>
          </div>
          
          <div class="col-md-12 veryOtp"  >
              <form action="{{url('/verifyOtp')}}" method="post" name="frm_reg" id="frm_reg" >
                {{ csrf_field() }}

                <div id="verifyotp_div">
                 <div class="col-sm-6 ">
                    <div class="row">
                      <div class="form-group{{ $errors->has('otp') ? ' has-error' : '' }}">
                      <input type="text" placeholder="Enter OTP" class="form-control input-lg" maxlength="6" id="otp" name="otp" style="float: left;width: 62%;border-radius:5px 0 0 5px">
                      
                          <span class="help-block" style="color: red; font-size: 13px; font-style: italic;">
                              <strong></strong>
                          </span>
                       
                      <input type="submit" name="varify" value="Verify" class="btn btn-primary black"   style="border-radius:0 5px 5px 0">


                    </div>
                    </div>
                  </div>
                  
                </div>
                </form>
                <form action="{{url('/resendOtp')}}" method="post" name="frm_reg" id="frm_reg" >
                {{ csrf_field() }}
                <div class="col-xs-12 col-sm-4 col-md-4" style="margin-top:10px;">
                    <div class="row">
                      <div class="form-group "> 
                      <input type="submit" value="Resend" class="btn btn-primary primary" >
                    </div>
                    </div>
                  </div>
                </form
              
          </div>
          
          </div>
        </div>
    </div>
     </div>
    </section><!-- #contact -->  


 </div>

      
   
@yield('action-content')
@endsection