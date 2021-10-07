<?php
 
 namespace Package\Post\App\Http\Controllers;
 use App\Http\Controllers\Controller;
 use Maatwebsite\Excel\Facades\Excel;
 use App\Exports\UsersExport;
use App\Imports\UsersImport;

 
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
   
    public function importExportView()
    {
       return view('post::file');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new UsersExport, 'asdfgh.xlsx');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new UsersImport,request()->file('file'));
             
        return back();
    }  
}
