<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Call;
use App\Models\Level;
use App\Models\Department;
use App\Models\TempProfessor;
use Session;


class UserController extends Controller
{
    public function showLoginForm(){
        
        return view('auth.login');
    }

    public function showRegisterForm(){
        $departments = Department::all();
        $levels = Level::all();
        return view('auth.register',
         ['departments' => $departments,
          'levels' => $levels]);
        
    }
    public function login(Request $request){

        $email = $request->email;

        // Session::put('emaili', $email);
        // Session::put('shose', 'myshoes');
        // dd(Session::get('emaili'));

        $password = $request->password;
        $userfromDb = User::where([
            ['email', '=', $email],
            ['password', '=', $password]
        ])->first();

        if($userfromDb == null){
            return redirect()->route('showLoginForm');
        }
        else {
            //Session::put('user', $userfromDb);
            session()->put('user', $userfromDb);
           
            $currentRole = $userfromDb->role;
            if($currentRole == 1) {
            session()->put('current_role', "admin");
            }
            return view('home', ['user' => $userfromDb]);
        }
    }
    public function register(Request $request){
        
        // validate model
        $user = new User();

        $existingUser = User::where('email', $request->email)->first();
        if(!$existingUser == null){
            return 'invalid email';
        }
    
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->department_id = $request->department_id;
        $user->level_id = $request->level_id;

        if($request->has('professor') ){

            $temp_prof = new TempProfessor();
            $temp_prof->first_name = $request->first_name;
            $temp_prof->last_name = $request->last_name;
            $temp_prof->password = $request->password;
            $temp_prof->email = $request->email;
            $temp_prof->department_id = $request->department_id;
            $temp_prof->save();
            
            // save the user of this professor to professor sign up request

        }
        else {
            $user->save();
        }

        return 'your request has been submitted to the admin. Waiting for approval';

        // $namehashed =  Hash::make($name);
        // bycrypt
        // $name1 = password_hash('hi');
        // $name2 = bycrypt('hi');

        // if (password_verify ( 'hi' , $name2) == true )
        // $hashed = Hash::make($password);

    }
    public function home(){
        return 'this is the home page';
    }
}
