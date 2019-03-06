<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\District;
use App\Block;
use App\Beneficiary;
use Illuminate\Support\Facades\Input;
use App\Municipality;
use Illuminate\Support\Facades\Log;
use App\OTPUser;
use App\Subdivision;
use Auth;
use App\Grampanchayat;
use App\Policestation;
use App\State;
use App\PicUpload;
use PDF;
use TCPDF;
use TCPDF2DBarcode;
//use CUSTOMPDF;


class FrontBeneficiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $states = State::all();
        //$municipalities = Municipality::all();
        $districts = District::all();
        $policestations = Policestation::all();
        $mobile = $request->session()->get('session_mobile');
        return view('frontend/application')
        ->with('states',$states)
        ->with('districts',$districts)
        ->with('policestations',$policestations)
        ->with('mobile_no_applied',$mobile);
    }
    public function sendOtp(Request $request){
        $this->validate($request,[
            'mobileno' => 'required',
            'captcha' => 'required|captcha'
        ],
        ['captcha.captcha'=>'Invalid captcha code.']);
        if($request->input('mobileno') != "" ){
        $otp = rand(100000, 999999);
        $OTPUser = new OTPUser;
        $OTPUser->otp = $otp;
        $OTPUser->mobile = $request->input('mobileno');
        $request->session()->put('session_mobile', $OTPUser->mobile);
        $OTPUser->save();
        $mobileNo = $OTPUser->mobile;
        $message = "OTP is sent to Mob No ".$mobileNo." OTP is ".$otp;
        //$smsObj = new SmsSendController();
        //$smsObj->initiateSmsActivation($mobileNo,"Your IBMS Login OTP is ".$OTPUser->otp);
        return redirect('/checkstatus')->with('message',$message)->with('mobile',$mobileNo);
     }
    }

    public function verifyOtp(Request $request){
        $mobile = $request->session()->get('session_mobile');
        Log::info($mobile);
        $response = array();
        $enteredOtp = $request->input('otp');
        $lastOTP= OTPUser::where('mobile',$mobile)->where('is_verified',0)->orderBy('created_at', 'DESC')->first();       

        // $objBeneficiary = Beneficiary::where('mobile_no', $mobile)->where('current_status','DRAFFTED')->orderBy('created_at', 'DESC')->first();
        // $today=date('Y-m-d');

         if($lastOTP->otp == "" || $lastOTP->otp == null|| $enteredOtp == "" || $enteredOtp == null){
            echo $message = 'OTP is not valid. Please try again.';
            return redirect('/checkstatus')->with('message',$message);
        }

         if($lastOTP->otp == $enteredOtp)
        {
            $users = OTPUser::all();
            $lastOTP->update(['is_verified' => 1]);
            //$request->session()->forget('session_mobile');
            /*if($objBeneficiary!=null){
                return redirect('/payment/'.$objBeneficiary->application_id);
                //return view('frontend.echalan-payment-details')->with('application_no',$objAppliaction->application_id);  
            }elseif($objStatus!=null){
                Log::info("In this if block");
                
                //return view('frontend.application-view-download')->with('objStatus',$objStatus);
            }*/
            return view('frontend/dashboard');
            /*else {           
                //return redirect('/application');
                return "new page";
            }*/
        }
        else{
            echo $message = 'OTP is not valid. Please try again with the currect OTP.';
            return redirect('/checkstatus')->with('message',$message);
        }
    }

    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

    public function myCaptcha()
    {
        return view('myCaptcha');
    }

     public function checkstatus()
    {
        return view('frontend/index');
    }

     public function pagelogout(Request $request){
           Auth::logout();
           $request->session()->flush();
           $request->session()->regenerate();
           return redirect('/checkstatus');
    }

    public function applicationSave(Request $request){
        
        // $this->validateInput($request);
         //echo $mobile = $request->session()->get('session_mobile');
         $application_id = DB::select('SELECT get_application_no(1)');
         $application_id=json_decode(json_encode($application_id), true)[0]['get_application_no'];

         $param_in_state = '';
            if($request['param_in_state']==''){
                $param_in_state = 0 ;
            }
            elseif($request['param_in_state']){
                $param_in_state = $request['param_in_state'];
            }

           $present_municipality_id = ''; 
            if($request['present_municipality_id']==''){
                $present_municipality_id = 0;
           }
           elseif($request['present_municipality_id']){
            $present_municipality_id = $request['present_municipality_id'];
           }
           $ben_block = '';
           if($request['ben_block'] == ''){
            $ben_block = 0;
           }
           elseif($request['ben_block']){
            $ben_block = $request['ben_block'];
           }
           /*$parmanent_ben_municipality = '';
           if($request['parmanent_ben_municipality']==''){
            $parmanent_ben_municipality = 0;
           }
           elseif($request['parmanent_ben_municipality']){
            $parmanent_ben_municipality = $request['parmanent_ben_municipality'];
           }*/
           $parmanent_ben_block = '';
           if($request['parmanent_ben_block']==0){
            $parmanent_ben_block = 0;
           } 
           elseif($request['parmanent_ben_block']){
            $parmanent_ben_block = $request['parmanent_ben_block'];
           }
           

             $image_profile = '';
             $edu_qualifi_doc = '';
             $ben_in_suppor_bank_doct = '';
             $ben_suppoting_doc_img = '';
             $ben_in_land_suppo_doc = '';
             $ben_in_supp_doc_of_mas = '';
             $ben_in_supp_doc_pre = '';


         if ($request->hasFile('in_passport_user_img')) {
            $profileImg = $request->file('in_passport_user_img');
            $file_profile = $profileImg->getClientOriginalName();
            $file_type = $profileImg->getClientOriginalExtension();
            $image_profile = "pro_".time().'.'.$profileImg->getClientOriginalExtension();
            $destinationPath = storage_path('app\\keep\\').$application_id;
            $fileStore[] = $profileImg->move($destinationPath, $image_profile);
         }

         if ($request->hasFile('in_educational_documenr_attach')) {
            $patheducational = $request->file('in_educational_documenr_attach');
            $file_educational = $patheducational->getClientOriginalName();
            $file_educational_extention = $patheducational->getClientOriginalExtension();
            $edu_qualifi_doc = "edu_".time().'.'.$patheducational->getClientOriginalExtension();
            $destinationPath = storage_path('app\\keep\\').$application_id;
            $fileStore[] = $patheducational->move($destinationPath, $edu_qualifi_doc);
         }

         if ($request->hasFile('ben_in_supporting_bank_document')) {
            $bank_document = $request->file('ben_in_supporting_bank_document');
            $file_bank_document = $bank_document->getClientOriginalName();
            $file_bank_document_extention = $bank_document->getClientOriginalExtension();
            $ben_in_suppor_bank_doct = "ben_".time().'.'.$bank_document->getClientOriginalExtension();
            $destinationPath = storage_path('app\\keep\\').$application_id;
            $fileStore[] = $bank_document->move($destinationPath, $ben_in_suppor_bank_doct);
         }

         if ($request->hasFile('ben_suppoting_document_img')) {
            $document_img = $request->file('ben_suppoting_document_img');
            $file_document_img = $document_img->getClientOriginalName();
            $file_document_img_extention = $document_img->getClientOriginalExtension();
            $ben_suppoting_doc_img = "bens_".time().'.'.$document_img->getClientOriginalExtension();
            $destinationPath = storage_path('app\\keep\\').$application_id;
            $fileStore[] = $document_img->move($destinationPath, $ben_suppoting_doc_img);
         }

         if ($request->hasFile('ben_in_land_supporting_document')) {
            $land_document = $request->file('ben_in_land_supporting_document');
            $file_land_document = $land_document->getClientOriginalName();
            $file_land_document_extention = $land_document->getClientOriginalExtension();
            $ben_in_land_suppo_doc = "land_".time().'.'.$land_document->getClientOriginalExtension();
            $destinationPath = storage_path('app\\keep\\').$application_id;
            $fileStore[] = $land_document->move($destinationPath, $ben_in_land_suppo_doc);
         }

         if ($request->hasFile('ben_in_supporting_document_of_masque')) {
            $document_of_masque = $request->file('ben_in_supporting_document_of_masque');
            $file_document_of_masque = $document_of_masque->getClientOriginalName();
            $file_document_of_masque_extention = $document_of_masque->getClientOriginalExtension();
            $ben_in_supp_doc_of_mas = "masq_".time().'.'.$document_of_masque->getClientOriginalExtension();
            $destinationPath = storage_path('app\\keep\\').$application_id;
            $fileStore[] = $document_of_masque->move($destinationPath, $ben_in_supp_doc_of_mas);
         }

         if ($request->hasFile('ben_in_supporting_document_president')) {
            $document_president = $request->file('ben_in_supporting_document_president');
            $file_document_president = $document_president->getClientOriginalName();
            $file_document_president_extention = $document_president->getClientOriginalExtension();
            $ben_in_supp_doc_pre = "pres_".time().'.'.$document_president->getClientOriginalExtension();
            $destinationPath = storage_path('app\\keep\\').$application_id;
            $fileStore[] = $document_president->move($destinationPath, $ben_in_supp_doc_pre);
         }

             $picObj = new PicUpload();
             $picObj->ibms_appliction_id= $application_id;
             /*$picObj->document_file_name= $profileImg;
             $destinationPath = storage_path('app\\keep\\').$application_id;
             $fileStore[] = $profileImg->move($destinationPath, $file_profile);*/
       
            if ($request->hasFile('doc_type')) {
                $files = $request->file('doc_type');
                $picture = array();
                $destinationPath = array();
                foreach($files as $file){
                    $filename = $file->getClientOriginalName();
                    $type= $file->getClientOriginalExtension();
                    $fsize=(string)$file->getClientSize();
                    $picture = $filename;
                    $destinationPath = storage_path('app\\keep\\').$application_id;
                    $fileStore[] = $file->move($destinationPath, $picture);
                    $file_name[] = $filename;
                    $extension[] = $type;
                    $size[] = $fsize;
                }
            }
            array_push($file_name,$file_profile,$file_educational,$file_bank_document,$file_document_img,$file_land_document,$file_document_of_masque,$file_document_president);
            array_push($extension,$file_type,$file_educational_extention,$file_bank_document_extention,$file_document_img_extention,$file_land_document_extention,$file_document_of_masque_extention,$file_document_president_extention);

            
            //print_r($file_name);
            //print_r($extension);

            foreach($request->input('doc_name') as $value) {
              $doc_name[] = $value;
            }
            foreach($request->input('doc_number') as $va) {
             $doc_number[] = $va;
            }
            
            $picObj->document_file_name=json_encode($file_name);
            $picObj->document_extension_type=json_encode($extension);
            $picObj->document_size=json_encode($size);
            $picObj->document_extension_name=json_encode($doc_name);
            $picObj->document_number=json_encode($doc_number);

            

         $beneficiary = Beneficiary::create([
         'application_id' => $application_id,
         'application_for' => $request['in_imam_moazzin'],
         'first_name' => $request['in_first_name'],
         'middle_name' => $request['in_middle_name'],
         'last_name' => $request['in_last_name'],
         'application_profile_pic_for' => $image_profile,
         'dob' => $request['in_dob'],
         'nationality' => $request['in_nationality'],
         'father_name' => $request['in_father_name'],
         'aadhar_no' => $request['in_aadhar_no'],
         'voter_card_no' => $request['in_voter_no'],
         'pan_no' => $request['in_pan_no'],
         'email_id' => $request['in_email'],
         'mobile_no' => $request['in_mobile_no'],
         'educational_qualification' => $request['in_educational_qualification'],
         'educational_qualification_document' =>$edu_qualifi_doc,
         'present_premises_name_no'=> $request['in_premises_name_number'],
         'present_street_name_locality_name'=> $request['in_street_localoty_name'],
         'present_district_id'=> $request['ben_district'],
         'present_sub_division_id'=> $request['in_pre_subdivision'],
         'present_municipality_id'=> $present_municipality_id,
         'present_area_id'=> $request['ben_rural_urban'],
         'present_village_premises'=> $request['present_pre_village_premises'],
         'present_block_id'=> $ben_block,
         'present_police_station_id'=> $request['in_police_station_name'],
         'present_gram_panchayet_id'=> $request['in_gram_panchayet'],
         'present_post_office'=> $request['in_pre_post_office'],
         'present_pincode'=> $request['in_pre_present_pincode'],
         'parmanent_premises_name_no'=> $request['parmanent_in_premises_name_number'],
         'parmanent_street_name_locality_name'=> $request['parmanent_in_street_locality_name'],
         'parmanent_state_id'=> $param_in_state,
         'parmanent_district_id'=> $request['parmanent_ben_district'],
         'parmanent_sub_division_id'=> $request['parmanent_in_pre_subdivision'],
         'parmanent_area_id'=> $request['parmanent_area_ben_rural_urban'],
         'parmanent_municipality_id'=> $request['parmanent_ben_municipality'],
         'parmanent_village_premises'=> $request['parmanent_in_pre_village_premises'],
         'parmanent_block_id'=> $parmanent_ben_block,
         'parmanent_police_station_id'=> $request['parmanent_in_police_station_name'],
         'parmanent_gram_panchayet_id'=> $request['parmanent_in_gram_panchayet_name'],
         'parmanent_post_office'=> $request['parmanent_in_pre_post_office'],
         'parmanent_pincode'=> $request['in_pre_parmanent_pincode'],
         'name_of_bank'=> $request['ben_in_bank_name'],
         'name_of_bank_branch'=> $request['ben_in_branch_name'],
         'account_type'=> $request['ben_in_account_type'],
         'account_no'=> $request['ben_in_account_no'],
         'ifsc_no'=> $request['ben_in_ifsc_no'],
         'supporting_bank_document'=> $ben_in_suppor_bank_doct,
         'period_of_experience'=> $request['ben_in_period_of_experience'],
         'engage_by_whom'=> $request['ben_in_engage_by_wgom'],
         'date_of_appiontment'=> $request['ben_in_date_of_appintment'],
         'supporting_document_enclose'=> $ben_suppoting_doc_img,
         'mauza'=> $request['ben_in_mauza'],
         'j_l_no'=> $request['ben_in_jlno'],
         'khation_no'=> $request['ben_in_khatian_no'],
         'plot_no'=> $request['ben_in_plot_no'],
         'area_of_plot'=> $request['ben_in_area'],
         'land_supporting_document'=> $ben_in_land_suppo_doc,
         'name_board_of_auqaf'=> $request['ben_in_board_of_wakfs'],
         'no_board_of_auqaf'=> $request['ben_in_no_board_of_wakf'],
         'date_of_establishment_of_masque'=> $request['ben_in_date_of_establishment_of_masque'],
         'supporting_document_establishment_of_masque'=> $ben_in_supp_doc_of_mas,
         'name_of_masque_president_secy_mutawalli'=> $request['ben_in_name_of_maswue_presidenty'],
         'suporting_document_president_sec_mutawalli'=> $ben_in_supp_doc_pre,
         ]);
        Log::info($beneficiary);
        $picObj->save();
        //return redirect()->route('frontend/view-application')->with('application_id',$application_id)->with('success', 'application save successfully!');
        return view('frontend/view-application')->with('application_id',$application_id)->with('success','Application Save Successfully!');
    }

    public function change_application(Request $request){
        $blocks = Block::all();
        //$municipalities = Municipality::all();
        $districts = District::all();
        $mobile = $request->session()->get('session_mobile');
        return view('frontend/change-application')
        ->with('blocks',$blocks)
        ->with('districts',$districts)
        ->with('mobile_no_applied',$mobile);
    }

    public function ajaxSubDivision($id){
        if(Input::get('ben_district_id')){
            $ben_district_id = Input::get('ben_district_id');
            $subdivision = Subdivision::where('sub_district_id','=', $ben_district_id)->get();
            return $subdivision;
        } 
    }
    public function ajaxBlock($id){
        if(Input::get('ben_sub_division_id')){
            $ben_sub_division_id = Input::get('ben_sub_division_id');
            $block = Block::where('subdivision_id','=', $ben_sub_division_id)->get();
            return $block;
        } 
    }
    public function ajaxMunicipality($id){
        if(Input::get('ben_sub_division_id')){
            $ben_sub_division_id = Input::get('ben_sub_division_id');
            $Municipality = Municipality::where('muni_sub_division_id','=', $ben_sub_division_id)->get();
            return $Municipality;
        } 
    }

    public function grampanchayat($id){
        if(Input::get('ben_gram_panchayat_id')){
            $ben_gram_panchayat_id = Input::get('ben_gram_panchayat_id');
            $grampanchayat = Grampanchayat::where('gram_block_id','=', $ben_gram_panchayat_id)->get();
            return $grampanchayat;
        } 
    }

    public function ajaxdistrict_within($id){
        if(Input::get('param_sub_division_id')){
            $param_sub_division_id = Input::get('param_sub_division_id');
            $param_sub_division = Subdivision::where('sub_district_id','=', $param_sub_division_id)->get();
            return $param_sub_division;
        } 
    }

    public function ajaxstate_within($id){
        if(Input::get('state_id')){
            $state_id = Input::get('state_id');
            $param_district = District::where('state_id','=', $state_id)->get();
            return $param_district;
        } 
    }

    public function withindistrictLoad(){
        $district = District::all();
        return $district;
    }

    public function ajaxparmanentBlock($id){
        if(Input::get('parmanent_in_pre_subdivision')){
            $parmanent_in_pre_subdivision = Input::get('parmanent_in_pre_subdivision');
            $block = Block::where('subdivision_id','=', $parmanent_in_pre_subdivision)->get();
            return $block;
        } 
    }

    public function ajaxparmanentgrampanchayat($id){
        if(Input::get('parmanent_ben_block')){
            $parmanent_ben_block = Input::get('parmanent_ben_block');
            $block = Grampanchayat::where('gram_block_id','=', $parmanent_ben_block)->get();
            return $block;
        } 
    }

    public function ajaxparmmunicality($id){
        if(Input::get('parmanent_in_pre_subdivision')){
            $parmanent_in_pre_subdivision = Input::get('parmanent_in_pre_subdivision');
            $Municipality = Municipality::where('muni_sub_division_id','=', $parmanent_in_pre_subdivision)->get();
            return $Municipality;
        } 
    }

    public function life_certificate_application(Request $request){
        $blocks = Block::all();
        //$municipalities = Municipality::all();
        $districts = District::all();
        $mobile = $request->session()->get('session_mobile');
        return view('frontend/life_certificate_application')
        ->with('blocks',$blocks)
        ->with('districts',$districts)
        ->with('mobile_no_applied',$mobile);
    }

    public function editApplication($id){
        $application = Beneficiary::where('application_id','=',$id)->first();
        $application_images = PicUpload::where('ibms_appliction_id','=',$id)->first();
        $states = State::where('id','=',$application->parmanent_state_id)->first();
        $district_parmanent = District::where('id','=',$application->parmanent_district_id)->first();

        $subdivision = Subdivision::where('id','=',$application->parmanent_sub_division_id)->first();
        $municipality = Municipality::where('id','=',$application->parmanent_municipality_id)->first();
        $grampanchayat = Grampanchayat::where('id','=',$application->parmanent_gram_panchayet_id)->first();
        $block = Block::where('id','=',$application->parmanent_block_id)->first();
        $policestation = Policestation::where('id','=',$application->parmanent_police_station_id)->first();
        $district_present = District::where('id','=',$application->present_district_id)->first();
        $subdivision_present = Subdivision::where('id','=',$application->present_sub_division_id)->first();
        $municipality_present = Municipality::where('id','=',$application->present_municipality_id)->first();
        $block_present = Block::where('id','=',$application->present_block_id)->first();
        $policestation_present = Policestation::where('id','=',$application->present_police_station_id)->first();
        $grampanchayat_present = Grampanchayat::where('id','=',$application->present_gram_panchayet_id)->first();



        /*echo "<pre>";
        print_r($application);
        echo "</pre>";*/

        /*return view('frontend.edit-application')
        ->with('application',$application)
        ->with('application_images',$application_images)
        ->with('states',$states)
        ->with('district_parmanent',$district_parmanent)
        ->with('subdivision',$subdivision)
        ->with('municipality',$municipality)
        ->with('grampanchayat',$grampanchayat)
        ->with('block',$block)
        ->with('policestation',$policestation)
        ->with('district_present',$district_present)
        ->with('subdivision_present',$subdivision_present)
        ->with('municipality_present',$municipality_present)
        ->with('block_present',$block_present)
        ->with('policestation_present',$policestation_present)
        ->with('grampanchayat_present',$grampanchayat_present);*/
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
        // document info
        $pdf->SetCreator('...');
        $pdf->SetAuthor('...');
        $pdf->SetTitle('...');
        $pdf->SetSubject('...');

        // verwijder header/footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        //margins / auto page break
        $pdf->SetMargins(10, 20, 10);
        $pdf->SetAutoPageBreak(TRUE, 20);

        //taal strings...
        //$pdf->setLanguageArray($l);

        $pdf->SetFont('helvetica', '', 10);

        // add a page
        $pdf->AddPage();

        ##########################################################################################

        $html  = '';

         $html.='<section id="contact" class="wow">
    <div class="container box_inter">
        <div class="col-sm-10" style="padding:10px;">
            Sir,<br>
             I do hereby submit the full particulars in respect of myself as';
             if($application->application_for=='imam'){
                $html.='IMAM';
            } 
             if($application->application_for=='moazzin'){ 
                $html.='MUAZZINS'; 
             }
              $html.='(Whichover is applicable, may give tick mark) of the Masjid situated at Village/Premises No '.
              $application->present_premises_name_no.
             ' P.O-'.
               $application->parmanent_post_office.
                ' G.P/Word No- '.
                $application->present_street_name_locality_name.
                ' Block/Municipality- ';
                //if($municipality_present->id == '') { $block_present->block_name }.',';
                    //if($block_present->id == 0) { $municipality_present->municipality_name }.  
                   ' P.S-'.$policestation_present->name.
                    ' Dist. '.
                    $district_present->district_name.','.
                    ' Pin.'.$application->present_pincode.

             
        $html.='</div>
        <div class="col-sm-2" style="padding:10px;">Photo</div>
        <div class="col-sm-12">
            <div class="row">
                <div class="form-control">
                  <div class="col-md-6 ">Name of Imam / Moazzin(in Capital Letter)</div>
                  <div class="col-md-6">'.$application->first_name.' '.$application->middle_name.' '.$application->last_name.
                  '</div>
                </div>
                <div class="form-control">
                  <div class="col-md-3">Father Name</div>
                  <div class="col-md-3">'.
                  $application->father_name.
                  '</div>
                  <div class="col-md-3">Date Of Birth</div>
                  <div class="col-md-3">'.
                  $application->dob.
                  '</div>
                </div>

                <div class="form-control">
                  <div class="col-md-3">Nationality</div>
                  <div class="col-md-3">'.
                  $application->nationality.
                  '</div>
                  <div class="col-md-6"></div>
                </div>
                  <br>
                  <h3>Parmanent Address</h3>

                <div class="form-control">
                  <div class="col-md-12">'.
                  $application->parmanent_premises_name_no.','.$application->parmanent_village_premises.','.$application->parmanent_street_name_locality_name.',';
                     //if( $municipality->id == 0 ) {  $block->block_name }
                     //if( $block->id == 0 ) { $municipality->municipality_name } .','.
                    $subdivision->sub_division_name.','.$district_parmanent->district_name.','.
                    $application->parmanent_post_office.','.$application->parmanent_pincode.','.
                    $states->name.
                  '</div>
                </div>
                <div class="form-control">
                    <div class="col-md-3">Police Station</div>
                    <div class="col-md-3">'.
                    $policestation->name.
                    '</div>
                </div>

                <h3>Present Address</h3>
                <div class="col-md-12">';

                    $application->present_premises_name_no.','.$application->present_street_name_locality_name.','.$district_present->district_name.','.
                    $subdivision_present->sub_division_name.',';
                    //if( $municipality_present->id == '') $block_present->block_name .',';
                    //if( $block_present->id == 0) $municipality_present->municipality_name .',';
                    $district_present->district_name.','.$subdivision_present->sub_division_name.','.$grampanchayat_present->gram_panchayet_name.
                '</div>
                <br>
                <div class="form-control">
                    <div class="col-md-3">Aadhar No</div>
                    <div class="col-md-3">'.$application->aadhar_no.
                    '</div>
                    <div class="col-md-3">Pan No</div>
                    <div class="col-md-3">'.
                    $application->pan_no.
                    '</div>
                </div>
                <div class="form-control">
                    <div class="col-md-3">Email id</div>
                    <div class="col-md-3">'.
                    $application->email_id.
                    '</div>
                    <div class="col-md-3">Contact No</div>
                    <div class="col-md-3">'.
                    $application->mobile_no.
                    '</div>
                </div>
                <div class="form-control">
                    <div class="col-md-3">Engage By Whom</div>
                    <div class="col-md-3">'.
                    $application->engage_by_whom.
                    '</div>
                    <div class="col-md-3">Date of Appointment</div>
                    <div class="col-md-3">'.
                    $application->date_of_appiontment.
                    '</div>
                </div>

                <div class="form-control">
                    <div class="col-md-3">Period Of Experience</div>
                    <div class="col-md-3">'.
                    $application->engage_by_whom.
                    '</div>
                    <div class="col-md-3">Period of Experience</div>
                    <div class="col-md-3">'.
                    $application->period_of_experience.
                    '</div>
                </div>
                <div class="form-control">
                    <div class="col-md-3">Education Qualification</div>
                    <div class="col-md-3">'.
                    $application->educational_qualification.
                    '</div>
                    <div class="col-md-3">Name Of Bank</div>
                    <div class="col-md-3">'.
                    $application->name_of_bank.
                    '</div>
                </div>
                <div class="form-control">
                    <div class="col-md-3">Name Of Bank Branch</div>
                    <div class="col-md-3">'.
                    $application->name_of_bank_branch.
                   '</div>
                    <div class="col-md-3">Account Type</div>
                    <div class="col-md-3">'.
                    $application->account_type.
                    '</div>
                </div>
                <div class="form-control">
                    <div class="col-md-3">Account No</div>
                    <div class="col-md-3">'.
                    $application->account_no.
                    '</div>
                    <div class="col-md-3">IFSC No</div>
                    <div class="col-md-3">'.$application->ifsc_no.
                    '</div>
                </div>
                <h3>Land Particular</h3>
                <br>
                <div class="form-control">
                    <div class="col-md-3">Mauza</div>
                    <div class="col-md-3">'.$application->mauza.
                    '</div>
                    <div class="col-md-3">JL No</div>
                    <div class="col-md-3">'.$application->j_l_no.
                   '</div>
                </div>
                <div class="form-control">
                    <div class="col-md-3">Khation No</div>
                    <div class="col-md-3">'.$application->plot_no.
                    '</div>
                    <div class="col-md-3">Area Of Plot</div>
                    <div class="col-md-3">'.$application->area_of_plot.
                    '</div>
                </div>
                <div class="form-control">
                    <div class="col-md-3">if enrolled with Board of Wakfs,W.B</div>
                    <div class="col-md-3">'.$application->name_board_of_auqaf. '('.$application->no_board_of_auqaf.')'.
                    '</div>
                    <div class="col-md-3">Date Of Establishment Of Masque</div>
                    <div class="col-md-3">'.$application->date_of_establishment_of_masque.
                    '</div>
                </div>
                <div class="form-control">
                    <div class="col-md-6">Name Of Masque President Secy Mmutawalli</div>
                    <div class="col-md-3">'.$application->name_of_masque_president_secy_mutawalli.
                    '</div>
                </div>
            </div>
        </div>
    </div>  
</section>';

        ##########################################################################################

        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->lastPage();

        $pdf->Output('spo_groepen_'.date('YmdHis').'.pdf', 'I');
        
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function validateeditInput($request) {
            $this->validate($request, [
             'in_imam_moazzin' => 'required|alpha|max:60',
             'in_first_name' => 'required|alpha|max:60',
             'in_middle_name' => 'required|alpha|max:60',
             'in_last_name' => 'required|alpha|max:60',
             'in_passport_user_img' => 'image|mimes:jpeg,png,jpg,gif|max:100',
             'in_dob' => 'required|alpha|max:60',
             'in_nationality' => 'required|alpha|max:60',
             'in_father_name' => 'required|alpha|max:60',
             'in_aadhar_no' => 'required|alpha|max:60',
             'in_voter_no' => 'required|alpha|max:60',
             'in_pan_no' => 'required|alpha|max:60',
             'in_email' => 'required|alpha|max:60',
             //'in_mobile_no' => 'required|alpha|max:60',
             'in_educational_qualification' => 'required|alpha|max:60',
             'in_educational_documenr_attach' => 'image|mimes:jpeg,png,jpg,gif,pdf|max:1000',
             'in_premises_name_number'=> 'required|alpha|max:60',
             'in_street_localoty_name'=> 'required|alpha|max:60',
             'ben_district'=> 'required|alpha|max:60',
             'in_pre_subdivision'=> 'required|alpha|max:60',
             'present_municipality_id'=> 'required|alpha|max:60',
             //'in_gram_panchayet'=> 'required|alpha|max:60',
             'present_pre_village_premises'=> 'required|alpha|max:60',
             'in_police_station_name'=> 'required|alpha|max:60',
             'in_pre_post_office'=> 'required|alpha|max:60',
             'in_pre_present_pincode'=> 'required|alpha|max:60',
             'parmanent_in_premises_name_number'=> 'required|alpha|max:60',
             'parmanent_in_street_locality_name'=> 'required|alpha|max:60',
             //'param_in_state'=> 'required|alpha|max:60',
             //'parmanent_ben_district'=> 'required|alpha|max:60',
             
             'parmanent_in_pre_subdivision'=> 'required|alpha|max:60',
             'parmanent_area_ben_rural_urban'=> 'required|alpha|max:60',
             //'parmanent_ben_municipality'=> 'required|alpha|max:60',
             'parmanent_ben_block'=> 'required|alpha|max:60',
             //'parmanent_in_gram_panchayet_name'=> 'required|alpha|max:60',
             'parmanent_in_pre_village_premises'=> 'required|alpha|max:60',
             'parmanent_in_police_station_name'=> 'required|alpha|max:60',
             'parmanent_in_pre_post_office'=> 'required|alpha|max:60',
             'in_pre_parmanent_pincode'=> 'required|alpha|max:60',
             'ben_in_bank_name'=> 'required|alpha|max:60',
             'ben_in_branch_name'=> 'required|alpha|max:60',
             'ben_in_account_type'=> 'required|alpha|max:60',
             'ben_in_account_no'=> 'required|alpha|max:160',
             'ben_in_ifsc_no'=> 'required|alpha|max:60',
             'ben_in_supporting_bank_document'=> 'image|mimes:jpeg,png,jpg|max:500',
             'ben_in_period_of_experience'=> 'required|alpha|max:60',
             'ben_in_engage_by_wgom'=> 'required|alpha|max:60',
             'ben_in_date_of_appintment'=> 'required|alpha|max:60',
             'ben_suppoting_document_img'=> 'image|mimes:jpeg,png,jpg,pdf|max:1000',
             'ben_in_mauza'=> 'required|alpha|max:60',
             'ben_in_jlno'=> 'required|alpha|max:60',
             'ben_in_khatian_no'=> 'required|alpha|max:60',
             'ben_in_plot_no'=> 'required|alpha|max:60',
             'ben_in_area'=> 'required|alpha|max:60',
             'ben_in_land_supporting_document'=> 'required|alpha|max:60',
             'ben_in_board_of_wakfs'=> 'required|alpha|max:60',
             'ben_in_no_board_of_wakf'=> 'required|alpha|max:60',
             'ben_in_date_of_establishment_of_masque'=> 'required|alpha|max:60',
             'ben_in_supporting_document_of_masque'=> 'required|alpha|max:60',
             'ben_in_name_of_maswue_presidenty'=> 'required|alpha|max:60',
             'ben_in_supporting_document_president'=>'required|alpha|max:60'
            ]);
    }
}
