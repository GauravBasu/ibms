<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\District;
use App\Municipality;
use App\State;
use App\Block;
use App\User;
use App\Masque;
use App\Subdivision;
use Illuminate\Support\Facades\Input;


class MasqueController extends Controller
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
         $masques = DB::table('m_masque')
        ->leftJoin('m_district', 'm_masque.masque_district', '=', 'm_district.id')
        ->leftJoin('m_sub_division', 'm_masque.mosque_sub_division_id', '=','m_sub_division.id')
        ->leftJoin('m_block', 'm_masque.masque_block', '=', 'm_block.id')
        ->leftJoin('m_municipality', 'm_masque.masque_municipality', '=', 'm_municipality.id')
        ->leftJoin('state', 'm_district.state_id', '=', 'state.id')
        ->select('m_masque.id', 'm_masque.masque_name','m_masque.masque_address','m_block.block_name','m_municipality.municipality_name as Municilapity_name','m_sub_division.sub_division_name','m_district.district_name as district_name', 'state.name as state_name')
        ->paginate(20);
        /*echo "<pre>";
        print_r($masques);
        echo "</pre>";
        die();*/
        return view('masque-mgmt/index',['masques' => $masques]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$blocks = Block::all();
        //$municipalities = Municipality::all();
        $districts = District::all();
        $states = State::all();
        $subdivisions = Subdivision::all();
        $district_id = Input::get('district_id');
        $blocks = Block::where('district_id','=',$district_id)->get();

    return view('masque-mgmt/create', ['subdivisions'=>$subdivisions,'districts'=>$districts,'states' => $states]);

    //return view('masque-mgmt/create', ['blocks'=>$blocks,'municipalities'=>$municipalities,'districts'=>$districts,'states' => $states]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //District::findOrFail($request['masque_district']);
        //$this->validateInput($request);
         if($request['masque_rural_urban']==1){
            $mosques = Masque::create([
            'masque_name' => $request['masque_name'],
            'masque_address' => $request['masque_address'],
            'masque_block' => $request['masque_block'],
            'mosque_sub_division_id'=>$request['masque_sub_division'],
            'masque_district' => $request['masque_district_id'],
            //'masque_municipality' => $request['masque_municipality'],
            'masque_rural_urban' => $request['masque_rural_urban']
            ]);

         }else if($request['masque_rural_urban']==2){

            $mosques = Masque::create([
            'masque_name' => $request['masque_name'],
            'masque_address' => $request['masque_address'],
            //'masque_block' => $request['masque_block'],
            'masque_district' => $request['masque_district_id'],
            'mosque_sub_division_id'=>$request['masque_sub_division'],
            'masque_municipality' => $request['masque_municipality_id'],
            'masque_rural_urban' => $request['masque_rural_urban']
            ]);

         }
         
        
         return redirect()->intended('/masque-management');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Input::get('masque_district_id')){
            $masque_district_id = Input::get('masque_district_id');
            $subdivision = Subdivision::where('sub_district_id','=',$masque_district_id)->get();
            return $subdivision;
        }

        if(Input::get('masque_sub_division')){
            $masque_sub_division = Input::get('masque_sub_division');
        $blocks = Block::where('subdivision_id','=',$masque_sub_division)->get();
        return  $blocks; 
        }
        

        if(Input::get('muni_sub_division_id')){
            $district_id = Input::get('muni_sub_division_id');
            $municipalities = Municipality::where('muni_sub_division_id','=',$district_id)->get();
            //return Response::json($blocks);
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
        $masques = Masque::find($id);
        if ($masques == null ) {
            return redirect()->intended('/masque-management');
        }

        $blocks = Block::all();
        $municipalities = Municipality::all();
        $subdivisions = Subdivision::all();
        $districts = District::all();
       

        return view('masque-mgmt/edit', ['masques' => $masques,'blocks'=>$blocks,'municipalities'=>$municipalities,'subdivisions'=>$subdivisions, 'districts' => $districts]);
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
        $masque = Masque::findOrFail($id);
        if($request['masque_block'] > 0){
            $this->validate($request, [
            'masque_name' => 'required|max:200',
            'masque_address' =>'required|max:500', 
            'masque_district' => 'required|max:200',
            'masque_sub_division'=>'required|max:200',
            'masque_block' => 'required|max:200',
            ]);
            $input = [
                'masque_name' => $request['masque_name'],
                'masque_address' => $request['masque_address'],
                'masque_district' => $request['masque_district'],
                'mosque_sub_division_id'=> $request['masque_sub_division'],
                'masque_block' => $request['masque_block'],
            ];
               
            Masque::where('id', $id)
            ->update($input);
        }

        if($request['masque_municipality'] > 0){

            $this->validate($request, [
            'masque_name' => 'required|max:200',
            'masque_address' =>'required|max:500', 
            'masque_district' => 'required|max:200',
            'masque_sub_division'=>'required|max:200',
            'masque_municipality' => 'required|max:200' 

            ]);
            $input = [
                'masque_name' => $request['masque_name'],
                'masque_address' => $request['masque_address'],
                'masque_district' => $request['masque_district'],
                'mosque_sub_division_id'=> $request['masque_sub_division'],
                'masque_municipality' => $request['masque_municipality']
            ];

            Masque::where('id', $id)
            ->update($input);

        }
        
        return redirect()->intended('/masque-management');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Masque::where('id', $id)->delete();
        return redirect()->intended('/masque-management');
    }

    private function validateInput($request) {
        $this->validate($request, [
        'masque_name' => 'required|max:100',
        'masque_address' => 'required|max:500',
        'masque_block' => 'numeric',
        'masque_district' => 'numeric|required',
        'masque_municipality' => 'numeric',
        'masque_rural_urban' => 'numeric|required|min:1|confirmed'
       
    ]);
    }

    public function ajaxRequest(Request $request,$id){
        $district_id = Input::get('district_id');
        return $district_id;
        //$blocks = Block::where('district_id','=',$district_id)->get();

        //$municipalities = Block::where('muni_district_id','=',$district_id)->get();
        //return Response::json($blocks);
        //$districts = District::all();
        //$states = State::all();
        /*echo "<pre>";
        print_r($blocks);
        echo "</pre>";*/
       // return Response::json($blocks);
        //return view('masque-mgmt/create', ['districts'=>$districts,'states' => $states]);
    }
}
