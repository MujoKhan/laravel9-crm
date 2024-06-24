<?php

namespace App\Http\Controllers\Emp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Emp;
use App\Models\UserData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersDataImport;

class DataAdminController extends Controller
{
    public function index($id, $v)
    {
        $emp = Emp::where('permission','Yes')
                     ->where('post','HR')->get();

        $userdata = UserData::where('Data_Admin_Id', $id)->get();     

        if($v == "edit")
        {
           return view('dataadmin.edit',compact('userdata','emp'));
        }
        elseif($v == "show")
        {
            return view('dataadmin.show', compact('userdata','emp'));
        }
        
    }

    public function store(Request $request, $id, $v)
    {
        if($v == "single data")
        {
            $valid = $request->validate([
                'name' => ['required','regex:/^[a-zA-Z ]+$/'],
                'email' => 'required||email|unique:user_data,email',
                'phone' => ['required','digits:10'],
                'dob' => 'required',
                'course' => 'required',
                'gender' => 'required',
            ],[
                'name.regex'=>'The Name Should be Only String',
                'email.unique'=>'The Email Already Taken By Someone!'
                
            ]);
            $userdata = UserData::where('Email',$request->email)->get();
            
            if($userdata->count()>0)
            {
        
                return redirect()->back()->with("status", "This Email Already Taken By Someone!!!");
            }
            else{
         
                $userdata1 = new UserData;
                $userdata1->Name = $request->name;
                $userdata1->Email = $request->email;
                $userdata1->Phone = $request->phone;
                $userdata1->Gender = $request->gender;
                $userdata1->DOB = $request->dob;
                $userdata1->Course = $request->course;
                $userdata1->Data_Admin_Id = $id;
                $userdata1->save();
                return redirect()->back()->with("status", "Data Inserted");
            }
        }
        elseif($v == "bunk data")
        {
             
            Excel::Import(new UsersDataImport, $request->file(key: 'excelsheet'));
           
            return redirect()->back()->with("status","Data Updated/Inserted");
        }
    }

    public function edit($id, $v)
    {
        $userdata = UserData::where('id',$id)->get();
        $emp = Emp::where('post','HR')->where('permission','Yes')->get();
        if($v == "user edit")
        {
            
            session()->put('edit',1);
            session()->forget('assign',1);
            session()->forget('dataadmin',1);
            return view('dataadmin.assign',compact('userdata'));
        }
    
        elseif($v == "user assign")
        {
            session()->forget('edit',1);
            session()->put('assign',1);
            session()->forget('dataadmin',1);
            return view('dataadmin.assign',compact('userdata','emp'));
        }
        elseif($v == "data admin")
        {
            // return view('dataadmin.update');
            session()->forget('edit',1);
            session()->forget('assign',1);
            session()->put('dataadmin',1);
            return view('dataadmin.assign');
            
        }
    }

    public function update(Request $request, $id, $v)
    {
        if($v == "data admin")
        {
            $valid = $request->validate([
                'name' => ['required','regex:/^[a-zA-Z ]+$/'],
                // 'password' => ['required','min:6','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
                'phone' => ['required','digits:10'],
                'gender' => 'required',
            ],[
                'name.regex'=>'The Name Should be Only String',
                // 'password.regex'=>'The Password Must Be 1 Capital, 1 Small and 1 Digit',
            ]);

          $emp = Emp::find($request->empid);
          $emp1 = Emp::where('id',$request->empid)->get();

            if($request->hasfile('dp'))
              {
                $file = $request->file('dp');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move('dp', $filename);
                session()->put('file',$filename);
              }
            else
              {
                foreach($emp1 as $data)
                {
                    session()->put('file',$data->dp);
                }
              }
              
          $emp->name = $request->name;   
          $emp->phone = $request->phone;  
          $emp->dp = session()->get('file'); 
          $emp->gender = $request->gender;
          $upd = $emp->update();
            
         if($upd)
         {
          return redirect()->back()->with("status","Data Admin Has Been Updated");
         }
         else
         {
            return redirect()->back()->with("status","Data Admin Not Update");
         }
        }
        elseif($v = "user")
        {
            $valid = $request->validate([
                'name' => ['required','regex:/^[a-zA-Z ]+$/'],
                'email' => 'required||email|unique:user_data,email',
                'phone' => ['required','digits:10'],
            ],[
                'name.regex'=>'The Name Should be Only String',
                'email.unique' => 'The Email Already Taken',
            
            ]);
            $userdata = UserData::find($request->userid);
            $userdata->Name = $request->name;
            $userdata->Email = $request->email;
            $userdata->Phone = $request->phone;
            $userdata->Gender = $request->gender;
            $userdata->DOB = $request->dob;
            $userdata->Course = $request->course;
            $up = $userdata->update();
            if($up)
            {
               return redirect()->back()->with("status","User Has Been Updated");
            }
            else
            {
                return redirect()->back()->with("status","User Has Been Updated");
            }   
        }
    }

    public function assign(Request $request)
    {
        $userdata = UserData::find($request->userid);
        $userdata->Hr_Id = $request->hrid;
        $userdata->update();
        
        return redirect()->back()->with("status","User Has Been Assigned To HR");
    }

}
