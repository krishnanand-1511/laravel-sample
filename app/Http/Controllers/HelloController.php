<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserMca;

class HelloController extends Controller
{
    public function greet() {
        // $users = $this->getAllUsers(); 
    	$data = "its a test data";
        $name = "Akhil";
        $users= UserMca::all();
    	return view('hello',compact('users','data'));

    }



    public function userInput(Request $request) {

        $name = $request->input('username');
        $pass = $request->input('password');
                                                                  
        $user = new UserMca();
        $user->username = $name;                                          
        $user->pass = $pass;
        $user->save();

        $data ="Data inserted successfully!";
		
        $users= UserMca::all();

        return view('hello',compact('users','data'));
       
    }

    public function userDelete(Request $request)
    {
        $name = $request->input('username');

        $user = UserMca::where('username', $name)->first();  // Find the user by name
	    if ($user) {
	        $user->delete();
            $users= UserMca::all();
            $data = "User with name $name deleted successfully!";
	        return view('hello',compact('data','users'));

        }
        else {
            $users = UserMca::all(); 
            $data = "User with name $name not found!";
            return view('hello',compact('users','data'));
        }
	   

    }

    public function updateUser(Request $request)
	{
	     
		$name = $request->input('username');
		$pass = $request->input('password');

	    $user = UserMca::where('username', $name)->first();  // Find the user by name
	    if ($user) {
	        $user->pass = $pass;  // Update the password
	        $user->save();  // Save the changes
	        $data ="User password updated successfully!";
	        $users = UserMca::all(); 
	        return view('hello',compact('data','users'));
	    } else {
	        $data ="User not found!";
	        $users = UserMca::all(); 
	        return view('hello',compact('data','users'));
	    }
	}



    


 

}
