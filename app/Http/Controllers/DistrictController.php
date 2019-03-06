<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\District;
use App\State;

class DistrictController extends Controller
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
       
        $districts = DB::table('m_district')
        ->leftJoin('state', 'm_district.state_id', '=', 'state.id')
        ->select('m_district.id', 'm_district.district_name', 'state.name as state_name', 'state.id as state_id')
        ->paginate(10);
        return view('system-mgmt/district/index', ['districts' => $districts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $states = State::all();
        return view('system-mgmt/district/create', ['states' => $states]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        State::findOrFail($request['state_id']);
        $this->validateInput($request);
         $district = District::create([
            'district_name' => $request['name'],
            'state_id' => $request['state_id']
        ]);
        return redirect()->intended('system-management/district');
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
         $district = District::find($id);
        // Redirect to city list if updating city wasn't existed
        if ($district == null ) {
            return redirect()->intended('/system-management/district');
        }

        $states = State::all();
        return view('system-mgmt/district/edit', ['district' => $district, 'states' => $states]);
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
         $District = District::findOrFail($id);
         $this->validate($request, [
        'district_name' => 'required|max:60'
        ]);
        $input = [
            'district_name' => $request['district_name'],
            'state_id' => $request['state_id']
        ];
        District::where('id', $id)
            ->update($input);
        
        return redirect()->intended('system-management/district');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        District::where('id', $id)->delete();
         return redirect()->intended('system-management/district');
    }

    public function search(Request $request) {
        $constraints = [
            'district_name' => $request['district_name'],
            ];

       $districts = $this->doSearchingQuery($constraints);
       return view('system-mgmt/district/index', ['districts' => $districts, 'searchingVals' => $constraints]);
    }
    
    private function doSearchingQuery($constraints) {
        $query = District::query();
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where( $fields[$index], 'like', '%'.$constraint.'%');
            }

            $index++;
        }
        return $query->paginate(10);
    }

    private function validateInput($request) {
        $this->validate($request, [
        'district_name' => 'required|max:60'
    ]);
    }
}
