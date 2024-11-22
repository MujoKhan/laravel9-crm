<?php

namespace App\Http\Controllers\Emp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuperAdmin;
use App\Models\Admin;
use App\Models\Emp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmpController extends Controller
{

    public function create(Request $request)
    {
        $valid = $request->validate(
            [
            'emprole' => 'required',
            'name' => ['required','regex:/^[a-zA-Z ]+$/'],
            'email' => 'required|email|unique:emps,email',
            'password' => ['required','min:6','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
            'phone' => ['required','digits:10'],
            'gender' => 'required',
          ],[
            'name.regex'=>'The Name Should be Only String',
            'password.regex'=>'The Password Must Be 1 Capital, 1 Small and 1 Digit',
            'email.unique'=>'The Email Already Taken',
          ]);

        // $save = Emp::create([
        //     'name' => $request['name'],
        //     'email' => $request['email'],
        //     'password' => Hash::make($request['password']),
        //     'phone' => $request->phone,
        //     'post' => $request->emprole,
        //     'gender' => $request->gender,
        // ]);
       
        // or 

        $user = new Emp;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->phone = $request['phone'];
        $user->gender = $request['gender'];
        $user->post = $request['emprole'];
        $save = $user->save();

        if($save)
        {
            return redirect()->back()->with('status','Registeration Successfull');
        }
        else
        {
            return redirect()->back()->with('status','Registeration Not Successfull');
        }
    }

    public function check(Request $request)
    {
        $valid = $request->validate([
            
            'email'=> 'required|email|exists:emps,email',
            'password' => ['required','min:6','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
        ],[
            'password.regex'=>'The Password Must Be 1 Capital, 1 Small and 1 Digit',
            'email.exists'=>'The Email Is Not Exists',
        ]);

        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];
        // dd($credentials);
        // echo Auth::attempt($request->only('email','password'));
        $emp = Emp::where('email',$request->email)->where('permission','Yes')->get();
        foreach($emp as $data)
        {
            session()->put('post',$data->post);
            session()->put('count',Hash::check($request['password'],$data->password));
        }
        

        if((session()->get('count') == 1) && ($emp->count() == 1))
        {
            if(session()->get('post') == 'HR')
            {
                    if (Auth::guard('emp')->attempt($request->only('email','password')))
                    {
                    return view('hr.home');
                    }
                else{
                    return redirect()->back()->with('status','HR Not Found');
                    }
            }
            elseif(session()->get('post') == 'Inter Viewer')
            {
                    if (Auth::guard('emp')->attempt($request->only('email','password')))
                    {
                    return view('interviewer.home');
                    }
                else{
                    return redirect()->back()->with('status','Inter Viewer Not Found');
                    }
            }
            elseif(session()->get('post') == 'Data Admin')
            {
                    if (Auth::guard('emp')->attempt($request->only('email','password')))
                    {
                    return view('dataadmin.home');
                    }
                else{
                    return redirect()->back()->with('status','Data Admin Not Found');
                    }
            }
        }
        else
        {
            return redirect()->back()->with('status','Dear Emp Admin Not Allow You');
        }    
    }

    public function logout()
    {
        Auth::guard('emp')->logout();
        return redirect()->route('user.login');
    }
    
}
