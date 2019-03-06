@extends('frontend.app-template')
@section('content')
<section id="contact" class="wow "  >
  <div class="container box_inter" >
    <div class="form" >
      <form name="registration" id="registration" action="{{url('/application/update')}}" method="post" role="form" class="contactForm" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <div class="col-md-12">
        <div class="row">
        
          <h3>EDIT APPLICATION FORM FOR  IMAMS/MUAZZINS</h3>

            <div class="form-group{{ $errors->has('in_imam_moazzin') ? 'has-error' : '' }} col-md-8 col-sm-8 col-xs-12 " >
              <div class="row">
                <label style="font-size:15px;">Imam/Moazzin<span class="requiredStar">*</span></label>
              <select name="in_imam_moazzin" value="" class="form-control select2" required>
                <option value="">--Select Imam/Moazzin--</option>
                <option value="imam"  
                          @if($application->application_for=='imam') selected @endif >Imam</option>
                <option value="moazzin" @if($application->application_for=='moazzin') selected @endif>Moazzin</option>
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
                <input type="text" name="in_first_name" class="form-control" id="in_first_name" placeholder="First Name" data-rule="text" data-msg="Please enter Your First Name" value="{{$application->first_name}}"  required/>
                @if ($errors->has('in_first_name'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_first_name') }}</strong>
                  </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('in_middle_name') ? 'has-error' : '' }} col-md-4">
                <label for="in_middle_name">Middle Name</label>
                <input type="text" name="in_middle_name" value="{{$application->middle_name}}" class="form-control in_middle_name" id="in_middle_name" placeholder="Middle Name" />
                @if ($errors->has('in_middle_name'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_middle_name') }}</strong>
                  </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('in_last_name') ? 'has-error' : '' }} col-md-4">
                <label>Last Name<span class="requiredStar">*</span></label>
                <input type="text" class="form-control" name="in_last_name" id="in_last_name" placeholder="Last Name" value="{{$application->last_name}}" required/>
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
                <img  src="{{URL::to('/')}}/app/keep/{{$application->application_id}}/{{$application->application_profile_pic_for}}" class="imageSize " width="90" height="100"></img>

              <div class="row">
                <img id="imgbanner" class="img-responsive"   style="height:100px; padding-left:0px;  padding-bottom:7px; ">
              <div id="imgsize"></div>
              </div>
            </div>

            <div class="form-group{{ $errors->has('in_dob') ? 'has-error' : '' }} col-md-4" >
              <label>Date Of Birth<span class="requiredStar">*</span></label>
              <input type="date" class="form-control label-floating is-empty" name="in_dob" id="in_dob" value="{{$application->dob}}" placeholder="Date" >
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
              <input type="text" name="in_father_name" value="{{$application->father_name}}" class="form-control" id="in_father_name" placeholder="Father's Name"  >
                @if ($errors->has('in_father_name'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_father_name') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('in_aadhar_no') ? 'has-error' : '' }} col-md-4">
              <label>Aadhar No</label>
              <input type="text" name="in_aadhar_no" value="{{$application->aadhar_no}}" class="form-control" id="in_aadhar_no" placeholder="Aadhar No" >
                @if ($errors->has('in_aadhar_no'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_aadhar_no') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('in_voter_no') ? 'has-error' : '' }} col-md-4">
              <label>Voter Card No</label>
              <input type="text" name="in_voter_no" value="{{$application->voter_card_no}}" class="form-control" id="in_voter_no" placeholder="Aadhar No" />
                @if ($errors->has('in_voter_no'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_voter_no') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('in_pan_no') ? 'has-error' : '' }} col-md-4">
              <label>Pan No</label>
              <input type="text" name="in_pan_no" value="{{$application->pan_no}}" class="form-control" id="in_pan_no" placeholder="PAN No" />
                @if ($errors->has('in_pan_no'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_pan_no') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('in_email') ? 'has-error' : '' }} col-md-4">
              <label>Email Address</label>
              <input type="email" name="in_email" value="{{$application->email_id}}" class="form-control" id="in_email" placeholder="Email Address" readonly />
                @if ($errors->has('in_email'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_email') }}</strong>
                  </span>
                @endif
            </div>

            

            <div class="form-group{{ $errors->has('in_educational_qualification') ? 'has-error' : '' }} col-md-4">
             <label>Educational Qualification<span class="requiredStar">*</span></label>
             <input type="text" name="in_educational_qualification"  class="form-control" id="in_educational_qualification" placeholder="Educational Qualification" value="{{$application->educational_qualification}}"  >
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

           
        </div>  
          <h4>PRESENT ADDRESS</h4>
          <div class="row">
            <div class="form-group{{ $errors->has('in_premises_name_number') ? 'has-error' : '' }} col-md-4">
              <label>Premises Name & Number<span class="requiredStar">*</span></label>
              <input type="text" name="in_premises_name_number" value="{{$application->present_premises_name_no}}" class="form-control" id="in_premises_name_number" placeholder="Premises Name & Number" />
                @if ($errors->has('in_premises_name_number'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_premises_name_number') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('in_street_localoty_name') ? 'has-error' : '' }} col-md-4">
              <label>Street Name/Locality Name<span class="requiredStar">*</span></label>
              <input type="text" name="in_street_localoty_name" value="{{$application->present_street_name_locality_name}}" class="form-control" id="in_street_localoty_name" placeholder="Street Name Or Locality Name" />
                @if ($errors->has('in_street_localoty_name'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_street_localoty_name') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('ben_district') ? 'has-error' : '' }} col-md-4" >
              <label>District</label>

                    
                     
                    
                    <select class="form-control select2" name="ben_district" id="ben_district_id">
                    <option value="0">Select</option>
                    @foreach ($districts as $district) 
                    <option value="{{$district->id}}" @if($district->id==$application->present_district_id) selected @endif>{{$district->district_name}}</option>
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
                    @foreach ($sub_divisions as $sub_division) 
                    <option value="{{$sub_division->id}}" @if($sub_division->id==$application->present_sub_division_id) selected @endif>{{$sub_division->sub_division_name}}</option>
                      @endforeach 
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
                      <option value="0">--Select--</option>
                      <option value="1" @if($application->present_area_id==1) selected @endif >Rural</option>
                      <option value="2" @if($application->present_area_id==2) selected @endif>Urban</option>
                  </select>
            </div>

            

            @if ($application->present_area_id==2)

            <div class="form-group col-md-4" >
                  <label >Municipality</label>
                    <select  class="form-control " name="present_municipality_id" id="present_municipality_id">
                        <option value="0">Select</option>
                    @foreach ($municipalities as $municipality) 
                    <option value="{{$block->id}}" @if($municipality->id==$application->present_municipality_id) selected @endif>{{$municipality->municipality_name}}</option>
                    @endforeach 
                    </select>
            </div>
            @endif

            
            @if ($application->present_area_id==1)
            <div class="form-group col-md-4"  >
              <label>Block</label>
              <select class="form-control " name="ben_block" id="brn_block_id">
                  <option value=" ">Select</option>
                    @foreach ($blocks as $block) 
                    <option value="{{$block->id}}" @if($block->id==$application->present_block_id) selected @endif>{{$block->block_name}}</option>
                    @endforeach 
              </select>
            </div>
            @endif

             

             <div class="form-group{{ $errors->has('in_gram_panchayet') ? 'has-error' : '' }} col-md-4" >
              <label>Select Gram Panchayet  <span class="requiredStar">*</span></label>
              <select name="in_gram_panchayet" id="in_gram_panchayet" value="" class="form-control " >
                <option value=" ">Select</option>
                   @foreach ($grampanchayats as $grampanchayat) 
                    <option value="{{$grampanchayat->id}}" @if($grampanchayat->id==$application->present_gram_panchayet_id) selected @endif>{{$grampanchayat->gram_panchayet_name}}</option>
                    @endforeach 
               
              </select>
                @if ($errors->has('in_gram_panchayet'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_gram_panchayet') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('present_in_police_station_name') ? 'has-error' : '' }} col-md-4" >
              <label>Select Police Station <span class="requiredStar">*</span></label>
              <select name="present_in_police_station_name" id="present_in_police_station_name" value="" class="form-control select2" >
                <option value="">--Select PS--</option>
                @foreach ($policestations as $policestation) 
                    <option value="{{$policestation->id}}" @if($policestation->id==$application->present_police_station_id) selected @endif>{{$policestation->name}}</option>
                    @endforeach 
                
              </select>
                @if ($errors->has('parmanent_in_police_station_name'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('parmanent_in_police_station_name') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group col-md-4" id="present_village_premises">
              <label>Village/Premises<span class="requiredStar">*</span></label>
              <input type="text" name="present_pre_village_premises" id="present_pre_village_premises" value="{{$application->present_village_premises}}" class="form-control"  placeholder="Village/Premises Name" />
            </div>

           

           



            <div class="form-group{{ $errors->has('in_pre_post_office') ? 'has-error' : '' }} col-md-4">
              <label>Post Office<span class="requiredStar">*</span></label>
              <input type="text" name="in_pre_post_office" value="{{$application->present_post_office}}" class="form-control" id="in_pre_post_office" placeholder="Post Office Name"/>
                @if ($errors->has('in_pre_post_office'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_pre_post_office') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('in_pre_present_pincode') ? 'has-error' : '' }} col-md-4">
              <label>Pincode<span class="requiredStar">*</span></label>
              <input type="number" name="in_pre_present_pincode" value="{{$application->present_pincode}}" class="form-control" id="in_pre_present_pincode" placeholder="Pincode" pattern="[0-9]{6}" maxlength="6" />
                @if ($errors->has('in_pre_present_pincode'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('in_pre_present_pincode') }}</strong>
                  </span>
                @endif
            </div>
          </div>

        <div class="row">      
            <div class="form-group col-md-12"><h4>PERMANENT ADDRESS</h4>
             
            </div>

            <div class="form-group{{ $errors->has('parmanent_in_premises_name_number') ? 'has-error' : '' }} col-md-4">
              <label>Premises Name & Number<span class="requiredStar">*</span></label>
              <input type="text" name="parmanent_in_premises_name_number" value="{{$application->parmanent_premises_name_no}}" class="form-control" id="parmanent_in_premises_name_number" placeholder="Premises Name & Number" />
                @if ($errors->has('parmanent_in_premises_name_number'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('parmanent_in_premises_name_number') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('parmanent_in_street_locality_name') ? 'has-error' : '' }} col-md-4">
              <label>Street Name/Locality Name<span class="requiredStar">*</span></label>
              <input type="text" name="parmanent_in_street_locality_name" value="{{$application->parmanent_street_name_locality_name}}" class="form-control" id="parmanent_in_street_locality_name" placeholder="Street Name Or Locality Name" />
                @if ($errors->has('parmanent_in_street_locality_name'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('parmanent_in_street_locality_name') }}</strong>
                  </span>
                @endif
            </div>

           

            

            <div class="form-group col-md-4"  >
                    <label> District </label>
                    <select class="form-control district_class " name="parmanent_ben_district" id="withinstate_parmanent_ben_district">
                        <option value="0">Select</option>
                         @foreach ($districts as $district) 
                    <option value="{{$district->id}}" @if($district->id==$application->parmanent_district_id) selected @endif>{{$district->district_name}}</option>
                      @endforeach 
                    </select>
            </div>


            <div class="form-group{{ $errors->has('parmanent_in_pre_subdivision') ? 'has-error' : '' }} col-md-4" id="in_pre_subdivision_id" >
                <label >Sub Division</label>
                <select class="form-control " name="parmanent_in_pre_subdivision" id="parmanent_in_pre_subdivision">
                    <option value="0">--Sub Division --</option>
                     @foreach ($sub_divisions as $sub_division) 
                    <option value="{{$sub_division->id}}" @if($sub_division->id==$application->parmanent_sub_division_id) selected @endif>{{$sub_division->sub_division_name}}</option>
                      @endforeach 
                </select>
                @if ($errors->has('parmanent_in_pre_subdivision'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('parmanent_in_pre_subdivision') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group col-md-4" >
                <label >Area </label>
                  <select class="form-control" name="ben_rural_urban" id="present_area_ben_rural_urban" required>
                      <option value="0">--Select--</option>
                      <option value="1" @if($application->parmanent_area_id==1) selected @endif >Rural</option>
                      <option value="2" @if($application->parmanent_area_id==2) selected @endif>Urban</option>
                  </select>
            </div>

             @if ($application->parmanent_area_id==2)
            <div class="form-group col-md-4" >
                  <label >Municipality</label>
                    <select  class="form-control " name="parmanent_municipality_id" id="present_municipality_id">
                        <option value="0">Select</option>
                    @foreach ($municipalities as $municipality) 
                    <option value="{{$block->id}}" @if($municipality->id==$application->parmanent_municipality_id) selected @endif>{{$municipality->municipality_name}}</option>
                    @endforeach 
                    </select>
            </div>
            @endif

            
            @if ($application->parmanent_area_id==1)
            <div class="form-group col-md-4">
              <label>Block</label>
              <select class="form-control " name="parmanent_block" id="parmanent_block_id">
                  <option value=" ">Select</option>
                    @foreach ($blocks as $block) 
                    <option value="{{$block->id}}" @if($block->id==$application->parmanent_block_id) selected @endif>{{$block->block_name}}</option>
                    @endforeach 
              </select>
            </div>
            @endif

            <div class="form-group{{ $errors->has('parmanent_in_gram_panchayet_name') ? 'has-error' : '' }} col-md-4"  >
              <label>Select Gram Panchayat  <span class="requiredStar">*</span></label>
              <select name="parmanent_in_gram_panchayet_name" id="parmanent_in_gram_panchayet_name" value="" class="form-control " >
                <option value="0">Select</option>
                 @foreach ($grampanchayats as $grampanchayat) 
                    <option value="{{$grampanchayat->id}}" @if($grampanchayat->id==$application->parmanent_gram_panchayet_id) selected @endif>{{$grampanchayat->gram_panchayet_name}}</option>
                    @endforeach 
              </select>
                @if ($errors->has('parmanent_in_gram_panchayet_name'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('parmanent_in_gram_panchayet_name') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('parmanent_in_police_station_name') ? 'has-error' : '' }} col-md-4" >
              <label>Select Police Station <span class="requiredStar">*</span></label>
              <select name="parmanent_in_police_station_name" id="parmanent_in_police_station_name" value="" class="form-control select2" >
                <option value="">--Select PS--</option>
                @foreach ($policestations as $policestation) 
                    <option value="{{$policestation->id}}" @if($policestation->id==$application->parmanent_police_station_id) selected @endif>{{$policestation->name}}</option>
                    @endforeach 
                
              </select>
                @if ($errors->has('parmanent_in_police_station_name'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('parmanent_in_police_station_name') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group col-md-4" id="parmanent_village_premises">
              <label>Village/Premises<span class="requiredStar">*</span></label>
              <input type="text" name="parmanent_in_pre_village_premises" value="{{$application->parmanent_village_premises}}" class="form-control" id="parmanent_in_pre_village_premises" placeholder="Village/Premises Name" />
            </div>

            

            <div class="form-group{{ $errors->has('parmanent_in_pre_post_office') ? 'has-error' : '' }} col-md-4">
              <label>Post Office<span class="requiredStar">*</span></label>
              <input type="text" name="parmanent_in_pre_post_office" value="{{$application->parmanent_post_office}}" class="form-control" id="parmanent_in_pre_post_office" placeholder="Post Office Name"/>
                @if ($errors->has('parmanent_in_pre_post_office'))
                  <span class="requiredfield">
                      <strong>{{ $errors->first('parmanent_in_pre_post_office') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('in_pre_parmanent_pincode') ? 'has-error' : '' }} col-md-4">
              <label>Pincode<span class="requiredStar">*</span></label>
              <input type="number" name="in_pre_parmanent_pincode" value="{{$application->parmanent_pincode}}" class="form-control" id="in_pre_parmanent_pincode" placeholder="Pincode" pattern="[0-9]{6}" maxlength="6" />
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
             <input type="text" name="ben_in_bank_name" value="{{$application->name_of_bank}}" class="form-control" id="ben_in_bank_name" placeholder="Bank Name" />
                @if ($errors->has('ben_in_bank_name'))
                  <span class="requiredfield">
                  <strong>{{ $errors->first('ben_in_bank_name') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('ben_in_branch_name') ? 'has-error' : '' }} col-md-4">
              <label>Name Of Bank Branch<span class="requiredStar">*</span></label>
              <input type="text" name="ben_in_branch_name" value="{{$application->name_of_bank_branch}}" class="form-control" id="ben_in_branch_name" placeholder="Bank Branch Name"/>
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
                <option value="Savings" @if($application->account_type=='Savings') selected @endif >Savings</option>
                <option value="Current" @if($application->account_type=='Current') selected @endif >Current</option>
                <option value="Cash-Credit" @if($application->account_type=='Cash-Credit') selected @endif >Cash-Credit </option>
              </select>
                @if ($errors->has('ben_in_account_type'))
                  <span class="requiredfield">
                  <strong>{{ $errors->first('ben_in_account_type') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('ben_in_account_no') ? 'has-error' : '' }} col-md-4">
              <label>Account No<span class="requiredStar">*</span></label>
              <input type="text" name="ben_in_account_no" value="{{$application->account_no}}" class="form-control" id="in_account_no" placeholder=" Account No" />
                @if ($errors->has('ben_in_account_no'))
                  <span class="requiredfield">
                  <strong>{{ $errors->first('ben_in_account_no') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('ben_in_ifsc_no') ? 'has-error' : '' }} col-md-4">
              <label>IFSC No<span class="requiredStar">*</span></label>
              <input type="text" name="ben_in_ifsc_no" value="{{$application->ifsc_no}}" class="form-control" id="ben_in_ifsc_no" placeholder=" IFSC No"/>
                @if ($errors->has('ben_in_ifsc_no'))
                  <span class="requiredfield">
                  <strong>{{ $errors->first('ben_in_ifsc_no') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('ben_in_supporting_bank_document') ? 'has-error' : '' }} col-md-4">
             <label>Supporting Bank Document<span class="requiredStar">*</span></label>
             <input type="file" name="ben_in_supporting_bank_document"   id="ben_in_supporting_bank_document" class="filestyle " required>
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
                    <option value="more then 3"  @if($application->period_of_experience=='more then 3') selected @endif >>3</option>
                    <option value="Less then 3"  @if($application->period_of_experience=='Less then 3') selected @endif ><3</option>
                   </select>
                </div>

                
                <div class="form-group{{ $errors->has('ben_in_engage_by_wgom') ? 'has-error' : '' }} col-md-4">
                  <label>Engaga By Whom</label>
                  <input type="text" name="ben_in_engage_by_wgom" value="{{$application->engage_by_whom}}" class="form-control" id="in_engage_by_wgom" placeholder="Engaga By Whom" />
                  @if ($errors->has('ben_in_engage_by_wgom'))
                    <span class="requiredfield">
                        <strong>{{ $errors->first('ben_in_engage_by_wgom') }}</strong>
                    </span>
                  @endif
                </div>

                <div class="form-group{{ $errors->has('ben_in_date_of_appintment') ? 'has-error' : '' }} col-md-4" >
                  <label>Date of Appointment<span class="requiredStar">*</span></label>
                  <input type="date" class="form-control label-floating is-empty" name="ben_in_date_of_appintment" id="ben_in_date_of_appintment" value="{{$application->date_of_appiontment}}" placeholder="Date of Appointment" />
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
                 <input type="text" name="ben_in_mauza"  class="form-control" id="ben_in_mauza" placeholder="Mauza" value="{{$application->mauza}}" />
                  @if ($errors->has('ben_in_mauza'))
                    <span class="requiredfield">
                    <strong>{{ $errors->first('ben_in_mauza') }}</strong>
                    </span>
                  @endif
               </div>

               <div class="form-group{{ $errors->has('ben_in_jlno') ? 'has-error' : '' }} col-md-4">
                 <label>J.L.No<span class="requiredStar">*</span></label>
                 <input type="text" name="ben_in_jlno"  class="form-control" id="ben_in_jlno" placeholder="J.L.No" value="{{$application->j_l_no}}" data-rule="text" />
                  @if ($errors->has('ben_in_jlno'))
                    <span class="requiredfield">
                    <strong>{{ $errors->first('ben_in_jlno') }}</strong>
                    </span>
                  @endif
               </div>

               <div class="form-group{{ $errors->has('ben_in_khatian_no') ? 'has-error' : '' }} col-md-4">
                 <label>Khatian No<span class="requiredStar">*</span></label>
                 <input type="text" name="ben_in_khatian_no"  class="form-control" id="ben_in_khatian_no" placeholder="Khatian No" value="{{$application->khation_no}}" />
                  @if ($errors->has('ben_in_khatian_no'))
                    <span class="requiredfield">
                    <strong>{{ $errors->first('ben_in_khatian_no') }}</strong>
                    </span>
                  @endif
               </div>

               <div class="form-group{{ $errors->has('ben_in_plot_no') ? 'has-error' : '' }} col-md-4">
                 <label>Plot No<span class="requiredStar">*</span></label>
                 <input type="text" name="ben_in_plot_no"  class="form-control" id="ben_in_plot_no" placeholder="Plot No" value="{{$application->plot_no}}" />
                  @if ($errors->has('ben_in_plot_no'))
                    <span class="requiredfield">
                    <strong>{{ $errors->first('ben_in_plot_no') }}</strong>
                    </span>
                  @endif
               </div>
               <div class="form-group{{ $errors->has('ben_in_area') ? 'has-error' : '' }} col-md-4">
                 <label>Area<span class="requiredStar">*</span></label>
                 <input type="text" name="ben_in_area"  class="form-control" id="ben_in_area" placeholder="Area" value="{{$application->area_of_plot}}"/>
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
                   <input type="text" name="ben_in_board_of_wakfs"  class="form-control" id="ben_in_board_of_wakfs" placeholder="Name Board of Wakf" value="{{$application->name_board_of_auqaf}}" />
                   @if ($errors->has('ben_in_board_of_wakfs'))
                    <span class="requiredfield">
                    <strong>{{ $errors->first('ben_in_board_of_wakfs') }}</strong>
                    </span>
                   @endif
                  </div>

                  <div class="form-group{{ $errors->has('ben_in_no_board_of_wakf') ? 'has-error' : '' }} col-md-6">
                   <label>No Board of Auqaf(E.C No.)<span class="requiredStar">*</span></label>
                   <input type="text" name="ben_in_no_board_of_wakf"  class="form-control" id="in_no_board_of_wakf" placeholder="No Board of Wakf" value="{{$application->no_board_of_auqaf}}"/>
                   @if ($errors->has('ben_in_no_board_of_wakf'))
                    <span class="requiredfield">
                    <strong>{{ $errors->first('ben_in_no_board_of_wakf') }}</strong>
                    </span>
                   @endif
                  </div>
                </div>

                <div class="form-group{{ $errors->has('ben_in_date_of_establishment_of_masque') ? 'has-error' : '' }} col-md-4" >
                  <label>Date Of Establishment of Masque</label>
                  <input type="date" class="form-control label-floating is-empty" name="ben_in_date_of_establishment_of_masque" id="in_date_of_establishment_of_masque" value="{{$application->date_of_establishment_of_masque}}" placeholder="Date" />
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
                  <input type="text" name="ben_in_name_of_maswue_presidenty"  class="form-control" id="in_name_of_maswue_presidenty" placeholder="No Board of Wakf" value="{{$application->name_of_masque_president_secy_mutawalli}}"/>
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