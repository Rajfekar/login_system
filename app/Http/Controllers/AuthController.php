<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use App\Models\User;
use CodeIgniter\Session\Session as SessionSession;
use Hash;
use Session;
use Illuminate\Support\Facades\Hash as FacadesHash;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('login');
    }
    public function signup()
    {
        return view('signup');
    }
    public function forget()
    {
        return view('forget');
    }
    public function register(Request $request)
    {
       $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:5|max:12'


       ]);
       $user = new User();
       $user ->name = $request->name;
       $user ->email = $request->email;
    //    $user ->password = Hash::make($request->password);
       $user ->password = Hash::make($request->password);
       $res = $user ->save();
       if($res){
        return redirect('login')->with('success','you have registered');
       }else{
        return redirect('signup')->with('fail','you not registered');
       }

    }
    public function signin(Request $request)
    {
       $request->validate([
        'email' => 'required|email',
        'password' => 'required|max:15'

          ]);

        //   $user = User::find($request->email);
          $user = User::where('email','=',$request->email)->first();
          if($user){
               if(Hash::check($request->password, $user->password))
                  {
                   $request->session()->put('loginId',$user->id);
                    return redirect('dashboard');
                   }
           else{
                   return redirect('login')->with('fail','Password Not matches');
                 }
          
       
                  }
          else{
            return redirect('login')->with('fail','this email is not registered.');
          }

          
    }

    public function dashboard()
    {
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id','=' ,Session::get('loginId'))->first();

        }
        return view('dashboard',compact('data'));

    }
    public function logout()
    {
       session()->flush();
       return view('login');
    }


    public function sendverifymail($email)
    {

    }
}
