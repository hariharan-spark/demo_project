<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Jobs\RegisterMailJob;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;






class LoginController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    
      
    }

    public function index()
    {
        return view('register');
    }

    public function userRegister(RegisterRequest $request)
    {
         
        $create=$this->user->create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password)
         ]);
        $user= $this->user->where('email',$request->email)->first();
        dispatch( new RegisterMailJob($user));
        return redirect('/login');  
    }

    public function login()
    {
        return view('login');
    }
  
    public function userLogin(LoginRequest $request)
    {
     
        $user = $this->user->where('email',$request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            $request->session()->put('id', $user->id);
            return redirect('/dashboard');
        }else{
            return back();
        }
    }

    public function userDashboard()
    {
        return view('post::dashboard');
    }


    public function curl($name)
    {
        $response = Http::get('https://api.agify.io/', [
            'name' => $name,
        ]);

        return response()->json([
            'status' => true,
            'message' => $response->json()]);
    }

}
