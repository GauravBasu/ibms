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
    <div class="form" >
      <form name="registration" id="registration" action="{{url('/application/save')}}" method="post" role="form" class="contactForm" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <div class="col-md-12">
        <div class="row">
        
          <h3>APPLICATION FORM FOR  IMAMS/MUAZZINS</h3>

            <div class="form-group{{ $errors->has('in_imam_moazzin') ? 'has-error' : '' }} col-md-8 col-sm-8 col-xs-12 " >
              <div class="row">
                <label style="font-size:15px;">Imam/Moazzin<span class="requiredStar">*</span></label>
              <select name="in_imam_moazzin" value="" class="form-control select2" required>
                <option value="">--Select Imam/Moazzin--</option>
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
              <p>(Photo must be of 3.5cm X 4.5cm color & less 40kb and .jpg,.jpeg,.png type)</p>
            </div>
            <div class="col-md-1">
              <div class="row">
                <img id="imgbanner" class="img-responsive"   style="height:100px; padding-left:0px;  padding-bottom:7px; ">
              <div id="imgsize"></div>
              </div>
            </div>

            <div class="form-group{{ $errors->has('in_dob') ? 'has-error' : '' }} col-md-4" >
              <label>Date Of Birth<span class="requiredStar">*</span></label>
              <input type="date" class="form-control label-floating is-empty" name="in_dob" id="in_dob" value="" placeholder="Date" >
                @if ($errors->has('in_dob'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_dob') }}</strong>
                  </span>
                @endif
            </div>
            
            
            <div class="form-group{{ $errors->has('in_nationality') ? 'has-error' : '' }} col-md-4">
              <label>Nationality<span class="requiredStar">*</span></label>
              <select class="form-control select2" name="in_nationality" value="" id="in_nationality" style="width: 100%;" placeholder="Nationality" >
                <option value="india" selected="selected">India</option>
                <option value="indian">Indian</option>
                <option value="">Albanian</option>
                <option value="">Algerian</option>
                <option value="">American</option>
                <option value="">Andorran</option>
              </select>
                @if ($errors->has('in_nationality'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_nationality') }}</strong>
                  </span>
                @endif
            </div>
            <div class="clearfix"></div>
            <div class="form-group{{ $errors->has('in_father_name') ? 'has-error' : '' }} col-md-4">
              <label>Father's Name<span class="requiredStar">*</span></label>
              <input type="text" name="in_father_name" value="" class="form-control" id="in_father_name" placeholder="Father's Name"  >
                @if ($errors->has('in_father_name'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_father_name') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('in_aadhar_no') ? 'has-error' : '' }} col-md-4">
              <label>Aadhar No</label>
              <input type="text" name="in_aadhar_no" value="" class="form-control" id="in_aadhar_no" placeholder="Aadhar No" >
                @if ($errors->has('in_aadhar_no'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_aadhar_no') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('in_voter_no') ? 'has-error' : '' }} col-md-4">
              <label>Voter Card No</label>
              <input type="text" name="in_voter_no" value="" class="form-control" id="in_voter_no" placeholder="Aadhar No" />
                @if ($errors->has('in_voter_no'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_voter_no') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('in_pan_no') ? 'has-error' : '' }} col-md-4">
              <label>Pan No</label>
              <input type="text" name="in_pan_no" value="" class="form-control" id="in_pan_no" placeholder="PAN No" />
                @if ($errors->has('in_pan_no'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_pan_no') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('in_email') ? 'has-error' : '' }} col-md-4">
              <label>Email Address</label>
              <input type="email" name="in_email" value="" class="form-control" id="in_email" placeholder="Email Address" />
                @if ($errors->has('in_email'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_email') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group col-md-4">
              <label>Mobile Number</label>
              <input type="tel" pattern="^\d{10}$" name="in_mobile_no" class="form-control" id="in_mobile_no"  placeholder="Mobile Number" min="1" max="9"  value="{{$mobile_no_applied}}" readonly >
                
            </div>

            <div class="form-group{{ $errors->has('in_educational_qualification') ? 'has-error' : '' }} col-md-4">
             <label>Educational Qualification<span class="requiredStar">*</span></label>
             <input type="text" name="in_educational_qualification"  class="form-control" id="in_educational_qualification" placeholder="Educational Qualification" value=""  >
                @if ($errors->has('in_educational_qualification'))
                  <span class="requiredfield">
                    <strong>{{ $errors->first('in_educational_qualification') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('in_educational_documenr_attach') ? 'has-error' : '' }} col-md-4">
             <label>Educational Qualification document Attachment<span class="requiredStar">*</span></label>
             <input type="file" name="in_educational_documenr_attach" value=""  id="in_educational_documenr_attach" class="filestyle "  > 
                @if ($errors->has('in_educational_documenr_attach'))
                  <span class="requiredfield">
                  <strong>{{ $errors->first('in_educational_documenr_attach') }}</strong>
                  </span>
                @endif
             <p>(Photo must be format mention)</p>
            </div>

            <div class="form-group col-md-12"><P><b>ADDRESS PROOF WITH  PHOTO ID</b></P>
             <p>Note: Attach only scanned jpg images or PDF files of your original documents. Scanned Images must be clear and document size must be less then 100kb and readable otherwise applications will be rejected</p>
             <label>Please Select the document for IBMS</label>
             <div class="row" id="crud_table">
              <div class="form-group{{ $errors->has('doc_name') ? 'has-error' : '' }} col-md-4" >
                <select class="form-control doc_name"  id="doc_name_type" name="doc_name[]" >
                  <option >--Select Document Name--</option>
                  <option value="aadharCard">Aadhar Card (both side)</option>
                  <option value="drivingLience">Driving Licence(both side)</option>
                  <option value="passport">Passport</option>
                  <option value="voterId">Voter ID (both side)</option>
                </select>
                @if ($errors->has('doc_name'))
                <span class="requiredfield">
                  <strong>{{ $errors->first('doc_name') }}</strong>
                </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('doc_type') ? 'has-error' : '' }} col-md-4 ">
                <input type="file" class="filestyle input-group-cus doc_type" name="doc_type[]" >
                @if ($errors->has('doc_type'))
                <span class="requiredfield">
                  <strong>{{ $errors->first('doc_type') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('doc_number') ? 'has-error' : '' }} col-md-3">
                <input type="text" class="form-control doc_number doc_no" name="doc_number[]" id="doc_no" placeholder="Input Number required" >
                @if ($errors->has('doc_number'))
                <span class="requiredfield">
                  <strong>{{ $errors->first('doc_number') }}</strong>
                </span>
                @endif
              </div>
             </div>
             <div align="right">
              <button type="button" name="add" id="add" class="btn btn-success btn-md">+</button>
             </div>
          </div>
        </div>  
          <h4>PRESENT ADDRESS</h4>
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
                  <select class="form-control" name="ben_rural_urban" id="present_area_ben_rural_urban" required>
                      <option value="0">Select</option>
                      <option value="1">Rural</option>
                      <option value="2">Urban</option>
                  </select>
            </div>

            <div class="form-group col-md-4" id="present_ben_municipality_id">
                  <label >Municipality</label>
                    <select  class="form-control " name="present_municipality_id" id="present_municipality_id">
                        <option value="0">Select</option>
                    </select>
            </div>

            

            <div class="form-group col-md-4" id="present_ben_block_id" >
              <label>Block</label>
              <select class="form-control " name="ben_block" id="brn_block_id">
                  <option value=" ">Select</option>
              </select>
            </div>

             <div class="form-group{{ $errors->has('in_gram_panchayet') ? 'has-error' : '' }} col-md-4" id="present_gram_panchayet" >
              <label>Select Gram Panchayet  <span class="requiredStar">*</span></label>
              <select name="in_gram_panchayet" id="in_gram_panchayet" value="" class="form-control " >
                <option value=" ">Select</option>
               
              </select>
                @if ($errors->has('in_gram_panchayet'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_gram_panchayet') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group col-md-4" id="present_village_premises">
              <label>Village/Premises<span class="requiredStar">*</span></label>
              <input type="text" name="present_pre_village_premises" id="present_pre_village_premises" value="" class="form-control"  placeholder="Village/Premises Name" />
            </div>

            <div class="form-group{{ $errors->has('in_police_station_name') ? 'has-error' : '' }} col-md-4" >
              <label>Select Police Station <span class="requiredStar">*</span></label>
              <select name="in_police_station_name" id="in_police_station_name" value="" class="form-control select2" > 
                <option value="">--Select PS--</option>
                @foreach ($policestations as $policestation)
                <option value="{{$policestation->id}}">{{$policestation->name}}</option>
                @endforeach
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

        <div class="row">      
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
                 <div class="pretty p-default p-round">
                    <input type="radio" name="radio1" id="withinwestbengal">
                    <div class="state" >
                        <label>Within West Bengal</label>
                    </div>
                 </div>
              </div>

              <div class="form-group col-md-4">
                <div class="p-default pretty  p-round">
                    <input type="radio" name="radio1" id="withoutwestbengal">
                    <div class="state">
                        <label>OutSide West Bengal</label>
                    </div>
                </div>
              </div>

            </div>

            <div class="form-group{{ $errors->has('parmanent_in_premises_name_number') ? 'has-error' : '' }} col-md-4">
              <label>Premises Name & Number<span class="requiredStar">*</span></label>
              <input type="text" name="parmanent_in_premises_name_number" value="" class="form-control" id="parmanent_in_premises_name_number" placeholder="Premises Name & Number" />
                @if ($errors->has('parmanent_in_premises_name_number'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('parmanent_in_premises_name_number') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('parmanent_in_street_locality_name') ? 'has-error' : '' }} col-md-4">
              <label>Street Name/Locality Name<span class="requiredStar">*</span></label>
              <input type="text" name="parmanent_in_street_locality_name" value="" class="form-control" id="parmanent_in_street_locality_name" placeholder="Street Name Or Locality Name" />
                @if ($errors->has('parmanent_in_street_locality_name'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('parmanent_in_street_locality_name') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group col-md-4" id="parmanent_state_id" >
                <label >State</label>
                <select class="form-control " name="param_in_state" id="param_in_state">
                    <option value="0">--State--</option>
                    @foreach ($states as $state)
                    <option value="{{$state->id}}">{{$state->name}}</option>
                    @endforeach
                </select>
            </div>

            <!--div class="form-group{{ $errors->has('parmanent_ben_district') ? 'has-error' : '' }} col-md-4" id="withoutstate">
              <label> District </label>
                    <select class="form-control district_class select2" name="parmanent_ben_district" id="outsidestate_parmanent_ben_district">
                        <option value="0">Select</option>
                        @foreach ($districts as $district)
                            <option value="{{$district->id}}">{{$district->district_name}}</option>
                        @endforeach
                    </select>
                @if ($errors->has('parmanent_ben_district'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('parmanent_ben_district') }}</strong>
                  </span>
                @endif
            </div-->

            <div class="form-group col-md-4"  >
                    <label> District </label>
                    <select class="form-control district_class " name="parmanent_ben_district" id="withinstate_parmanent_ben_district">
                        <option value="0">Select</option>
                    </select>
            </div>


            <div class="form-group{{ $errors->has('parmanent_in_pre_subdivision') ? 'has-error' : '' }} col-md-4" id="in_pre_subdivision_id" >
                <label >Sub Division</label>
                <select class="form-control " name="parmanent_in_pre_subdivision" id="parmanent_in_pre_subdivision">
                    <option value="0">--Sub Division --</option>
                </select>
                @if ($errors->has('parmanent_in_pre_subdivision'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('parmanent_in_pre_subdivision') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group col-md-4" >
                <label >Area </label>
                  <select class="form-control" name="parmanent_area_ben_rural_urban" id="parmanent_area_ben_rural_urban" >
                      <option value="0">Select</option>
                      <option value="1">Rural</option>
                      <option value="2">Urban</option>
                  </select>
            </div>

            <div class="form-group col-md-4" id="parmanent_ben_municipality_id">
                  <label >Municipality</label>
                    <select  class="form-control " name="parmanent_ben_municipality" id="parmanent_ben_municipality_muni_id">
                        <option value="0">Select</option>
                    </select>
            </div>

            <div class="form-group col-md-4" id="parmanent_ben_block_id" >
              <label>Block</label>
              <select class="form-control " name="parmanent_ben_block" id="parmanent_ben_block">
                  <option value="0">Select</option>
              </select>
            </div>

            <div class="form-group{{ $errors->has('parmanent_in_gram_panchayet_name') ? 'has-error' : '' }} col-md-4" id="parmanent_gram_panchayat_id" >
              <label>Select Gram Panchayat  <span class="requiredStar">*</span></label>
              <select name="parmanent_in_gram_panchayet_name" id="parmanent_in_gram_panchayet_name" value="" class="form-control " >
                <option value="0">Select</option>
              </select>
                @if ($errors->has('parmanent_in_gram_panchayet_name'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('parmanent_in_gram_panchayet_name') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group col-md-4" id="parmanent_village_premises">
              <label>Village/Premises<span class="requiredStar">*</span></label>
              <input type="text" name="parmanent_in_pre_village_premises" value="" class="form-control" id="parmanent_in_pre_village_premises" placeholder="Village/Premises Name" />
            </div>

            <div class="form-group{{ $errors->has('parmanent_in_police_station_name') ? 'has-error' : '' }} col-md-4" >
              <label>Select Police Station <span class="requiredStar">*</span></label>
              <select name="parmanent_in_police_station_name" id="parmanent_in_police_station_name" value="" class="form-control select2" >
                <option value="">--Select PS--</option>
                <option value="1">Bakura Police Station </option>
                <option value="2">Nadia Police Station</option>
              </select>
                @if ($errors->has('parmanent_in_police_station_name'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('parmanent_in_police_station_name') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('parmanent_in_pre_post_office') ? 'has-error' : '' }} col-md-4">
              <label>Post Office<span class="requiredStar">*</span></label>
              <input type="text" name="parmanent_in_pre_post_office" value="" class="form-control" id="parmanent_in_pre_post_office" placeholder="Post Office Name"/>
                @if ($errors->has('parmanent_in_pre_post_office'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('parmanent_in_pre_post_office') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('in_pre_parmanent_pincode') ? 'has-error' : '' }} col-md-4">
              <label>Pincode<span class="requiredStar">*</span></label>
              <input type="number" name="in_pre_parmanent_pincode" value="" class="form-control" id="in_pre_parmanent_pincode" placeholder="Pincode" pattern="[0-9]{6}" maxlength="6" />
                @if ($errors->has('in_pre_parmanent_pincode'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_pre_parmanent_pincode') }}</strong>
                  </span>
                @endif
            </div>

        </div>
        <div class="row">   
            <div class="form-group col-md-12"><h4>BANK DETAILS</h4> </div>
                      

            <div class="form-group{{ $errors->has('ben_in_bank_name') ? 'has-error' : '' }} col-md-4">
             <label>Name Of Bank<span class="requiredStar">*</span></label>
             <input type="text" name="ben_in_bank_name" value="" class="form-control" id="ben_in_bank_name" placeholder="Bank Name" />
                @if ($errors->has('ben_in_bank_name'))
                  <span class="requiredfield">
                  <strong>{{ $errors->first('ben_in_bank_name') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('ben_in_branch_name') ? 'has-error' : '' }} col-md-4">
              <label>Name Of Bank Branch<span class="requiredStar">*</span></label>
              <input type="text" name="ben_in_branch_name" value="" class="form-control" id="ben_in_branch_name" placeholder="Bank Branch Name"/>
                @if ($errors->has('ben_in_branch_name'))
                  <span class="requiredfield">
                  <strong>{{ $errors->first('ben_in_branch_name') }}</strong>
                  </span>
                @endif
              
            </div>
            <div class="form-group{{ $errors->has('ben_in_account_type') ? 'has-error' : '' }} col-md-4">
              <label>Account Type<span class="requiredStar">*</span></label>
              <select name="ben_in_account_type" value="" id="ToMonth" class="form-control select2" required>
                <option value="none">Select Account Type</option>
                <option value="Savings">Savings</option>
                <option value="Current">Current</option>
                <option value="Cash-Credit">Cash-Credit </option>
              </select>
                @if ($errors->has('ben_in_account_type'))
                  <span class="requiredfield">
                  <strong>{{ $errors->first('ben_in_account_type') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('ben_in_account_no') ? 'has-error' : '' }} col-md-4">
              <label>Account No<span class="requiredStar">*</span></label>
              <input type="text" name="ben_in_account_no" value="" class="form-control" id="in_account_no" placeholder=" Account No" />
                @if ($errors->has('ben_in_account_no'))
                  <span class="requiredfield">
                  <strong>{{ $errors->first('ben_in_account_no') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('ben_in_ifsc_no') ? 'has-error' : '' }} col-md-4">
              <label>IFSC No<span class="requiredStar">*</span></label>
              <input type="text" name="ben_in_ifsc_no" value="" class="form-control" id="ben_in_ifsc_no" placeholder=" IFSC No"/>
                @if ($errors->has('ben_in_ifsc_no'))
                  <span class="requiredfield">
                  <strong>{{ $errors->first('ben_in_ifsc_no') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('ben_in_supporting_bank_document') ? 'has-error' : '' }} col-md-4">
             <label>Supporting Bank Document<span class="requiredStar">*</span></label>
             <input type="file" name="ben_in_supporting_bank_document" value=""  id="ben_in_supporting_bank_document" class="filestyle " required>
                @if ($errors->has('ben_in_supporting_bank_document'))
                  <span class="requiredfield">
                  <strong>{{ $errors->first('ben_in_supporting_bank_document') }}</strong>
                  </span>
                @endif
             <p>(Photo must be format mention)</p>
           </div>
            
        </div>
          <div class="row">
             <div class="form-group col-md-12"><h4>ENGAGEMENT DETAILS</h4></div>
                 <div class="col-md-4">
                   <label>Period Of Experience</label>
                   <select id="fromMonth" name="ben_in_period_of_experience" value="" class="form-control select2" >
                    <option value="">--Select Experience--</option>
                    <option value="more then 3">>3</option>
                    <option value="Less then 3"><3</option>
                   </select>
                </div>

                
                <div class="form-group{{ $errors->has('ben_in_engage_by_wgom') ? 'has-error' : '' }} col-md-4">
                  <label>Engaga By Whom</label>
                  <input type="text" name="ben_in_engage_by_wgom" value="" class="form-control" id="in_engage_by_wgom" placeholder="Engaga By Whom" />
                  @if ($errors->has('ben_in_engage_by_wgom'))
                    <span class="requiredfield">
                        <strong>{{ $errors->first('ben_in_engage_by_wgom') }}</strong>
                    </span>
                  @endif
                </div>

                <div class="form-group{{ $errors->has('ben_in_date_of_appintment') ? 'has-error' : '' }} col-md-4" >
                  <label>Date of Appointment<span class="requiredStar">*</span></label>
                  <input type="date" class="form-control label-floating is-empty" name="ben_in_date_of_appintment" id="ben_in_date_of_appintment" value="" placeholder="Date of Appointment" />
                    @if ($errors->has('ben_in_date_of_appintment'))
                      <span class="requiredfield">
                          <strong>{{ $errors->first('ben_in_date_of_appintment') }}</strong>
                      </span>
                    @endif
                </div>


                <div class="form-group{{ $errors->has('ben_suppoting_document_img') ? 'has-error' : '' }} col-md-4 ">
                  <label>Supporting Document to be enclose<span class="requiredStar">*</span></label>
                  <input type="file" name="ben_suppoting_document_img" value=""  id="ben_suppoting_document_img" class="filestyle " >
                    @if ($errors->has('ben_suppoting_document_img'))
                      <span class="requiredfield">
                          <strong>{{ $errors->first('ben_suppoting_document_img') }}</strong>
                      </span>
                    @endif
                  <p class="textStyle">(Supporting Document to be enclose for the date of Appintment)</p>
                </div>
             


             <div class="form-group col-md-12"><h4>MOSQUE DETAILS</h4> </div>
            

                <div class="form-group col-md-4">
                 <label>Mauza<span class="requiredStar">*</span></label>
                 <input type="text" name="ben_in_mauza"  class="form-control" id="ben_in_mauza" placeholder="Mauza" value="" />
                  @if ($errors->has('ben_in_mauza'))
                    <span class="requiredfield">
                    <strong>{{ $errors->first('ben_in_mauza') }}</strong>
                    </span>
                  @endif
               </div>

               <div class="form-group{{ $errors->has('ben_in_jlno') ? 'has-error' : '' }} col-md-4">
                 <label>J.L.No<span class="requiredStar">*</span></label>
                 <input type="text" name="ben_in_jlno"  class="form-control" id="ben_in_jlno" placeholder="J.L.No" value="" data-rule="text" />
                  @if ($errors->has('ben_in_jlno'))
                    <span class="requiredfield">
                    <strong>{{ $errors->first('ben_in_jlno') }}</strong>
                    </span>
                  @endif
               </div>

               <div class="form-group{{ $errors->has('ben_in_khatian_no') ? 'has-error' : '' }} col-md-4">
                 <label>Khatian No<span class="requiredStar">*</span></label>
                 <input type="text" name="ben_in_khatian_no"  class="form-control" id="ben_in_khatian_no" placeholder="Khatian No" value="" />
                  @if ($errors->has('ben_in_khatian_no'))
                    <span class="requiredfield">
                    <strong>{{ $errors->first('ben_in_khatian_no') }}</strong>
                    </span>
                  @endif
               </div>

               <div class="form-group{{ $errors->has('ben_in_plot_no') ? 'has-error' : '' }} col-md-4">
                 <label>Plot No<span class="requiredStar">*</span></label>
                 <input type="text" name="ben_in_plot_no"  class="form-control" id="ben_in_plot_no" placeholder="Plot No" value="" />
                  @if ($errors->has('ben_in_plot_no'))
                    <span class="requiredfield">
                    <strong>{{ $errors->first('ben_in_plot_no') }}</strong>
                    </span>
                  @endif
               </div>
               <div class="form-group{{ $errors->has('ben_in_area') ? 'has-error' : '' }} col-md-4">
                 <label>Area<span class="requiredStar">*</span></label>
                 <input type="text" name="ben_in_area"  class="form-control" id="ben_in_area" placeholder="Area" value=""/>
                  @if ($errors->has('ben_in_area'))
                    <span class="requiredfield">
                    <strong>{{ $errors->first('ben_in_area') }}</strong>
                    </span>
                  @endif
               </div>

               <div class="form-group{{ $errors->has('ben_in_land_supporting_document') ? 'has-error' : '' }} col-md-4">
                 <label>Land Supporting Document<span class="requiredStar">*</span></label>
                 <input type="file" name="ben_in_land_supporting_document" value=""  id="ben_in_land_supporting_document" class="filestyle " >
                  @if ($errors->has('ben_in_land_supporting_document'))
                    <span class="requiredfield">
                    <strong>{{ $errors->first('ben_in_land_supporting_document') }}</strong>
                    </span>
                   @endif
                 <p>(Photo must be format mention)</p>
               </div>
               <div class="clearfix"></div>
              

                <div class="form-group col-md-12">
                  <div class="pretty p-svg p-curve">
                    <input type="checkbox" name="if_enrolled_borard_of_wakf" id="if_enrolled_borard_of_wakf" />
                    <div class="state p-success">
                        <svg class="svg svg-icon" viewBox="0 0 20 20">
                            <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                        </svg>
                        <label>If Enrolled with Board of Wakfs,W.B</label>
                    </div>
                  </div>
                </div>
                <div style="border:1px solid #afafaf;overflow: hidden;padding: 10px; margin:0px 15px 40px 15px;" id="con_name_of_auqaf">
                  <div class="form-group{{ $errors->has('ben_in_board_of_wakfs') ? 'has-error' : '' }} col-md-6">
                   <label>Name Board of Auqaf<span class="requiredStar">*</span></label>
                   <input type="text" name="ben_in_board_of_wakfs"  class="form-control" id="ben_in_board_of_wakfs" placeholder="Name Board of Wakf" value="" />
                   @if ($errors->has('ben_in_board_of_wakfs'))
                    <span class="requiredfield">
                    <strong>{{ $errors->first('ben_in_board_of_wakfs') }}</strong>
                    </span>
                   @endif
                  </div>

                  <div class="form-group{{ $errors->has('ben_in_no_board_of_wakf') ? 'has-error' : '' }} col-md-6">
                   <label>No Board of Auqaf(E.C No.)<span class="requiredStar">*</span></label>
                   <input type="text" name="ben_in_no_board_of_wakf"  class="form-control" id="in_no_board_of_wakf" placeholder="No Board of Wakf" value=""/>
                   @if ($errors->has('ben_in_no_board_of_wakf'))
                    <span class="requiredfield">
                    <strong>{{ $errors->first('ben_in_no_board_of_wakf') }}</strong>
                    </span>
                   @endif
                  </div>
                </div>

                <div class="form-group{{ $errors->has('ben_in_date_of_establishment_of_masque') ? 'has-error' : '' }} col-md-4" >
                  <label>Date Of Establishment of Masque</label>
                  <input type="date" class="form-control label-floating is-empty" name="ben_in_date_of_establishment_of_masque" id="in_date_of_establishment_of_masque" value="" placeholder="Date" />
                  @if ($errors->has('ben_in_date_of_establishment_of_masque'))
                  <span class="requiredfield">
                  <strong>{{ $errors->first('ben_in_date_of_establishment_of_masque') }}</strong>
                  </span>
                 @endif
                </div>

                <div class="form-group{{ $errors->has('ben_in_supporting_document_of_masque') ? 'has-error' : '' }} col-md-4">
                 <label>Supporting Document Establishment of Masque</label>
                 <input type="file" name="ben_in_supporting_document_of_masque" value=""  id="ben_in_supporting_document_of_masque" class="filestyle ">
                  @if ($errors->has('ben_in_supporting_document_of_masque'))
                  <span class="requiredfield">
                  <strong>{{ $errors->first('ben_in_supporting_document_of_masque') }}</strong>
                  </span>
                 @endif
                 <p>(Photo must be format mention)</p>
                </div>
                <div class="form-group{{ $errors->has('ben_in_name_of_maswue_presidenty') ? 'has-error' : '' }} col-md-4">
                  <label>Name of Masque's President/Secy./Mutawatti<span class="requiredStar">*</span></label>
                  <input type="text" name="ben_in_name_of_maswue_presidenty"  class="form-control" id="in_name_of_maswue_presidenty" placeholder="No Board of Wakf" value=""/>
                  @if ($errors->has('ben_in_name_of_maswue_presidenty'))
                  <span class="requiredfield">
                  <strong>{{ $errors->first('ben_in_name_of_maswue_presidenty') }}</strong>
                  </span>
                  @endif
                </div>

                <div class="clearfix"></div>
                <div class="form-group{{ $errors->has('ben_in_supporting_document_president') ? 'has-error' : '' }} col-md-4">
                 <label>Supporting Document President/Secy./Mutawatti</label>
                 <input type="file" name="ben_in_supporting_document_president" value=""  id="ben_in_supporting_document_president" class="filestyle " required>
                 @if ($errors->has('ben_in_supporting_document_president'))
                  <span class="requiredfield">
                  <strong>{{ $errors->first('ben_in_supporting_document_president') }}</strong>
                  </span>
                  @endif
                 <p>(Photo must be format mention)</p>
                </div>

          </div>
        </div>
          <div class="form-group col-md-2 pull-right">
           <button type="submit" name="save" id="save" value="Save and Process" class="btn btn-success float-right" >Save and Proceed</button>
          </div>
      </form>

    </div>
  </div>
</section>
@yield('action-content')
@endsection