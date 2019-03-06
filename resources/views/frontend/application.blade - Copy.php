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

    <section id="contact" class="wow ">
     <div class="container box_inter">
     <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <h3 class="panel-heading">Application For Beneficary</h3>
                <div class="panel-body">
                    <form class="form-horizontal form" role="form" method="POST" action="{{ route('beneficiary-management.store') }}" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <h4>BASIC INFO</h4>
                        <div class="form-group{{ $errors->has('beneficary_name') ? ' has-error' : '' }} col-md-6">
                            <label for="beneficary_name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-8">
                                <input id="beneficary_name" type="text" class="form-control" name="beneficary_name" value="{{ old('beneficary_name') }}" required autofocus>

                                @if ($errors->has('beneficary_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('beneficary_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mobile_no') ? ' has-error' : '' }} col-md-6" >
                            <label for="mobile_no" class="col-md-4 control-label">Mobile Number</label>

                            <div class="col-md-8">
                                <input id="mobile_no" type="text" class="form-control" name="mobile_no" value="{{ $mobile_no_applied }}" readonly="" required>

                                @if ($errors->has('mobile_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('aadher_no') ? ' has-error' : '' }} col-md-6">
                            <label for="aadher_no" class="col-md-4 control-label">Aadher  Number</label>

                            <div class="col-md-8">
                                <input id="aadher_no" type="text" class="form-control" name="aadher_no" value="{{ old('aadher_no') }}" required>

                                @if ($errors->has('aadher_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('aadher_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bank_ac_number') ? ' has-error' : '' }} col-md-6">
                            <label for="bank_ac_number" class="col-md-4 control-label">Account Number</label>

                            <div class="col-md-8">
                                <input id="bank_ac_number" type="text" class="form-control" name="bank_ac_number" value="{{ old('bank_ac_number') }}" required>

                                @if ($errors->has('bank_ac_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bank_ac_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ifsc_code') ? ' has-error' : '' }} col-md-6">
                            <label for="ifsc_code" class="col-md-4 control-label">IFSC Code</label>

                            <div class="col-md-8">
                                <input id="ifsc_code" type="text" class="form-control" name="ifsc_code" value="{{ old('ifsc_code') }}" required>

                                @if ($errors->has('ifsc_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ifsc_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>





                        <div class="form-group{{ $errors->has('acc_type') ? ' has-error' : '' }} col-md-6">
                            <label for="acc_type" class="col-md-4 control-label">Acc Type</label>

                            <div class="col-md-8">

                                <select class="form-control select2" name="acc_type" id="acc_type" required>
                                    <option value="">Select</option>
                                   
                                    <option value="Saving Account">Saving Account</option>
                                    <option value="Current Account">Current Account</option>
                                    
                                </select>

                                @if ($errors->has('acc_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('acc_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('pan_number') ? ' has-error' : '' }} col-md-6">
                            <label for="pan_number" class="col-md-4 control-label">Pan Number</label>

                            <div class="col-md-8">
                                <input id="pan_number" type="text" class="form-control" name="pan_number" value="{{ old('pan_number') }}" required>

                                @if ($errors->has('pan_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pan_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} col-md-6">
                            <label for="address" class="col-md-4 control-label">Address </label>

                            <div class="col-md-8">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       

                        

                  <div class="form-group{{ $errors->has('profile_image') ? 'has-error' : '' }} col-md-6">
                    <label class="col-md-4 control-label">Passport Size Photo<span class="requiredStar">*</span></label>
                    <div class="col-md-8">
                      <input type="file" name="profile_image" value="{{ old('profile_image') }}"  id="profile_image" class="filestyle " required>
                      @if ($errors->has('profile_image'))
                        <span class="help-block" style="color: red; font-size: 13px; font-style: italic;">
                            <strong>{{ $errors->first('profile_image') }}</strong>
                        </span>
                      @endif
                      <p class="textpostion">(Photo must be of 3.5cm X 4.5cm color & .jpg/.jpeg/png format only & less 40kb otherwise applications will be rejected)</p>
                    </div>
                  </div>
                  

                  <div class="form-group col-md-6">
                            <label class="col-md-4 control-label">Beneficiary District</label>
                            <div class="col-md-8">
                                <select class="form-control select2" name="ben_district" id="ben_district_id">
                                    <option value="0">Select</option>
                                    @foreach ($districts as $district)
                                        <option value="{{$district->id}}">{{$district->district_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-6" >
                            <label class="col-md-4 control-label">Urban/Rural </label>
                            <div class="col-md-8">
                            <select class="form-control" name="ben_rural_urban" id="ben_rural_urban" required>
                                    <option value="0">Select</option>
                                    <option value="1">Rural</option>
                                    <option value="2">Urban</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-6" id="ben_municipality_id">
                            <label class="col-md-4 control-label">Municipality</label>
                            <div class="col-md-8">
                                <select class="form-control select2" name="ben_municipality" id="ben_municipality_muni_id">
                                    <option value="0">Select</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-6" id="ben_block_id" >
                            <label class="col-md-4 control-label">Block</label>
                            <div class="col-md-8">
                                <select class="form-control select2" name="ben_block" id="brn_block_id">
                                    <option value="0">Select</option>
                                </select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-2 col-md-offset-2">
                          <img id="imgbanner" class="img-responsive" width="100" style=" padding-left:0px;  padding-bottom:7px; border:1px solid #990000; ">
                          <div id="imgsize"></div>
                         </div>

                        
                        <div class="form-group" >
                         <div class="col-md-6 col-md-offset-4" style="margin-top:10px;">
                                <button type="submit" class="btn btn-primary">
                                    Save Application
                                </button>
                            </div>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </section><!-- #contact -->  


 </div>

      
   
@yield('action-content')
@endsection