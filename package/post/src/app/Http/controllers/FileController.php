<?php
 
 namespace Package\Post\App\Http\Controllers;
 use App\Http\Controllers\Controller;
 use Maatwebsite\Excel\Facades\Excel;

 
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;

use App\Models\Document;

 
class FileController extends Controller
{
    public function __construct(document $document)
    {
    $this->document=$document;
    }

    public function index()
    {
        return view('post::file');
    }
 
    public function store(Request $request)
    {
      
       request()->validate([
         'file'  => 'required|mimes:doc,docx,pdf,txt,jpg,png,csv,xlsx|max:2048',
       ]);
       $files = $request->file;
        if ($files) {
            $name = $files->getClientOriginalName().'.'.$files->getClientOriginalExtension();

            $files->move(public_path().'/documents/', $name);
            $filesStore = $this->document->create(['title'=>$name]);
            $fileAll = $this->document->where('title',$filesStore->title)->get();
            return Response()->json([
                "success" => true,
                "body" => $fileAll
            ]);
  
        }
  
        return Response()->json([
                "success" => false,
                "body" => ''
          ]);
  
    }
   
    /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function fileImport(Request $request) 
    // {
    //     Excel::import(new Document, $request->file('file')->store('temp'));
    //     return back();
    // }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport() 
    {
        // $file = $this->document->
        return Excel::download(new Document, 'users-collection.xlsx');
    }    
}
