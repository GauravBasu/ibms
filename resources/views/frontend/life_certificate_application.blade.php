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
  <div class="container box_inter" >
    <div class="form">
      <form name="registration" id="registration" action="" method="post" role="form" class="contactForm" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <div class="col-md-12">
        <div class="row">
          <h3>APPLICATION FORM FOR  LIFE CERTIFICATE</h3>

            <div class="form-group{{ $errors->has('in_imam_moazzin') ? 'has-error' : '' }} col-md-8 col-sm-8 col-xs-12 " >
              <div class="row">
                <label style="font-size:15px;">Imam/Moazzin<span class="requiredStar">*</span></label>
              <select name="in_imam_moazzin" value="" class="form-control select2" required>
                <option value="-1">--Select Imam/Moazzin--</option>
                <option value="imam">Imam</option>
                <option value="moazzin">Moazzin</option>
              </select>
                @if ($errors->has('in_imam_moazzin'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_imam_moazzin') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="clearfix"></div>
          <h4>BASIC INFO</h4>

          <div class="row">
              <div class="form-group{{ $errors->has('in_first_name') ? 'has-error' : '' }} col-md-4">
                <label for="in_first_name">First Name<span class="requiredStar">*</span></label>
                <input type="text" name="in_first_name" class="form-control" id="in_first_name" placeholder="First Name" data-rule="text" data-msg="Please enter Your First Name" value=""  required/>
                @if ($errors->has('in_first_name'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_first_name') }}</strong>
                  </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('in_middle_name') ? 'has-error' : '' }} col-md-4">
                <label for="in_middle_name">Middle Name</label>
                <input type="text" name="in_middle_name" value="" class="form-control in_middle_name" id="in_middle_name" placeholder="Middle Name" />
                @if ($errors->has('in_middle_name'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_middle_name') }}</strong>
                  </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('in_last_name') ? 'has-error' : '' }} col-md-4">
                <label>Last Name<span class="requiredStar">*</span></label>
                <input type="text" class="form-control" name="in_last_name" id="in_last_name" placeholder="Last Name" required/>
                @if ($errors->has('in_last_name'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_last_name') }}</strong>
                  </span>
                @endif

              </div>
          </div>

        <div class="row">
            <div class="form-group{{ $errors->has('in_passport_user_img') ? 'has-error' : '' }} col-md-3 " style="margin-bottom: 0px;">
              <label>Passport Size Photo<span class="requiredStar">*</span></label>
              <input type="file" name="in_passport_user_img" value=""  id="in_passport_user_img" class="filestyle " required>
                @if ($errors->has('in_passport_user_img'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_passport_user_img') }}</strong>
                  </span>
                @endif
              <p>(Photo must be of 3.5cm X 4.5cm color & less 40kb)</p>
            </div>
            <div class="col-md-1">
              <div class="row">
                <img id="imgbanner" class="img-responsive"  width="100" style="height:100px; padding-left:0px;  padding-bottom:7px; ">
              <div id="imgsize"></div>
              </div>
            </div>
            <div class="form-group{{ $errors->has('life_certi_in_dob') ? 'has-error' : '' }} col-md-4" >
              <label>Date of Birth<span class="requiredStar">*</span></label>
              <input type="date" class="form-control label-floating is-empty" name="life_certi_in_dob" id="life_certi_in_dob" value="" placeholder="Date" />
                @if ($errors->has('life_certi_in_dob'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('life_certi_in_dob') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('in_father_name') ? 'has-error' : '' }} col-md-4">
              <label>Father's Name<span class="requiredStar">*</span></label>
              <input type="text" name="in_father_name" value="" class="form-control" id="in_father_name" placeholder="Father's Name" required/>
                @if ($errors->has('in_imam_moazzin'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_father_name') }}</strong>
                  </span>
                @endif
            </div>
            
            <div class="clearfix"></div>
            <div class="form-group{{ $errors->has('in_mobile_no') ? 'has-error' : '' }} col-md-4">
              <label>Mobile Number</label>
              <input type="tel" pattern="^\d{10}$" name="in_mobile_no" class="form-control" id="in_mobile_no"  placeholder="Mobile Number" min="1" max="9"  value="" readonly/>
                @if ($errors->has('in_mobile_no'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_mobile_no') }}</strong>
                  </span>
                @endif
            </div>


        </div>  

          <h4>ADDRESS</h4>
          <div class="row">
            
            <div class="form-group{{ $errors->has('in_premises_name_number') ? 'has-error' : '' }} col-md-4">
              <label>Premises Name & Number<span class="requiredStar">*</span></label>
              <input type="text" name="in_premises_name_number" value="" class="form-control" id="in_premises_name_number" placeholder="Premises Name & Number" />
                @if ($errors->has('in_premises_name_number'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_premises_name_number') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('in_street_localoty_name') ? 'has-error' : '' }} col-md-4">
              <label>Street Name/Locality Name<span class="requiredStar">*</span></label>
              <input type="text" name="in_street_localoty_name" value="" class="form-control" id="in_street_localoty_name" placeholder="Street Name Or Locality Name" />
                @if ($errors->has('in_street_localoty_name'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_street_localoty_name') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('ben_district') ? 'has-error' : '' }} col-md-4" >
              <label> District </label>
                    <select class="form-control select2" name="ben_district" id="ben_district_id">
                        <option value="0">Select</option>
                        @foreach ($districts as $district)
                            <option value="{{$district->id}}">{{$district->district_name}}</option>
                        @endforeach
                    </select>
                @if ($errors->has('ben_district'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('ben_district') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('in_pre_subdivision') ? 'has-error' : '' }} col-md-4" id="in_pre_subdivision_id" >
                <label >Sub Division</label>
                <select class="form-control " name="in_pre_subdivision" id="in_pre_subdivision">
                    <option value="0">--Sub Division --</option>
                </select>
                @if ($errors->has('in_pre_subdivision'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_pre_subdivision') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group col-md-4" >
                <label >Area </label>
                  <select class="form-control" name="ben_rural_urban" id="ben_rural_urban" required>
                      <option value="0">Select</option>
                      <option value="1">Rural</option>
                      <option value="2">Urban</option>
                  </select>
            </div>

            <div class="form-group col-md-4" id="ben_municipality_id">
                  <label >Municipality</label>
                    <select  class="form-control " name="ben_municipality" id="ben_municipality_muni_id">
                        <option value="0">Select</option>
                    </select>
            </div>

            <div class="form-group col-md-4" id="in_village_premises">
              <label>Village/Premises<span class="requiredStar">*</span></label>
              <input type="text" name="in_pre_village_premises" value="" class="form-control" id="in_pre_village_premises" placeholder="Village/Premises Name" />
            </div>

            <div class="form-group col-md-4" id="ben_block_id" >
              <label>Block</label>
              <select class="form-control " name="ben_block" id="brn_block_id">
                  <option value="0">Select</option>
              </select>
            </div>

            <div class="form-group{{ $errors->has('in_police_station_name') ? 'has-error' : '' }} col-md-4" >
              <label>Select Police Station <span class="requiredStar">*</span></label>
              <select name="in_police_station_name" value="" class="form-control select2" required>
                <option value="">--Select PS--</option>
                <option value="">Bakura Police Station </option>
                <option value="">Nadia Police Station</option>
              </select>
                @if ($errors->has('in_police_station_name'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_police_station_name') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('in_police_station_name') ? 'has-error' : '' }} col-md-4" >
              <label>Select Gram Panchayet  <span class="requiredStar">*</span></label>
              <select name="in_police_station_name" value="" class="form-control select2" required>
                <option value="">--Select PS--</option>
                <option value="">Bakura Police Station </option>
                <option value="">Nadia Police Station</option>
              </select>
                @if ($errors->has('in_police_station_name'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_police_station_name') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('in_pre_post_office') ? 'has-error' : '' }} col-md-4">
              <label>Post Office<span class="requiredStar">*</span></label>
              <input type="text" name="in_pre_post_office" value="" class="form-control" id="in_pre_post_office" placeholder="Post Office Name"/>
                @if ($errors->has('in_pre_post_office'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_pre_post_office') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('in_pre_present_pincode') ? 'has-error' : '' }} col-md-4">
              <label>Pincode<span class="requiredStar">*</span></label>
              <input type="number" name="in_pre_present_pincode" value="" class="form-control" id="in_pre_present_pincode" placeholder="Pincode" pattern="[0-9]{6}" maxlength="6" />
                @if ($errors->has('in_pre_present_pincode'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_pre_present_pincode') }}</strong>
                  </span>
                @endif
            </div>
          </div>
        <!--div class="row">      
            <div class="form-group col-md-12"><h4>PERMANENT ADDRESS</h4>
              <div class="form-group col-md-4">
                <div class="pretty p-svg p-curve">
                    <input type="checkbox" id="addressCheckbox" name="addressSame" />
                    <div class="state p-success">
                        <svg class="svg svg-icon" viewBox="0 0 20 20">
                            <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                        </svg>
                        <label>Same as Present Address</label>
                    </div>
                </div>
                
              </div>
              <div class="form-group col-md-4">

                <div class="pretty p-svg p-curve">
                    <input type="checkbox" id="withoutWestBengal" name="withoutWestBengal" />
                    <div class="state p-success">
                        <svg class="svg svg-icon" viewBox="0 0 20 20">
                            <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                        </svg>
                        <label>WithOut West Bengal</label>
                    </div>
                </div>

                
              </div>
            
            </div>
            
            <div class="form-group{{ $errors->has('in_pre_gp_word_no') ? 'has-error' : '' }} col-md-4">
              <label>G.P/Word No<span class="requiredStar">*</span></label>
              <input type="text" name="in_pre_gp_word_no" value="" class="form-control" id="in_pre_gp_word_no" placeholder="GP or Word No" />
                @if ($errors->has('in_pre_gp_word_no'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_pre_gp_word_no') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('in_pre_post_office') ? 'has-error' : '' }} col-md-4">
              <label>Post Office<span class="requiredStar">*</span></label>
              <input type="text" name="in_pre_post_office" value="" class="form-control" id="in_pre_post_office" placeholder="Post Office Name" />
                @if ($errors->has('in_pre_post_office'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_pre_post_office') }}</strong>
                  </span>
                @endif
            </div>
            

            <div class="form-group{{ $errors->has('in_pre_present_pincode') ? 'has-error' : '' }} col-md-4">
              <label>Pincode<span class="requiredStar">*</span></label>
              <input type="number" name="in_pre_present_pincode" value="" class="form-control" id="in_pre_present_pincode" placeholder="Pincode" pattern="[0-9]{6}" maxlength="6" />
                @if ($errors->has('in_pre_present_pincode'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_pre_present_pincode') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('in_police_station_name') ? 'has-error' : '' }} col-md-4" >
              <label>Select Police Station <span class="requiredStar">*</span></label>
              <select name="in_police_station_name" value="" class="form-control select2" required>
                <option value="">--Select PS--</option>
                <option value="541">Narayanpur PS</option>
                <option value="537">BDN ECPS</option>
              </select>
                @if ($errors->has('in_police_station_name'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_police_station_name') }}</strong>
                  </span>
                @endif
            </div>

             <div class="form-group col-md-4">
              <label >District</label>
                  <select class="form-control select2" name="ben_district" id="ben_district_id">
                      <option value="0">Select</option>
                      @foreach ($districts as $district)
                          <option value="{{$district->id}}">{{$district->district_name}}</option>
                      @endforeach
                  </select>
            </div>

            <div class="form-group col-md-4" >
                <label >Urban/Rural </label>
                <select class="form-control" name="ben_rural_urban" id="parma_ben_rural_urban" required>
                        <option value="0">Select</option>
                        <option value="1">Rural</option>
                        <option value="2">Urban</option>
                    </select>
            </div>

            <div class="form-group col-md-4" id="parma_municipality_id">
                <label >Municipality</label>
                <select class="form-control " name="ben_municipality" id="ben_municipality_muni_id">
                    <option value="0">Select</option>
                </select>
            </div>

            <div class="form-group col-md-4" id="param_village_premises">
              <label>Village/Premises<span class="requiredStar">*</span></label>
              <input type="text" name="in_pre_village_premises" value="" class="form-control" id="in_pre_village_premises" placeholder="Village/Premises Name" />
                @if ($errors->has('in_pre_village_premises'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_pre_village_premises') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group col-md-4" id="parma_block_id" >
                <label >Block</label>
                <select class="form-control " name="ben_block" id="brn_block_id">
                    <option value="0">Select</option>
                </select>
            </div>

            <div class="form-group col-md-4" id="parma_state_id" >
                <label >State</label>
                <select class="form-control " name="param_in_state" id="param_in_state">
                    <option value="0">State</option>
                </select>
            </div>
            <div class="form-group col-md-4" id="parma_country_id" >
                <label >Country</label>
                <select class="form-control " name="param_in_state" id="param_in_state">
                    <option value="india">India</option>
                </select>
            </div>

        </div-->
        <div class="row">   
            <div class="form-group col-md-12"><h4>BANK DETAILS</h4> </div>
                      

            <div class="form-group{{ $errors->has('in_bank_name') ? 'has-error' : '' }} col-md-4">
             <label>Name Of Bank<span class="requiredStar">*</span></label>
             <input type="text" name="in_bank_name" value="" class="form-control" id="in_bank_name" placeholder="Bank Name" />
                @if ($errors->has('in_bank_name'))
                  <span class="requiredfield">
                  <strong>{{ $errors->first('in_bank_name') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('in_branch_name') ? 'has-error' : '' }} col-md-4">
              <label>Name Of Bank Branch<span class="requiredStar">*</span></label>
              <input type="text" name="in_branch_name" value="" class="form-control" id="in_branch_name" placeholder="Bank Branch Name"/>
                @if ($errors->has('in_branch_name'))
                  <span class="requiredfield">
                  <strong>{{ $errors->first('in_branch_name') }}</strong>
                  </span>
                @endif
              
            </div>
            <div class="form-group{{ $errors->has('in_account_type') ? 'has-error' : '' }} col-md-4">
              <label>Account Type<span class="requiredStar">*</span></label>
              <select name="in_account_type" value="" id="ToMonth" class="form-control select2" required>
                <option value="none">Select Account Type</option>
                <option value="01">Savings</option>
                <option value="02">Current</option>
                <option value="03">Cash-Credit </option>
              </select>
                @if ($errors->has('in_account_type'))
                  <span class="requiredfield">
                  <strong>{{ $errors->first('in_account_type') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('in_account_no') ? 'has-error' : '' }} col-md-4">
              <label>Account No<span class="requiredStar">*</span></label>
              <input type="text" name="in_account_no" value="" class="form-control" id="in_account_no" placeholder=" Account No" />
                @if ($errors->has('in_account_no'))
                  <span class="requiredfield">
                  <strong>{{ $errors->first('in_account_no') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('in_ifsc_no') ? 'has-error' : '' }} col-md-4">
              <label>IFSC No<span class="requiredStar">*</span></label>
              <input type="text" name="in_ifsc_no" value="" class="form-control" id="in_ifsc_no" placeholder=" IFSC No"/>
                @if ($errors->has('in_ifsc_no'))
                  <span class="requiredfield">
                  <strong>{{ $errors->first('in_ifsc_no') }}</strong>
                  </span>
                @endif
            </div>

            
            
        </div>
          <div class="row">

             <div class="form-group col-md-12"><h4>MOSQUE DETAILS</h4> </div>

                <div class="form-group col-md-4">
                 <label>Mauza<span class="requiredStar">*</span></label>
                 <input type="text" name="in_mauza"  class="form-control" id="in_mauza" placeholder="Mauza" value="" />
                  @if ($errors->has('in_mauza'))
                    <span class="requiredfield">
                    <strong>{{ $errors->first('in_mauza') }}</strong>
                    </span>
                  @endif
               </div>

               <div class="form-group{{ $errors->has('in_jlno') ? 'has-error' : '' }} col-md-4">
                 <label>J.L.No<span class="requiredStar">*</span></label>
                 <input type="text" name="in_jlno"  class="form-control" id="in_jlno" placeholder="J.L.No" value="" data-rule="text" />
                  @if ($errors->has('in_jlno'))
                    <span class="requiredfield">
                    <strong>{{ $errors->first('in_jlno') }}</strong>
                    </span>
                  @endif
               </div>

               <div class="form-group{{ $errors->has('in_khatian_no') ? 'has-error' : '' }} col-md-4">
                 <label>Khatian No<span class="requiredStar">*</span></label>
                 <input type="text" name="in_khatian_no"  class="form-control" id="in_khatian_no" placeholder="Khatian No" value="" />
                  @if ($errors->has('in_khatian_no'))
                    <span class="requiredfield">
                    <strong>{{ $errors->first('in_khatian_no') }}</strong>
                    </span>
                  @endif
               </div>

               <div class="form-group{{ $errors->has('in_plot_no') ? 'has-error' : '' }} col-md-4">
                 <label>Plot No<span class="requiredStar">*</span></label>
                 <input type="text" name="in_plot_no"  class="form-control" id="in_plot_no" placeholder="Plot No" value="" />
                  @if ($errors->has('in_plot_no'))
                    <span class="requiredfield">
                    <strong>{{ $errors->first('in_plot_no') }}</strong>
                    </span>
                  @endif
               </div>
               <div class="form-group{{ $errors->has('in_area') ? 'has-error' : '' }} col-md-4">
                 <label>Area<span class="requiredStar">*</span></label>
                 <input type="text" name="in_area"  class="form-control" id="in_area" placeholder="Area" value=""/>
                  @if ($errors->has('in_area'))
                    <span class="requiredfield">
                    <strong>{{ $errors->first('in_area') }}</strong>
                    </span>
                  @endif
               </div>
          </div>

          <div class="row">
            <div class="form-group col-md-12"><h4>OTHER INFORMATION</h4> </div>
            <div class="form-group{{ $errors->has('in_last_data_recieved_bhata') ? 'has-error' : '' }} col-md-4" >
              <label>Last Date of Received Bhata<span class="requiredStar">*</span></label>
              <input type="date" class="form-control label-floating is-empty" name="in_last_data_recieved_bhata" id="in_last_data_recieved_bhata" value="" placeholder="Date" />
                @if ($errors->has('in_last_data_recieved_bhata'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_last_data_recieved_bhata') }}</strong>
                  </span>
                @endif
            </div>

                <div class="form-group{{ $errors->has('in_present_age') ? 'has-error' : '' }} col-md-4">
                 <label>Present Age<span class="requiredStar">*</span></label>
                 <input type="text" name="in_present_age"  class="form-control" id="in_present_age" placeholder="Khatian No" value="" />
                  @if ($errors->has('in_present_age'))
                    <span class="requiredfield">
                    <strong>{{ $errors->first('in_present_age') }}</strong>
                    </span>
                  @endif
                </div>

                <div class="form-group col-md-4">
                  
                    <label>Total Year Experience <span class="requiredStar">*</span></label>
                   <div class="clearfix"></div>
                   <div class="row">
                   <div class="col-md-4">
                     <input type="text" name="life_certi_total_year_of_year"  class="form-control" id="life_certi_total_year_of_year" placeholder="Year" value="" />
                   </div>

                   <div class="col-md-4">
                     <input type="text" name="life_certi_total_year_of_month"  class="form-control" id="life_certi_total_year_of_month" placeholder="Month" value="" />
                   </div>
                   <div class="col-md-4">
                     <input type="text" name="life_certi_total_year_of_day"  class="form-control" id="life_certi_total_year_of_day" placeholder="Day" value="" />
                   </div>
                  </div>
                </div> 

                <div class="form-group{{ $errors->has('in_educational_qualification') ? 'has-error' : '' }} col-md-4">
             <label>Educational Qualification<span class="requiredStar">*</span></label>
             <input type="text" name="in_educational_qualification"  class="form-control" id="in_educational_qualification" placeholder="Educational Qualification" value="" />
                @if ($errors->has('in_educational_qualification'))
                  <span class="requiredfield">
                    <strong>{{ $errors->first('in_educational_qualification') }}</strong>
                  </span>
                @endif
            </div>


          </div>

          
        </div>
      </form>
    </div>
  </div>
</section>
@yield('action-content')
@endsection