<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use DataTables;
class UserController extends Controller
{
    public function submit(Request $request)
    {
    	$request->validate([
    		'name'=>'required',
    		'address'=>'required',
    		'email'=>'required',
    		'contactnumber'=>'required',
    		'bloodgroup'=>'required'
    	]);
        // $data=Users::all();
        // return view('Module.adddetails',['user'=>$data]);
    	$user = new Users;
    	$user->name=$request->name;
    	$user->address=$request->address;
    	$user->email=$request->email;
    	$user->contactnumber=$request->contactnumber;
 	  	$user->bloodgroup=$request->bloodgroup;
 	  	$user->save();
 	  	 return redirect('viewdetails');
    }
    public function show(Request $request)
    {  
       $data1 = DB::table('registration_tbl')->leftJoin('bloodgroup_tbl', 'bloodgroup_tbl.id', '=', 'registration_tbl.bloodgroup')
       ->select('registration_tbl.*','bloodgroup_tbl.name as bloodgroup')
       ->get();
       $data1->transform(function ($i){
            return (array)$i;
        });
        $array=$data1->toArray();
        $totalData=DB::table('registration_tbl')->leftJoin('bloodgroup_tbl', 'bloodgroup_tbl.id', '=', 'registration_tbl.bloodgroup')
       ->select('registration_tbl.*','bloodgroup_tbl.name as bloodgroup')
       ->count();
        $totalFiltered = $totalData;
       //dd($data1);
    	//$data=Users::all();
    	//dd($data);
       // $columns = array($data1);
       foreach ($data1 as $key => $value) 
       {
         $details =DB::table('registration_tbl')->leftJoin('bloodgroup_tbl', 'bloodgroup_tbl.id', '=', 'registration_tbl.bloodgroup')
       ->select('registration_tbl.*','bloodgroup_tbl.name as bloodgroup')
       ->count();
       //dd($details);
         $data[]= 
         [
            'id'=>$value['id'],
            'name'=>$value['name'],
            'email'=>$value['email'],
            'contactnumber'=>$value['contactnumber'],
            'address'=>$value['address'],
            'bloodgroup'=>$value['bloodgroup']
        ];
       }
       //dd($data);
       $results= Datatables::of($data)->make(true);
       //dd($results);
          //$jdata= response()->json(['user'=>$results]);
        $json_data = array(
            "draw"            => intval($request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $results   
        );
            
        return response()->json($json_data);
         //dd($json_data);
         return view('Module.viewdetails');

    }
    public function form()
    {
        $data=DB::table('bloodgroup_tbl')->get(['bloodgroup_tbl.name','bloodgroup_tbl.id']);
        $data->transform(function ($i){
            return (array)$i;
        });
        $array=$data->toArray();
        //dd($data);
         return view('Module.userform',['user'=>$data]);

    }
    public function insert()
    {   $data  = array("id"=>'1',"name"=>"O+");
        $data1  = array("id"=>'2',"name"=>"A+");
        $data2 = array("id"=>'3',"name"=>"B+");
        $data3  = array("id"=>'4',"name"=>"AB+");
        $data4  = array("id"=>'5',"name"=>"O-");
        $data5  = array("id"=>'6',"name"=>"A-");
        $data6  = array("id"=>'7',"name"=>"B-");
        DB::table('bloodgroup_tbl')->insert($data6);
    }
}
