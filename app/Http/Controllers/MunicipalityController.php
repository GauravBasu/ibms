<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Municipality;
use App\District;
use App\State;
use App\Subdivision;
use Illuminate\Support\Facades\Input;

class MunicipalityController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $municipalities = DB::table('m_municipality')
        ->leftJoin('m_sub_division', 'm_municipality.muni_sub_division_id', '=', 'm_sub_division.id')
        ->leftJoin('m_district', 'm_municipality.muni_district_id', '=', 'm_district.id')
        ->leftJoin('state', 'm_district.state_id', '=', 'state.id')
        ->select('m_municipality.id', 'm_municipality.municipality_name','m_sub_division.sub_division_name', 'm_district.district_name as district_name', 'state.name as state_name')
        ->paginate(20);

        /*echo"<pre>";
        print_r($municipalities);
        echo"</pre>";*/
        return view('system-mgmt/municipality/index', ['municipalities' => $municipalities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subdivisions = Subdivision::all();
        $districts = District::all();
        $states = State::all();


        return view('system-mgmt/municipality/create', ['subdivisions'=> $subdivisions,'states' => $states,'districts'=>$districts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         District::findOrFail($request['muni_district_id']);
        $this->validateInput($request);
       
         $municipality = Municipality::create([
            'muni_district_id' => $request['muni_district_id'],
            'muni_sub_division_id' => $request['muni_sub_division_id'],
            'municipality_name' => $request['municipality_name'],
        ]);
        return redirect()->intended('system-management/municipality');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Input::get('muni_sub_division_id')){
        $muni_district_id = Input::get('muni_sub_division_id');
        $sub_division = Subdivision::where('sub_district_id','=',$muni_district_id)->get();
        return  $sub_division; 
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
        $municipality = Municipality::find($id);
        // Redirect to city list if updating city wasn't existed
        if ($municipality == null ) {
            return redirect()->intended('/system-management/municipality');
        }
        $subdivisions = Subdivision::all();
        $districts = District::all();
        return view('system-mgmt/municipality/edit', ['municipality' => $municipality,'subdivisions'=> $subdivisions, 'districts' => $districts]);
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
        $Block = Municipality::findOrFail($id);
         $this->validate($request, [
        'municipality_name' => 'required|max:60'
        ]);
        $input = [
            'muni_sub_division_id'=>$request['muni_sub_division_id'],
            'muni_district_id' => $request['muni_district_id'],
            'municipality_name' => $request['municipality_name']
        ];
        Municipality::where('id', $id)
            ->update($input);
        
        return redirect()->intended('system-management/municipality');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Municipality::where('id', $id)->delete();
         return redirect()->intended('system-management/municipality');
    }

     public function search(Request $request) {
        $constraints = [
            'municipality_name' => $request['municipality_name']
            ];

       $municipalities = $this->doSearchingQuery($constraints);

       return view('system-mgmt/municipality/index', ['municipalities' => $municipalities, 'searchingVals' => $constraints]);
    }
    
    private function doSearchingQuery($constraints) {
        $query = Municipality::query();
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where( $fields[$index], 'like', '%'.$constraint.'%');
            }
            $index++;
        }
        return $query->paginate(20);
    }

    private function validateInput($request) {
        $this->validate($request, [
        'municipality_name' => 'required|max:60',
        'muni_district_id' => 'required|max:60'
    ]);
    }
}
