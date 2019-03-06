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


class BeneficiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$beneficiarys = Beneficiary::all();
        $beneficiarys = DB::table('m_banificiary')
        ->leftJoin('m_district', 'm_banificiary.add_district', '=', 'm_district.id')
        ->leftJoin('m_block', 'm_banificiary.add_block', '=', 'm_block.id')
        ->leftJoin('m_municipality', 'm_banificiary.add_municipality', '=', 'm_municipality.id')
        ->leftJoin('state', 'm_district.state_id', '=', 'state.id')
        ->select('m_banificiary.id','m_banificiary.ben_code', 'm_banificiary.ben_name','m_banificiary.address','m_block.block_name as block_name','m_municipality.municipality_name as Municilapity_name','m_district.district_name as district_name')
        ->paginate(20);
        /*echo "<pre>";
        print_r($beneficiarys);
        echo "</pre>";*/
        return view('beneficary-mgmt/index',['beneficiarys' =>$beneficiarys]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $blocks = Block::all();
        //$municipalities = Municipality::all();
        $districts = District::all();

        return view('beneficary-mgmt/create', ['districts'=>$districts,'blocks' => $blocks]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $application_id = DB::select('SELECT get_application_no(1)');
        $application_id=json_decode(json_encode($application_id), true)[0]['get_application_no'];
        //Log::info($application_id[0]->get_application_no);
        if (Input::hasFile('profile_image')){
            $image = Input::file('profile_image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = storage_path('app\\keep\\').$application_id;
            $image->move($destinationPath, $name);
        }
       $ben_rural_urban = $request['ben_rural_urban'];

        if($request['ben_rural_urban']==1){
            $beneficiary = Beneficiary::create([
            'ben_code' => $application_id,   
            'ben_name' => $request['beneficary_name'],
            'mobile_no' => $request['mobile_no'],
            'aadher_no' => $request['aadher_no'],
            'bank_ac_number' => $request['bank_ac_number'],
            'ifsc_code' => $request['ifsc_code'],
            'ac_type' => $request['acc_type'],
            'pan_number' => $request['pan_number'],
            'address' => $request['address'],
            'add_district' => $request['ben_district'],
            'add_block' => $request['ben_block'],
            'add_municipality' => 0,
            'profile_image'=>$name
            ]);

         }else if($request['ben_rural_urban']==2){

            $beneficiary = Beneficiary::create([
            'ben_code' => $application_id,  
            'ben_name' => $request['beneficary_name'],
            'mobile_no' => $request['mobile_no'],
            'aadher_no' => $request['aadher_no'],
            'bank_ac_number' => $request['bank_ac_number'],
            'ifsc_code' => $request['ifsc_code'],
            'ac_type' => $request['acc_type'],
            'pan_number' => $request['pan_number'],
            'address' => $request['address'],
            'add_district' => $request['ben_district'],
            'add_block' => 0,
            'add_municipality' => $request['ben_municipality'],
            'profile_image' => $name
            ]);
         }
         
        return redirect()->intended('/beneficiary-management');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Input::get('district_id')){
        $district_id = Input::get('district_id');
        $blocks = Block::where('district_id','=',$district_id)->get();
        return  $blocks; 
        }
        

        if(Input::get('muni_district_id')){
            $district_id = Input::get('muni_district_id');
            $municipalities = Municipality::where('muni_district_id','=',$district_id)->get();
            return  $municipalities; 
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $beneficiary = Beneficiary::find($id);
        if ($beneficiary == null ) {
            return redirect()->intended('/beneficiary-management');
        }
        $blocks = Block::all();
        $municipalities = Municipality::all();
        $districts = District::all();
        return view('beneficary-mgmt/edit', ['beneficiary' => $beneficiary,'blocks'=>$blocks,'municipalities'=>$municipalities, 'districts' => $districts]);
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
        $beneficiary = Beneficiary::findOrFail($id);
        $input = "";
        if($request['add_block'] > 0){
            $input = [
            'ben_name' => $request['beneficary_name'],
            'mobile_no' => $request['mobile_no'],
            'aadher_no' => $request['aadher_no'],
            'bank_ac_number' => $request['bank_ac_number'],
            'ifsc_code' => $request['ifsc_code'],
            'ac_type' => $request['acc_type'],
            'pan_number' => $request['pan_number'],
            'address' => $request['address'],
            'add_district' => $request['add_district'],
            'add_block' => $request['add_block']
            ];


             Beneficiary::where('id', $id)
            ->update($input);
        }

        if($request['add_municipality'] > 0){

            $input = [
            'ben_name' => $request['beneficary_name'],
            'mobile_no' => $request['mobile_no'],
            'aadher_no' => $request['aadher_no'],
            'bank_ac_number' => $request['bank_ac_number'],
            'ifsc_code' => $request['ifsc_code'],
            'ac_type' => $request['acc_type'],
            'pan_number' => $request['pan_number'],
            'address' => $request['address'],
            'add_district' => $request['add_district'],
            'add_municipality' => $request['add_municipality']
            ];
            Beneficiary::where('id', $id)
            ->update($input);
        }
         return redirect()->intended('/beneficiary-management');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Beneficiary::where('id', $id)->delete();
        return redirect()->intended('/beneficiary-management');
    }

    private function validateInput($request) {
        $this->validate($request, [
        'ben_name' => 'required|max:100',
        'mobile_no' => 'numeric|digits:11',
        'aadher_no' => 'numeric|digits:12',
        'bank_ac_number' => 'numeric|required',
        'ifsc_code' => 'required',
        'ac_type' => 'required',
        'pan_number' => 'required',
        'address' => 'required|max:500',
        'add_district' => 'required',
        'add_block'=> 'required',
        'add_municipality'=> 'required',
        'profile_image' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
    ]);
    }
}
