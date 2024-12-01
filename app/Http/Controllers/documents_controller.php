<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\educational_detail;
use App\Models\document_detail;
use Illuminate\Support\Facades\Storage;
use App\Models\CandidateBasicDetail;


use DataTables;




class documents_controller extends Controller
{
    //

    public function load_docs(Request $request)
    {
    
        try{
        $user = educational_detail::where('user_id', $request->user_id)->get()->pluck('edu_category');
        return $user;
        }
        catch(Exception $e)
        {return $e;}
       

        
    }

    public function save_document_details(Request $request)
    {

 {

        $email = CandidateBasicDetail::where('user_id', $request->user_id)->value('email');

        // Validate the request
        $request->validate([
            'documentCategory' => 'required|string|max:255',
            'document' => 'required|string|max:255',
            'documentFile' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);
        $user_id=$request->input('user_id');
        $document=$request->input('document');
        $cat= $request->input('documentCategory');
        // Handle the file upload
        if ($request->hasFile('documentFile')) {
            $file = $request->file('documentFile');
            $fileName = time() . '_'.$document.'_'. $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/documents/'.$user_id.'/'.$cat, $fileName, 'public');

            // Save the document details in the database
            $document = new document_detail();
            $document->category = $request->input('documentCategory');
            $document->course = $request->input('document');
            $document->file_name = $fileName;
            $document->file_path =  $filePath;
            $document->email = $email;
            $document->user_id = $request->input('user_id');
            
            $document->save();

            // Return a success response
            return response()->json(['message' => 'Document uploaded and details saved successfully!'], 200);
        }

        // Return an error response if file is not present
        return response()->json(['message' => 'File not uploaded. Please try again.'], 400);
    }

    }

    public function fetch_doc_details(Request $request)
    {

        $validated = $request->validate([
            'user_id' => 'required|integer',
        ]);
        $user_id = (int) $validated['user_id'];
        $data=document_detail::where('user_id',$user_id)->get();

        return DataTables::of($data)->addColumn('action', function($data){
            $btn = '<a type="button" id='.$data->id.' style="color: blue; margin-right: 2px; border: 1px solid; padding: 2px;" onclick=get_Doc(this.id)>View</a>';
            $btn .= '<a type="button" id='.$data->id.' style="color: green; margin-right: 2px; border: 1px solid; padding: 2px;" oonclick=Verify_doc(this.id)>Verify</a>';
            $btn .= '<a type="button" id='.$data->id.' style="color: red; margin-right: 2px; border: 1px solid; padding: 2px;" o onclick=Delete_doc(this.id)>Reject</a>';
            return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    
        
    }   

    public function delete_doc_detail(Request $request)
{
try{
    $data=document_detail::findorfail($request->id);
   $file_path=$data->file_path;
    if (Storage::disk('public')->exists($file_path)) {
        Storage::disk('public')->delete($file_path);
    }
    $data->delete();
    return response()->json(['message' => 'Record deleted successfully','file_path'=>$file_path], 200);

}
catch(Exception $e)
{
    return response()->json(['message' => 'Record not found or could not be deleted', 'error' => $e->getMessage()], 400);
    
}

}

public function Getdocument(Request $request)
{
try{
    

    //working code
    $data=document_detail::findorfail($request->id);
    $url = env('lakshya_portal_Resource_URL');
    $resource_url=$url."/storage/".$data->file_path;
    $resource_url = str_replace(['//', ' '], ['/', '%20'], $resource_url);
    return str_replace('http:/','',$resource_url);
//Working code

}
catch (Exception $e)
{
    return $e;
}

}


}


