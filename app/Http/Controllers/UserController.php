<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{   

    public function __construct()
    {
        //Only accessible for guests
        $this->middleware('auth', 
            ['except' => ['register','login','showRegister','showLogin']
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function login(Request $request)
    {

    	$request->validate([

    		'email_address'     => 'required|email',

    		'password'    => 'required'
    	]);

    	if (auth()->attempt(['email' => strtolower(sanitize_email(request('email_address'))), 'password' => request('password')])) {

            return redirect('/tasks')->with('success','Successfully logged in.');

    	}else{

			return redirect()->back()->with('error','Wrong password. Please try again.');       

    	}

    }

    public function logout()
    {   
        //Activity log function
    	auth()->logout();
    	return redirect('/')->with('success','Successfully logged out.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegister()
    {
        return view('users.register');
    }

	public function showLogin()
    {
        return view('users.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {   

    	$this->validate(request(), [

    		'first_name'    => 'required|min:2|max:50|string',

    		'last_name'     => 'required|min:2|max:50|string',

    		'password'      => 'required|min:8|confirmed',

    		'email'         => 'required|email',
    	]);


        // Check if primary email and social email exists
    	if (User::where('email', strtolower(sanitize_email(request('email'))))->exists()){

			return redirect()->back()->with('error','Email is existing, please login instead.');
            
        }else{

        	$user = new User;

        	$user->first_name           = ucwords(sanitize_string(request('first_name')));

        	$user->last_name            = ucwords(sanitize_string(request('last_name')));
			
			$user->email            = ucwords(sanitize_string(request('email')));

			$user->email_verified_at    = Carbon::now();

			$user->password             = bcrypt(request('password'));

        	$user->save();

        	if ($user) {

                auth()->login($user);

				return redirect('/tasks');

        	}else{
        		return 0;
        	}

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        

        
    }


}
