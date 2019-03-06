@extends('frontend.app-template')
@section('content')
<section id="contact" class="wow">
	<div class="container box_inter">
    	<div class="col-sm-10" style="padding:10px;">
    		Sir,<br>
    		 I do hereby submit the full particulars in respect of myself as
    		 @if($application->application_for=='imam')IMAM @endif 
    		 @if($application->application_for=='moazzin') MUAZZINS @endif 
    		  (Whichover is applicable, may give tick mark) of the Masjid situated at Village/Premises No {{$application->present_premises_name_no}} P.O-{{$application->parmanent_post_office}} G.P/Word No-{{$application->present_street_name_locality_name}} Block/Municipality-@if($municipality_present->id == '') {{$block_present->block_name}} @endif,
    		    	@if($block_present->id == 0) {{$municipality_present->municipality_name}} @endif   P.S-{{$policestation_present->name}} Dist.{{$district_present->district_name}},Pin.{{$application->present_pincode}}.
    		 
    	</div>
    	<div class="col-sm-2" style="padding:10px;">Photo</div>
    	<div class="col-sm-12">
    		<div class="row">
    			<div class="form-control">
    			  <div class="col-md-6 ">Name of Imam / Moazzin(in Capital Letter)</div>
    			  <div class="col-md-6">{{$application->first_name}} {{$application->middle_name}} {{$application->last_name}}</div>
    		    </div>
    		    <div class="form-control">
    			  <div class="col-md-3">Father's Name</div>
    			  <div class="col-md-3">{{$application->father_name}}</div>
    			  <div class="col-md-3">Date Of Birth</div>
    			  <div class="col-md-3">{{$application->dob}}</div>
    		    </div>

    		    <div class="form-control">
    			  <div class="col-md-3">Nationality</div>
    			  <div class="col-md-3">{{$application->nationality}}</div>
    			  <div class="col-md-6"></div>
    			</div>
    			  <br>
    			  <h3>Parmanent Address</h3>

    		    <div class="form-control">
    		      <div class="col-md-12">{{$application->parmanent_premises_name_no}},{{$application->parmanent_village_premises}},{{$application->parmanent_street_name_locality_name}},
    		    	 @if($municipality->id==0) {{$block->block_name}} @endif
    			  	 @if($block->id == 0) {{$municipality->municipality_name}} @endif ,
    			  	{{$subdivision->sub_division_name}}, {{$district_parmanent->district_name}},
    			  	{{$application->parmanent_post_office}}, {{$application->parmanent_pincode}}
    			  	{{$states->name}}
    			  </div>
    			</div>
    			<div class="form-control">
    		    	<div class="col-md-3">Police Station</div>
    		    	<div class="col-md-3">{{$policestation->name}}</div>
    		    </div>

    		    <h3>Present Address</h3>
    		    <div class="col-md-12">
    		    	{{$application->present_premises_name_no}}, {{$application->present_street_name_locality_name}} ,{{$district_present->district_name}}
    		    	{{$subdivision_present->sub_division_name}}, 
    		    	@if($municipality_present->id == '') {{$block_present->block_name}} @endif,
    		    	@if($block_present->id == 0) {{$municipality_present->municipality_name}}, @endif ,
    		    	{{$district_present->district_name}}, {{$subdivision_present->sub_division_name}}, {{$grampanchayat_present->gram_panchayet_name}}


    		    </div>
    		    <br>
    		    <div class="form-control">
    		    	<div class="col-md-3">Aadhar No</div>
    		    	<div class="col-md-3">{{$application->aadhar_no}}</div>
    		    	<div class="col-md-3">Pan No</div>
    		    	<div class="col-md-3">{{$application->pan_no}}</div>
    		    </div>
    		    <div class="form-control">
    		    	<div class="col-md-3">Email id</div>
    		    	<div class="col-md-3">{{$application->email_id}}</div>
    		    	<div class="col-md-3">Contact No</div>
    		    	<div class="col-md-3">{{$application->mobile_no}}</div>
    		    </div>
    		    <div class="form-control">
    		    	<div class="col-md-3">Engage By Whom</div>
    		    	<div class="col-md-3">{{$application->engage_by_whom}}</div>
    		    	<div class="col-md-3">Date of Appointment</div>
    		    	<div class="col-md-3">{{$application->date_of_appiontment}}</div>
    		    </div>

    		    <div class="form-control">
    		    	<div class="col-md-3">Period Of Experience</div>
    		    	<div class="col-md-3">{{$application->engage_by_whom}}</div>
    		    	<div class="col-md-3">Period of Experience</div>
    		    	<div class="col-md-3">{{$application->period_of_experience}}</div>
    		    </div>
    		    <div class="form-control">
    		    	<div class="col-md-3">Education Qualification</div>
    		    	<div class="col-md-3">{{$application->educational_qualification}}</div>
    		    	<div class="col-md-3">Name Of Bank</div>
    		    	<div class="col-md-3">{{$application->name_of_bank}}</div>
    		    </div>
    		    <div class="form-control">
    		    	<div class="col-md-3">Name Of Bank Branch</div>
    		    	<div class="col-md-3">{{$application->name_of_bank_branch}}</div>
    		    	<div class="col-md-3">Account Type</div>
    		    	<div class="col-md-3">{{$application->account_type}}</div>
    		    </div>
    		    <div class="form-control">
    		    	<div class="col-md-3">Account No</div>
    		    	<div class="col-md-3">{{$application->account_no}}</div>
    		    	<div class="col-md-3">IFSC No</div>
    		    	<div class="col-md-3">{{$application->ifsc_no}}</div>
    		    </div>
    		    <h3>Land Particular</h3>
    		    <br>
    		    <div class="form-control">
    		    	<div class="col-md-3">Mauza</div>
    		    	<div class="col-md-3">{{$application->mauza}}</div>
    		    	<div class="col-md-3">JL No</div>
    		    	<div class="col-md-3">{{$application->j_l_no}}</div>
    		    </div>
    		    <div class="form-control">
    		    	<div class="col-md-3">Khation No</div>
    		    	<div class="col-md-3">{{$application->plot_no}}</div>
    		    	<div class="col-md-3">Area Of Plot</div>
    		    	<div class="col-md-3">{{$application->area_of_plot}}</div>
    		    </div>
    		    <div class="form-control">
    		    	<div class="col-md-3">if enrolled with Board of Wakfs,W.B</div>
    		    	<div class="col-md-3">{{$application->name_board_of_auqaf}} ({{$application->no_board_of_auqaf}})</div>
    		    	<div class="col-md-3">Date Of Establishment Of Masque</div>
    		    	<div class="col-md-3">{{$application->date_of_establishment_of_masque}}</div>
    		    </div>
    		    <div class="form-control">
    		    	<div class="col-md-6">Name Of Masque President Secy Mmutawalli</div>
    		    	<div class="col-md-3">{{$application->name_of_masque_president_secy_mutawalli}}</div>
    		    </div>
    		    
    		    
    		</div>
    	</div>


    </div> 	
</section>

@yield('action-content')
@endsection