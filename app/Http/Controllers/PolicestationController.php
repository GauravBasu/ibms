<?php

namespace App\Http\Controllers;

use App\Policestation;
use Illuminate\Http\Request;



class PolicestationController extends Controller
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
        //
        
        $policestations = Policestation::paginate(10);
        return view('system-mgmt/policestation/index', ['policestations' => $policestations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('system-mgmt/policestation/create');
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
         $policestation = Policestation::create([
            'name' => $request['name']
        ]);
         echo "<pre>";
         print_r($policestation);
         echo "</pre>";

        return redirect()->intended('system-management/policestation');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Policestation  $policestation
     * @return \Illuminate\Http\Response
     */
    public function show(Policestation $policestation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Policestation  $policestation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $policestation = Policestation::find($id);
        // Redirect to department list if updating department wasn't existed
        if ($policestation == null ) {
            return redirect()->intended('/system-management/policestation');
        }

        return view('system-mgmt/policestation/edit', ['policestation' => $policestation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Policestation  $policestation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validateInput($request);
        $policestation = Policestation::findOrFail($id);
        
        $input = [
            'name' => $request['name']
        ];
        Policestation::where('id', $id)
            ->update($input);
        
        return redirect()->intended('system-management/policestation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Policestation  $policestation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        Policestation::where('id', $id)->delete();
         return redirect()->intended('system-management/policestation');
    }


    public function search(Request $request) {
        
        $constraints = [
            'name' => $request['name']
            ];

       $policestations = $this->doSearchingQuery($constraints);
       return view('system-mgmt/policestation/index', ['policestations' => $policestations, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = policestation::query();
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where( $fields[$index], 'like', '%'.$constraint.'%');
            }

            $index++;
        }
        return $query->paginate(5);
    }
    private function validateInput($request) {
        $this->validate($request, [
        'name' => 'required|max:60|unique:m_police_station'
    ]);
    }
}
