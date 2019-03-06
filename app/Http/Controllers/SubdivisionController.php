<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Country;
use App\Subdivision;
use App\District;
use Illuminate\Support\Facades\Log;

class SubdivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subdivisions = DB::table('m_sub_division')
        ->leftJoin('m_district', 'm_sub_division.sub_district_id', '=', 'm_district.id')
        ->select('m_sub_division.id', 'm_sub_division.sub_division_name', 'm_district.district_name as district_name')
        ->paginate(10);
        
        return view('system-mgmt/sub-division/index', ['subdivisions' => $subdivisions]);
        //return "I am here";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::all();
        return view('system-mgmt/sub-division/create', ['districts' => $districts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
         $this->validateInput($request);
         $subdivisions = Subdivision::create([
            'sub_division_name' => $request['subdivision'],
            'sub_district_id' => $request['district_id']
         ]);
         //Log::info($subdivisions);
        return redirect()->intended('system-management/sub-division');
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
        $subdivision = Subdivision::find($id);
        // Redirect to city list if updating city wasn't existed
        if ($subdivision == null ) {
            return redirect()->intended('/system-management/sub-division');
        }

        $districts = District::all();
        return view('system-mgmt/sub-division/edit', ['subdivision' => $subdivision,'districts' => $districts]);
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
        $subdivision = Subdivision::findOrFail($id);
        $this->validate($request, [
        'sub_division_name' => 'required|max:60',
        'district_id' =>'required|max:60'
        ]);
        $input = [
            'sub_division_name' => $request['sub_division_name'],
            'sub_district_id' => $request['district_id']
        ];
        Subdivision::where('id', $id)
            ->update($input);
        
        return redirect()->intended('system-management/sub-division');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Subdivision::where('id', $id)->delete();
         return redirect()->intended('system-management/sub-division');
    }

    private function validateInput($request) {
        $this->validate($request, [
        'subdivision' => 'required|max:60',
        'district_id' => 'required|max:60'

    ]);
    }
}
