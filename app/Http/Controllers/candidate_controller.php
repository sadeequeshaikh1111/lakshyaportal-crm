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
        try { 
            $user_id = $request->user_id; // Retrieve user_id from the AJAX request
            $user = CandidateBasicDetail::where('user_id', $user_id)->first();
    
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not found',
                ], 404);
            }
    
            return response()->json([
                'success' => true,
                'data' => $user,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
    public function showACDetails(Request $request)
    {
        try{ 
       
            $user_id = $request->query('user_id');     
             return view('candidate_AC_details', compact('user_id'));
     
            }
            catch(Exception $e)
            {
             return "error ".$e;
            }

    }   
            
    
    }