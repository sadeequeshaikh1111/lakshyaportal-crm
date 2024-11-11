<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CandidateBasicDetail;
use Yajra\DataTables\Facades\DataTables; // Add this line


class candidate_controller extends Controller
{
    //
public function Fetch_candidates()
{

    $data=CandidateBasicDetail::all();

    return DataTables::of($data)->addColumn('action', function($data) {
        // Pass the actual $data->id directly into the onclick function
        $btn = '<a type="button" class="btn btn-danger btn-sm" onclick="view('.$data->User_id.')">View</a>';
        return $btn;
    })
    ->rawColumns(['action'])
    ->make(true);
    
    
} 


public function Fetch_candidate_AC_details(Request $request)
    {
        // Assuming you are getting the user's ID from the session or request
       try{ 
       
       $user_id = $sessiondata->User_id;
        $user =  CandidateBasicDetail::where('user_id', $user_id)->first();
        

        //$user =  CandidateBasicDetail::where('email', $email)->first();
        return $user;

       }
       catch(Exception $e)
       {
        return "error ".$e;
       }
    }
            
    
    }