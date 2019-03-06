<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\District;
use App\State;
use App\Block;
use App\Subdivision;
use Illuminate\Support\Facades\Input;

class BlockController extends Controller
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

        //SELECT m_block.block_name,m_district.district_name,state.name from m_block,m_district,state where
        // m_block.district_id = m_district.id and m_district.state_id = state.id

        $blocks = DB::table('m_block')
        ->leftJoin('m_sub_division','m_block.subdivision_id','=','m_sub_division.id')
        ->leftJoin('m_district', 'm_sub_division.sub_district_id', '=', 'm_district.id')
        ->leftJoin('state', 'm_district.state_id', '=', 'state.id')
        ->select('m_block.id', 'm_block.block_name','m_sub_division.sub_division_name as sub_division_name', 'm_district.district_name as district_name', 'state.name as state_name')        
        ->paginate(20);
        

        
        return view('system-mgmt/block/index', ['blocks' => $blocks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $districts = District::all();
        $states = State::all();
        return view('system-mgmt/block/create', ['states' => $states,'districts'=>$districts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        Subdivision::findOrFail($request['subdivision_id']);
        $this->validateInput($request);
       
         $block = Block::create([
            'district_id' =>$request['district_id'],
            'subdivision_id' => $request['subdivision_id'],
            'block_name' => $request['block_name'],
        ]);
        return redirect()->intended('system-management/block');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $block = Block::find($id);
        // Redirect to city list if updating city wasn't existed
        if ($block == null ) {
            return redirect()->intended('/system-management/block');
        }


        $subdivisions = Subdivision::all();
        $districts = District::all();

        return view('system-mgmt/block/edit', ['block' => $block,'subdivisions'=>$subdivisions, 'districts' => $districts]);
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
        $Block = Block::findOrFail($id);
         $this->validate($request, [
        'block_name' => 'required|max:60'
        ]);
        $input = [
            
            'district_id' => $request['district_id'],
            'subdivision_id' => $request['subdivision_id'],
            'block_name' => $request['block_name']
        ];
        Block::where('id', $id)
            ->update($input);
        
        return redirect()->intended('system-management/block');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Block::where('id', $id)->delete();
         return redirect()->intended('system-management/block');
    }


    public function search(Request $request) {
        $constraints = [
            'block_name' => $request['block_name']
            ];

       $blocks = $this->doSearchingQuery($constraints);



       return view('system-mgmt/block/index', ['blocks' => $blocks, 'searchingVals' => $constraints]);
    }
    
    private function doSearchingQuery($constraints) {
        $query = Block::query();
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

    private function validateInput($request){
        $this->validate($request, [
        'block_name' => 'required|max:60',
        'district_id' => 'required|max:60'
        ]);
    }

   
}
