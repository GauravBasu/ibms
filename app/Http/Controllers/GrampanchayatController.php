<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\District;
use App\Block;
use App\Subdivision;
use App\Grampanchayat;
use Illuminate\Support\Facades\Input;

class GrampanchayatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           //$beneficiarys = Beneficiary::all();
        $grampanchayets = DB::table('m_gram_panchayet')
        ->leftJoin('m_block','m_gram_panchayet.gram_block_id','=','m_block.id')
        ->leftJoin('m_sub_division','m_gram_panchayet.gram_sub_division_id','=','m_sub_division.id')
        ->leftJoin('m_district', 'm_gram_panchayet.gram_dist_id', '=', 'm_district.id')
        ->select('m_gram_panchayet.id','m_gram_panchayet.gram_panchayet_name','m_sub_division.sub_division_name','m_block.block_name as block_name','m_district.district_name as district_name')
        ->paginate(20);
       /* echo "<pre>";
        print_r($grampanchayets);
        echo "</pre>";*/
        
        return view('system-mgmt/gram-panchayat/index', ['grampanchayets' => $grampanchayets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::all();
        $district_id = Input::get('sub_district_id');

        $blocks = Block::where('district_id','=',$district_id)->get();
        return view('system-mgmt/gram-panchayat/create', ['districts'=>$districts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Subdivision::findOrFail($request['subdivision_id']);
        $this->validateInput($request);
         $grampanchayat = Grampanchayat::create([
            'gram_dist_id' =>$request['gram_district_id'],
            'gram_sub_division_id' => $request['gram_sub_division_id'],
            'gram_block_id' => $request['gram_block_id'],
            'gram_panchayet_name' => $request['gram_panchayat_name']
        ]);
        return redirect()->intended('system-management/gram-panchayat');

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
        $sub_division = Subdivision::where('sub_district_id','=',$district_id)->get();
        return  $sub_division; 
        }

        if(Input::get('sub_division_id')){
        $sub_division_id = Input::get('sub_division_id');
        $block_name = Block::where('subdivision_id','=',$sub_division_id)->get();
        return  $block_name; 
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
        $grampanchayat = Grampanchayat::find($id);
        // Redirect to city list if updating city wasn't existed
        if ($grampanchayat == null ) {
            return redirect()->intended('system-management/gram-panchayat');
        }

        $districts = District::all();
        $subdivisions = Subdivision::all();
        $blocks = Block::all();

        return view('system-mgmt/gram-panchayat/edit', ['grampanchayat'=>$grampanchayat,'blocks' => $blocks,'subdivisions'=>$subdivisions, 'districts' => $districts]);
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
        $grampanchayat = Grampanchayat::findOrFail($id);
         $this->validate($request, [
        'district_id' => 'required|max:60',
        'subdivision_id'=> 'required|max:60',
        'block_id'=>'required|max:60',
        'gram_panchayet_name' => 'required|max:60'
        ]);
        $input = [
            'gram_dist_id' => $request['district_id'],
            'gram_sub_division_id' => $request['subdivision_id'],
            'gram_block_id' => $request['block_id'],
            'gram_panchayet_name'=>$request['gram_panchayet_name'],
        ];

        /*echo "<pre>";
        print_r($input);
        echo "</pre>";
        die();*/
        Grampanchayat::where('id', $id)
            ->update($input);
        
        return redirect()->intended('system-management/gram-panchayat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Grampanchayat::where('id', $id)->delete();
         return redirect()->intended('system-management/gram-panchayat');
    }
    private function validateInput($request){
        $this->validate($request, [
        'gram_district_id' => 'required|max:60',
        'gram_sub_division_id' => 'required|max:60',
        'gram_block_id' => 'required|max:60',
        'gram_panchayat_name'=>'required|max:60'
        ]);
    }
}
