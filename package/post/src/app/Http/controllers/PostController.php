<?php

namespace Package\Post\App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Post;


use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(Post $post)
    {
        $this->post = $post;
      
    }
    public function post()
    {
        return view('post::postview');
    }
    public function addPost(Request $request)
    {
        $create=$this->post->create($request->all());
        return redirect('/getpost');  
    }

    Public function getPost()
    {
        $users=$this->post->get();
        return view('post::view',compact('users'));   
    }


    public function updatePost(Request $request)
    {
       
      $updatepost=$this->post->where('id',$request->id)->update($request->all());
        return redirect('/getpost');  
    }

    public function deletePost(Request $request)
    {
        $this->post->where('id',$request->id)->delete();
        return back();

    }  
}
