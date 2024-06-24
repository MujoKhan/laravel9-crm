<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuperAdmin;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{

    public function index($v)
    {
        $admin = Admin::all();
        if($v == "add")
        {
            return view('super.form'); 
        }
        elseif($v == "edit")
        {
            $admin = Admin::all();
            return view('super.edit',compact('admin'));
            
        }
        elseif($v == "trash")
        {
            $admin = Admin::onlyTrashed()->get();
            return view('super.trash',compact('admin'));
        
        }
        elseif($v == "all")
        {
            $admin = Admin::withTrashed()->get();
            return view('super.show',compact('admin'));
        }
    }

    public function check(Request $request)
    {
        $valid = $request->validate([
            
            'email'=> 'required|email|exists:super_admins,email',
            'password' => ['required','min:6','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
        ],[
            'email.exists'=>'This Email Is Not Persent',
            'password.regex'=>'The Password Must Be 1 Capital, 1 Small and 1 Digit',
        ]);

        // $credentials = [
        //     'email' => $request['email'],
        //     'password' => $request['password'],
        // ];
        // $admin = Admin::where('email',$request['email'])->where('permission','Yes')->get();

        // dd($credentials);
        // echo Auth::attempt($request->only('email','password'));
      
        if (Auth::guard('super')->attempt($request->only('email','password')))
        {
            return redirect()->route('super.home');
        }
        
        
    }

    public function store(Request $request)
    {
        $valid = $request->validate
        (
            [
            
            'name' => ['required','regex:/^[a-zA-Z ]+$/'],
            'email' => 'required|email',
            'password' => ['required','min:6','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
            
            ],[
                'name.regex'=>'The Name Should be Only String',
                'password.regex'=>'The Password Must Be 1 Capital, 1 Small and 1 Digit',
            ]
        );

        $admin = new Admin;

        $admin->name = $request->name; 
        $admin->email = $request->email; 
        $admin->password = Hash::make($request->password); 
        $admin->dp = 2233; 
        $admin->save();
        return redirect()->back()->with("status","New Admin Added");
    
    }

    public function edit(SuperAdmin $superAdmin, $id,$v)
    {
        if($v == "admin")
        {
            $admin = Admin::where('id',$id)->get();
            session()->put('adminedit',1);
            session()->forget('superadminedit',1);
            return view('super.edit-form',compact('admin'));
        }
        elseif($v == "super admin")
        {
            
            $admin = Admin::where('id',$id)->get();
            session()->forget('adminedit',1);
            session()->put('superadminedit',1);
            return view('super.edit-form');
        }
    }

    public function update(Request $request, SuperAdmin $superAdmin, $v)
    {
        $valid = $request->validate([       
            'name' => ['required','regex:/^[a-zA-Z ]+$/'],
             
             ],[
                'name.regex'=>'The Name Should be Only String',
                
             ]);
        if($v == "super admin")
        {
             $supadmin = SuperAdmin::find($request->id);
             $supadmin->name = $request->name;
             $supadmin->update();
             return redirect()->back()->with("status","Top Super Admin Has Been Updated");
        }
        elseif($v == "admin")
        {
            $admin = Admin::where('id',$request->adminkey)
                           ->update([
                               'name'=> $request->name,
                               'password'=>$request->password,
                           ]);
            return redirect()->back()->with("status","Admin Has Been Updated");               
        }
    }

    public function trash($id)
    {
        $admin = Admin::where('id',$id)->delete();
        return redirect()->back();
    }

    public function restore($id)
    {
        $admin = Admin::where('id',$id)->restore();
        return redirect()->back();
    }

    public function fdelete($id)
    {
        $admin = Admin::where('id',$id)->forceDelete();
        return redirect()->back();
    }

    public function logout()
    {
        Auth::guard('super')->logout();
        return redirect()->route('super.login');
    }
}
