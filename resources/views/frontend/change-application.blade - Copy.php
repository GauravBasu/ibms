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
          <h3>APPLICATION FORM FOR CHANGE IMAMS/MUAZZINS</h3>

          <div class="form-group{{ $errors->has('in_imam_moazzin') ? 'has-error' : '' }} col-md-6 col-md-offset-6" >
              <label>Imam/Moazzin<span class="requiredStar">*</span></label>
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
            <div class="form-group{{ $errors->has('in_passport_user_img') ? 'has-error' : '' }} col-md-3 ">
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
              <img id="imgbanner" class="img-responsive" width="100" style=" padding-left:0px;  padding-bottom:7px; ">
              <div id="imgsize"></div>
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

            <div class="form-group{{ $errors->has('in_dob') ? 'has-error' : '' }} col-md-4" >
              <label>Date Of Birth<span class="requiredStar">*</span></label>
              <input type="date" class="form-control label-floating is-empty" name="in_dob" id="in_dob" value="" placeholder="Date" />
                @if ($errors->has('in_dob'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_dob') }}</strong>
                  </span>
                @endif
            </div>
            <div class="clearfix"></div>
            <div class="form-group{{ $errors->has('in_nationality') ? 'has-error' : '' }} col-md-4">
              <label>Nationality<span class="requiredStar">*</span></label>
              <select class="form-control select2" name="in_nationality" value="" id="in_nationality" style="width: 100%;" placeholder="Nationality">
                <option value="india" selected="selected">India</option>
                <option value="afghan">Afghan</option>
                <option value="albanian">Albanian</option>
                <option value="algerian">Algerian</option>
                <option value="american">American</option>
                <option value="andorran">Andorran</option>
              </select>
                @if ($errors->has('in_nationality'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_nationality') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('in_aadhar_no') ? 'has-error' : '' }} col-md-4">
              <label>Aadhar No</label>
              <input type="text" name="in_aadhar_no" value="" class="form-control" id="in_aadhar_no" placeholder="Aadhar No" />
                @if ($errors->has('in_aadhar_no'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_aadhar_no') }}</strong>
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

          <h4>PRESENT ADDRESS</h4>
          <div class="row">
            <div class="form-group{{ $errors->has('in_pre_village_premises') ? 'has-error' : '' }} col-md-4">
              <label>Village/Premises<span class="requiredStar">*</span></label>
              <input type="text" name="in_pre_village_premises" value="" class="form-control" id="in_pre_village_premises" placeholder="Village/Premises Name" />
                @if ($errors->has('in_pre_village_premises'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_pre_village_premises') }}</strong>
                  </span>
                @endif
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

            <div class="form-group{{ $errors->has('ben_district') ? 'has-error' : '' }} col-md-4" >
              <label>Beneficiary District </label>
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

            <div class="form-group col-md-4" >
                <label >Urban/Rural </label>
                
                  <select class="form-control" name="ben_rural_urban" id="ben_rural_urban" required>
                      <option value="0">Select</option>
                      <option value="1">Rural</option>
                      <option value="2">Urban</option>
                  </select>
               
            </div>

            <div class="form-group col-md-4" id="ben_municipality_id">
                <label >Municipality</label>
                
                    <select class="form-control select2" name="ben_municipality" id="ben_municipality_muni_id">
                        <option value="0">Select</option>
                    </select>
                
            </div>

            <div class="form-group col-md-4" id="ben_block_id" >
                <label >Block</label>
                
                    <select class="form-control select2" name="ben_block" id="brn_block_id">
                        <option value="0">Select</option>
                    </select>
                
            </div>
          </div>



        <div class="row">      
            <div class="form-group col-md-12"><h4>PERMANENT ADDRESS</h4> ( <input type="checkbox" id="addressCheckbox" name="addressSame">Same as Present Address)</div>
            <div class="form-group{{ $errors->has('in_pre_village_premises') ? 'has-error' : '' }} col-md-4">
              <label>Village/Premises<span class="requiredStar">*</span></label>
              <input type="text" name="in_pre_village_premises" value="" class="form-control" id="in_pre_village_premises" placeholder="Village/Premises Name" />
                @if ($errors->has('in_pre_village_premises'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_pre_village_premises') }}</strong>
                  </span>
                @endif
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
              <label >Beneficiary District</label>
                  <select class="form-control select2" name="ben_district" id="ben_district_id">
                      <option value="0">Select</option>
                      @foreach ($districts as $district)
                          <option value="{{$district->id}}">{{$district->district_name}}</option>
                      @endforeach
                  </select>
            </div>

            <div class="form-group col-md-4" >
                <label >Urban/Rural </label>
                <select class="form-control" name="ben_rural_urban" id="ben_rural_urban" required>
                        <option value="0">Select</option>
                        <option value="1">Rural</option>
                        <option value="2">Urban</option>
                    </select>
            </div>

            <div class="form-group col-md-4" id="ben_municipality_id">
                <label >Municipality</label>
                <select class="form-control select2" name="ben_municipality" id="ben_municipality_muni_id">
                    <option value="0">Select</option>
                </select>
            </div>

            <div class="form-group col-md-4" id="ben_block_id" >
                <label >Block</label>
                <select class="form-control select2" name="ben_block" id="brn_block_id">
                    <option value="0">Select</option>
                </select>
            </div>

        </div>
        <div class="row">   
            <div class="form-group col-md-12"><h4>AUQAF ADDRESS</h4> </div>
            <div class="col-md-4 ">
               <label>Period Of Experience</label>
               <select id="fromMonth" name="in_period_of_experience" value="" class="form-control select2" >
                <option value="">Select Month</option>
                <option value="01">Madhyamik</option>
                <option value="02">High Secendary</option>
                <option value="03">Graduation</option>
                <option value="04">master Degree</option>
                <option value="05">Others</option>
               </select>
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
            <div class="form-group{{ $errors->has('in_educational_documenr_attach') ? 'has-error' : '' }} col-md-4">
             <label>Educational Qualification document Attachment<span class="requiredStar">*</span></label>
             <input type="file" name="in_educational_documenr_attach" value=""  id="user_img" class="filestyle " required>
                @if ($errors->has('in_educational_documenr_attach'))
                  <span class="requiredfield">
                  <strong>{{ $errors->first('in_educational_documenr_attach') }}</strong>
                  </span>
                @endif
             <p>(Photo must be format mention)</p>
            </div>

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

            <div class="form-group{{ $errors->has('in_supporting_bank_document') ? 'has-error' : '' }} col-md-4">
             <label>Supporting Bank Document<span class="requiredStar">*</span></label>
             <input type="file" name="in_supporting_bank_document" value=""  id="in_supporting_bank_document" class="filestyle " required>
                @if ($errors->has('in_supporting_bank_document'))
                  <span class="requiredfield">
                  <strong>{{ $errors->first('in_supporting_bank_document') }}</strong>
                  </span>
                @endif
             <p>(Photo must be format mention)</p>
           </div>
           <div class="form-group{{ $errors->has('in_engage_by_wgom') ? 'has-error' : '' }} col-md-4">
              <label>Engaga By Whom</label>
              <input type="text" name="in_engage_by_wgom" value="" class="form-control" id="in_engage_by_wgom" placeholder="Engaga By Whom" />
                @if ($errors->has('in_engage_by_wgom'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_engage_by_wgom') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('in_date_of_appintment') ? 'has-error' : '' }} col-md-4" >
              <label>Date of Appointment<span class="requiredStar">*</span></label>
              <input type="date" class="form-control label-floating is-empty" name="in_date_of_appintment" id="in_date_of_appintment" value="" placeholder="Date of Appointment" />
                @if ($errors->has('in_date_of_appintment'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_date_of_appintment') }}</strong>
                  </span>
                @endif
            </div>


            <div class="form-group{{ $errors->has('suppoting_document_img') ? 'has-error' : '' }} col-md-4 ">
              <label>Supporting Document to be enclose<span class="requiredStar">*</span></label>
              <input type="file" name="suppoting_document_img" value=""  id="suppoting_document_img" class="filestyle " >
                @if ($errors->has('suppoting_document_img'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('suppoting_document_img') }}</strong>
                  </span>
                @endif
              <p class="textStyle">(Supporting Document to be enclose for the date of Appintment)</p>
            </div>
        </div>
          <div class="row">
             <div class="form-group{{ $errors->has('in_mauza') ? 'has-error' : '' }} col-md-12"><h4>LAND PARTICULARS</h4> </div>
             <div class=" col-md-4">
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

             <div class="form-group{{ $errors->has('in_land_supporting_document') ? 'has-error' : '' }} col-md-4">
               <label>Land Supporting Document<span class="requiredStar">*</span></label>
               <input type="file" name="in_land_supporting_document" value=""  id="in_land_supporting_document" class="filestyle " >
                @if ($errors->has('in_land_supporting_document'))
                  <span class="requiredfield">
                  <strong>{{ $errors->first('in_land_supporting_document') }}</strong>
                  </span>
                 @endif
               <p>(Photo must be format mention)</p>
             </div>
             <div class="form-group col-md-12"><h4>OTHER INFORMATION</h4> </div>
           
          </div>

          <div class="form-group col-md-12"><P><b>ADDRESS PROOF WITH  PHOTO ID</b></P>
             <p>Note: Attach only scanned jpg images or PDF files of your original documents. Scanned Images must be clear and document size must be less then 100kb and readable otherwise applications will be rejected</p>
             <label>Please Select the document for PCC</label>
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
      </form>
    </div>
  </div>
</section>
@yield('action-content')
@endsection