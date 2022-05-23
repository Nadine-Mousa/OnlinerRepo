<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Call;
use App\Models\Level;
use App\Models\Department;
use App\Models\TempProfessor;
use Hash;
use Session;
use Password;


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
    // use \Illuminate\Foundation\Auth\AuthenticatesUsers;

    public function login(Request $request){
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        // Session::put('emaili', $email);
        // Session::put('shose', 'myshoes');
        // dd(Session::get('emaili'));

        $password = $request->password;
        $email = $request->email;

        $userfromDb = User::where([
            ['email', '=', $email],
        ])->first();

        if($userfromDb != null){
            // check password
            if (Hash::check($password, $userfromDb->password))
            {
                session()->put('user', $userfromDb);
                $currentRole = $userfromDb->role;
                if($currentRole == 1) {
                session()->put('current_role', "admin");
                }
                return redirect()->route('home');
                return view('home', ['user' => $userfromDb]);
            }
            else {
                return redirect()->back()
                ->withErrors(['login_failed'=>'Invalid Email or Password']);
            }
        }
        else {

            return redirect()->back()
            ->withErrors(['login_failed'=>'Invalid Email or Password']);

        }
    }



    public function register(Request $request){
        
        // validate model
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'unique:users,email|unique:temp_professors,email|required|min:10',
            'password' => [
                'required_with:confirm_password',
                'same:confirm_password',
                // Password::min(8)
                // ->mixedCase()
                // ->numbers()
                // ->symbols()
                // ->uncompromised(),
                'string',
                'min:8',             // must be at least 8 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            'confirm_password' => 'min:8',
            'department' => 'required',
            'phone' => 'nullable'
        ]);

        $user = new User();
        
        $existingUser = User::where('email', $request->email)->first();
        if(!$existingUser == null){
            return 'invalid email';
        }

        $password_hashed = Hash::make($request->password);
        
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->password = $password_hashed;
        $user->email = $request->email;
        $user->department_id = $request->department_id;
        $user->level_id = $request->level_id;



        


        if($request->has('professor') ){

            $temp_prof = new TempProfessor();
            $temp_prof->first_name = $request->first_name;
            $temp_prof->last_name = $request->last_name;
            $temp_prof->password = $password_hashed;
            $temp_prof->email = $request->email;
            $temp_prof->department_id = $request->department_id;
            $temp_prof->save();
            
            // save the user of this professor to professor sign up request

        }
        else {
            $validated = $request->validate([
                'level' => 'required'
            ]);
            $user->save();
        }

        if($request->has('professor')){
            return redirect()->back()
            ->with('requestSent','your request has been submitted to the admin. Please, wait for approval');
        }
        else {
            session()->put('user', $user);
            return redirect()->route('home'); 
        }


    }
    public function home(){
        return view('welcome');
    }
    public function about(){
        return view('about');
    }
    public function contact(){
        return view('contact');
    }
    
}
